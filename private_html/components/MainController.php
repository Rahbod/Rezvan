<?php

namespace app\components;

use app\models\Advice;
use app\models\Cooperation;
use app\models\Department;
use app\models\Field;
use app\models\Model;
use app\models\Reception;
use app\models\User;
use app\models\UserRequest;
use Yii;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\web\Controller;

/**
 * Class MainController
 * @package app\components
 *
 * @property User $user
 */
class MainController extends Controller
{
    public $bodyClass='home';
    public $headerClass;
    public $innerPage=false;
    public $theme;
    public $tmpDir = 'uploads/temp';
    public static $tempDir = 'uploads/temp';
    public $models;

    public function init()
    {
        parent::init();
        Yii::$app->name = Yii::t('words', 'Rezvan');
        if (Yii::$app->session->has('language'))
            Yii::$app->language = Yii::$app->session->get('language');
        else if (isset(Yii::$app->request->cookies['language']))
            Yii::$app->language = Yii::$app->request->cookies['language']->value;

        $this->initializeRequirements();
    }

    /**
     * Returns actions that excluded from user roles
     * @return array
     */
    public function getMenuActions()
    {
        return [];
    }

    /**
     * Returns actions that excluded from user roles
     * @return array
     */
    public function getSystemActions()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getSamePermissions()
    {
        return [];
    }

    public function userCanAccess($action, $isPermissionName = false)
    {
        /* @var $role \yii\rbac\Role */
        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
        foreach ($roles as $role)
            if ($role->name == 'superAdmin')
                return true;

        if ($isPermissionName)
            return $permissions || Yii::$app->user->can($action);
        else
            return $permissions || Yii::$app->user->can($this->id . ucfirst($action));
    }


    public function setTheme($theme, $config = [])
    {
        if ($theme) {
            Yii::$app->view->theme = new \yii\base\Theme([
                'basePath' => '@webroot/themes/' . $theme,
                'baseUrl' => '@web/themes/' . $theme,
            ]);

            foreach ($config as $key => $value)
                $this->$key = $value;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param array $validClasses
     * @param array $excludeClasses
     * @param bool $menuActions
     * @return array
     * @throws \ReflectionException
     * @throws \yii\base\InvalidConfigException
     */
    public static function getAllActions($validClasses = [], $excludeClasses = [], $menuActions = false)
    {
        $excludeClasses = array_merge($excludeClasses, [
            'app\controllers\ApiController',
            'app\controllers\CronController'
        ]);

        $actions = [];
        foreach (glob(Yii::getAlias('@app') . '/controllers/*Controller.php') as $controller) {
            $className = 'app\controllers\\' . basename($controller, '.php');

            if ($validClasses && !in_array($className, $validClasses))
                continue;

            if (!in_array($className, $excludeClasses)) {
                $methods = (new \ReflectionClass($className))->getMethods(\ReflectionMethod::IS_PUBLIC);

                preg_match('/(app\\\\controllers\\\\)(\w*)(Controller)/', $className, $matches);
                if (!$matches)
                    continue;

                $class = Yii::$app->createControllerByID(strtolower($matches[2]));

                if ($menuActions) {
                    if (!method_exists($className, 'getMenuActions'))
                        continue;

                    $className = explode('\\', $className);
                    $className = end($className);

                    foreach ($class->getMenuActions() as $key)
                        $actions[lcfirst(substr($className, 0, strpos($className, 'Controller')))][] = $key;
                    continue;
                }

                if (!($class instanceof AuthController))
                    continue;

                $unusableClasses = ['yii\web\Controller', 'yii\base\Controller', 'app\components\MainController'];
                foreach ($methods as $method) {
                    if (in_array($method->class, $unusableClasses))
                        continue;

                    $className = StringHelper::basename($method->class);
                    preg_match('/(app\\\\controllers\\\\)(\w*)(Controller)/', $method->class, $matches);
                    if (!$matches)
                        continue;

                    $class = Yii::$app->createControllerByID(strtolower($matches[2]));

                    if (!method_exists($method->class, 'getSystemActions'))
                        continue;

                    $excludeActions = $class->getSystemActions();
                    foreach ($class->getSamePermissions() as $permission => $samePermission) {
                        if (is_string($samePermission))
                            $excludeActions[] = $samePermission;
                        elseif (is_array($samePermission))
                            $excludeActions = array_merge($excludeActions, $samePermission);
                    }

                    if ($method->name == 'actions') {
                        $list = $class->actions();
                        foreach (array_keys($list) as $key) {
                            if (in_array($key, $excludeActions))
                                continue;

                            if (key_exists(lcfirst(substr($className, 0, strpos($className, 'Controller'))), $actions))
                                if (in_array($key, $actions[lcfirst(substr($className, 0, strpos($className, 'Controller')))]))
                                    continue;

                            $actions[lcfirst(substr($className, 0, strpos($className, 'Controller')))][] = $key;
                        }
                    } elseif (preg_match('/action(\w*)/', $method->name) == 1) {
                        $methodBasename = substr($method->name, 6);
                        $methodBasename = lcfirst($methodBasename);

                        if (in_array($methodBasename, $excludeActions))
                            continue;
                        if (key_exists(lcfirst(substr($className, 0, strpos($className, 'Controller'))), $actions))
                            if (in_array(lcfirst(substr($method->name, 6)), $actions[lcfirst(substr($className, 0, strpos($className, 'Controller')))]))
                                continue;

                        $actions[lcfirst(substr($className, 0, strpos($className, 'Controller')))][] = lcfirst(substr($method->name, 6));
                    }
                }
            }
        }

        return $actions;
    }

    /**
     * @return mixed
     */
    public function getModel($name)
    {
        return isset($this->models[$name]) ? $this->models[$name] : null;
    }

    /**
     * Prepare input array to show in jsTree widget
     * @param array $array
     * @param null|array $selected
     * @param null|string $parent
     * @return array
     */
    protected function prepareForView($array, $selected = null, $parent = null)
    {
        $temp = [];
        foreach ($array as $key => $value) {
            $node = [
                'name' => is_string($key) ? $key : $parent . '-' . $value,
                'alias' => Yii::t('actions', is_string($key) ? $key : $value),
                'actions' => is_array($value) ? $this->prepareForView($value, $selected, $key) : false,
                'selected' => false,
            ];

            if (!is_null($selected) and !is_array($value) and !is_null($parent))
                if (in_array($parent . ucfirst($value), $selected))
                    $node['selected'] = true;

            $temp[] = $node;
        }
        return $temp;
    }

    public function prepareForSelect($array)
    {
        $temp = [];
        foreach ($array as $controller => $actions) {
            foreach ($actions as $action)
                $temp[$controller][lcfirst($controller) . '@' . $action] = Yii::t('actions', lcfirst($controller) . '.' . $action);
        }
        return $temp;
    }

    public static function getMenu($roleID)
    {
        $roleID = !$roleID ? 'guest' : $roleID;

        switch ($roleID) {
            case 'operator':
                $permissions = false;
                $menuName = 'Operator Menu';
                break;
            case 'admin':
            case 'superAdmin':
                $permissions = true;
                $menuName = 'Management Menu';
                break;
            case 'guest':
            default:
                $permissions = false;
                $menuName = 'Guest';
                break;
        }

        $contactLinks = [];
        foreach (Department::find()->valid()->all() as $item) {
            $contactLinks[] = ['label' => "پیام های {$item->name}", 'url' => ['/message/index', 'id' => $item->id], 'visible' => $permissions || Yii::$app->user->can('messageIndex')];
        }
        $contactLinks[] = ['label' => 'پیام های تماس با ما', 'url' => ['/message/contactus'], 'visible' => $permissions || Yii::$app->user->can('messageContactus')];
        $contactLinks[] = ['label' => 'انتقادات و پیشنهادات', 'url' => ['/message/suggestions'], 'visible' => $permissions || Yii::$app->user->can('messageSuggestions')];
        $contactLinks[] = ['label' => 'شکایات', 'url' => ['/message/complaints'], 'visible' => $permissions || Yii::$app->user->can('messageComplaints')];
        $contactLinks[] = ['label' => 'مدیریت بخش ها', 'url' => ['/message/department'], 'visible' => $permissions || Yii::$app->user->can('messageDepartment')];

        return [
            [
                'label' => '<i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">' . Yii::t('words', 'Dashboard') . '</span>',
                'url' => ['/admin']
            ],

            "<li class='m-menu__section'><h4 class='m-menu__section-text'>" . Yii::t('words', $menuName) . "</h4><i class='m-menu__section-icon flaticon-more-v3'></i></li>",
            [
                'label' => '<i class="m-menu__link-icon fa fa-bars"></i><span class="m-menu__link-text">' . Yii::t('words', 'Menus') . '</span>',
                'url' => ['/menu/index'],
                'visible' => $permissions || Yii::$app->user->can('menuIndex')
            ],

            [
                'label' => '<i class="m-menu__link-icon fas fa-building"></i><span class="m-menu__link-text">پروژه ها</span>',
                'items' => [
                    ['label' => 'آپارتمان', 'url' => ['/apartment/index'], 'visible' => $permissions || Yii::$app->user->can('userCreate')],
                    ['label' => 'سرمایه گذاری', 'url' => ['/investment/index'], 'visible' => $permissions || Yii::$app->user->can('userCreate')],
                    ['label' => 'دیگر', 'url' => ['/construction/index'], 'visible' => $permissions || Yii::$app->user->can('userCreate')],
                ]
            ],

            [
                'label' => '<i class="m-menu__link-icon fa fa-server"></i><span class="m-menu__link-text">' . Yii::t('words', 'Items') . '</span>',
                'items' => [
                    ['label' => Yii::t('words', 'Slides'), 'url' => ['/slide/index'], 'visible' => $permissions || Yii::$app->user->can('slideIndex')],
                    ['label' => Yii::t('words', 'Pages'), 'url' => ['/page/index'], 'visible' => $permissions || Yii::$app->user->can('pageIndex')],
                    ['label' => Yii::t('words', 'Posts'), 'url' => ['/post/index'], 'visible' => $permissions || Yii::$app->user->can('postIndex')],
                ]
            ],
            [
                'label' => '<i class="m-menu__link-icon fa fa-images"></i><span class="m-menu__link-text">' . Yii::t('words', 'Gallery') . '</span>',
                'items' => [
                    ['label' => Yii::t('words', 'Picture Gallery'), 'url' => ['/gallery/index'], 'visible' => $permissions || Yii::$app->user->can('galleryIndex')],
                    ['label' => Yii::t('words', 'Video Gallery'), 'url' => ['/gallery/index-video'], 'visible' => $permissions || Yii::$app->user->can('galleryIndexVideo')],
                ]
            ],
            [
                'label' => '<i class="m-menu__link-icon fa fa-th"></i><span class="m-menu__link-text">' . Yii::t('words', 'Categories') . '</span>',
                'url' => ['/category/index'],
                'visible' => $permissions || Yii::$app->user->can('categoryIndex')
            ],
            [
                'label' => '<i class="m-menu__link-icon fa fa-comments"></i><span class="m-menu__link-text">' . Yii::t('words', 'Messages') . '</span>',
                'items' => $contactLinks,
            ],
            [
                'label' => '<i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">کاربران</span>',
                'items' => [
                    ['label' => 'مدیریت کاربران', 'url' => ['/user/index'], 'visible' => $permissions || Yii::$app->user->can('userIndex')],
                    ['label' => 'افزودن کاربر', 'url' => ['/user/create'], 'visible' => $permissions || Yii::$app->user->can('userCreate')],
                    ['label' => 'مدیریت نقش های کاربری', 'url' => ['/role/index'], 'visible' => $permissions || Yii::$app->user->can('roleIndex')],
                ]
            ],

            [
                'label' => '<i class="m-menu__link-icon fa fa-language"></i><span class="m-menu__link-text">مدیریت ترجمه ها</span>',
                'url' => ['/admin/translate'],
                'visible' => $permissions || Yii::$app->user->can('adminTranslate')
            ],
            [
                'label' => '<i class="m-menu__link-icon fa fa-cogs"></i><span class="m-menu__link-text">' . Yii::t('words', 'Setting') . '</span>',
                'items' => [
                    ['label' => 'تنظیمات عمومی', 'url' => ['/setting/index'], 'visible' => $permissions || Yii::$app->user->can('settingIndex')],
                    ['label' => 'تنظیمات اسلایدر', 'url' => ['/slide/setting'], 'visible' => $permissions || Yii::$app->user->can('sliderSetting')],
                ]
            ],
            [
                'label' => '<i class="m-menu__link-icon flaticon-logout"></i><span class="m-menu__link-text text-danger">' . Yii::t('words', 'Logout') . '</span>',
                'url' => ['/admin/logout'],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => '<i class="m-menu__link-icon flaticon-imac"></i><span class="m-menu__link-text">' . Yii::t('words', 'Login') . '</span>',
                'url' => ['/admin/login'],
                'visible' => Yii::$app->user->isGuest
            ]
        ];
    }

    private function initializeRequirements()
    {
        $cache = Yii::$app->cache;

        // cache users
        $expire = 30 * 24 * 3600;

        // cache models
        $this->models = $cache->getOrSet('models', function () {
            $arr = [];
            foreach (Model::find()->all() as $model)
                $arr[$model->name] = $model->id;
            return $arr;
        }, $expire);
    }

    /**
     * Default route for all controllers that use Crud Controller Trait
     *
     * @return array
     */
    public static function getRoutes()
    {
        return [
            'after_save_route' => 'index'
        ];
    }
}