<?php

namespace app\controllers;

use app\components\AuthController;
use app\components\customWidgets\CustomCaptchaAction;
use app\models\ContactForm;
use app\models\Menu;
use app\models\MenuSearch;
use app\models\Message;
use app\models\Page;
use app\models\PageSearch;
use app\models\Post;
use app\models\PostSearch;
use app\models\projects\Apartment;
use app\models\Slide;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;

class SiteController extends AuthController
{

    public function getMenuActions()
    {
        return [
            'index',
            'contact',
            'suggestion',
            'complaint',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => CustomCaptchaAction::className(),
                'transparent' => true,
                'onlyNumber' => true,
                'foreColor' => 0x2040A0,
                'minLength' => 3,
                'maxLength' => 3,
//                'fontFile' => '@webroot/themes/default/assets/vendors/base/fonts/IranSans/ttf/fa-num/IRANSansWeb.ttf'
            ],
        ];
    }

//    public function actionError()
//    {
//        var_dump(Yii::$app->request);exit;
//    }

    public function actionChangeLang($language = false, $controller = false, $action = false)
    {
        if ($language) {
            Yii::$app->language = $language;
            Yii::$app->session->set('language', $language);
            $cookie = new \yii\web\Cookie([
                'name' => 'language',
                'value' => $language,
            ]);
            $cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
            Yii::$app->response->cookies->add($cookie);
        }

        $referrer = Yii::$app->request->getReferrer() ?: ['/'];
        if (!$controller)
            return $this->redirect($referrer);

        $url = str_replace(["/$language", "$language/"], "", $referrer);
        return $this->redirect($url);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        return $this->ContactProcess();
    }

    public function actionSuggestion()
    {
        return $this->ContactProcess('suggestion', Message::TYPE_SUGGESTIONS);
    }

    public function actionComplaint()
    {
        return $this->ContactProcess('complaint', Message::TYPE_COMPLAINTS);
    }

    public function ContactProcess($view = 'contact', $type = Message::TYPE_CONTACT_US)
    {
        $this->setTheme('frontend', ['bodyClass' => 'innerPages']);
        $model = new ContactForm();
        $model->scenario = $type == 'cnt' ? 'default' : "$type-scenario";
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $message = new  Message();
                $message->scenario = $type == 'cnt' ? 'default' : "$type-scenario";
                $message->type = $type;
                $message->name = $model->name;
                $message->tel = $model->tel;
                $message->body = $model->body;
                $message->degree = $model->degree;
                $message->subject = $model->subject;
                $message->email = $model->email;
                $message->department_id = $model->department_id;
                if ($message->save()) {
                    $model->contact(Yii::$app->params['adminEmail']);
                    Yii::$app->session->setFlash('public-alert', ['type' => 'success', 'message' => Yii::t('words', 'message.successMsg')]);
                    if ($return = Yii::$app->request->getBodyParam('return'))
                        return $this->redirect([$return]);
                    return $this->refresh();
                } else
                    Yii::$app->session->setFlash('public-alert', ['type' => 'danger', 'message' => Yii::t('words', 'message.dangerMsg')]);
            } else
                Yii::$app->session->setFlash('public-alert', ['type' => 'danger', 'message' => Yii::t('words', 'message.dangerMsg')]);
        }

        return $this->render($view, [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSearch()
    {
        $term = Yii::$app->request->getQueryParam('q');
        if ($term && !empty($term)) {
//            $term = Helper::persian2Arabic($term);

            $searchPost = new PostSearch();
            $searchPost->name = $term;
            $searchPost->summary = $term;
            $searchPost->type = Post::TYPE_NEWS;
            $searchPost->status = Post::STATUS_PUBLISHED;
            $newsProvider = $searchPost->search([]);
            $newsProvider->getPagination()->pageSize = 50;

            $searchPost = new PostSearch();
            $searchPost->name = $term;
            $searchPost->summary = $term;
            $searchPost->type = Post::TYPE_ARTICLE;
            $searchPost->status = Post::STATUS_PUBLISHED;
            $articleProvider = $searchPost->search([]);
            $articleProvider->getPagination()->pageSize = 50;

            $searchPage = new PageSearch();
            $searchPage->name = $term;
            $searchPage->body = $term;
            $searchPage->status = Page::STATUS_PUBLISHED;
            $pageProvider = $searchPage->search([]);
            $pageProvider->getPagination()->pageSize = 100;

            $searchMenu = new MenuSearch();
            $searchMenu->name = $term;
            $searchMenu->status = Menu::STATUS_PUBLISHED;
            $searchMenu->menu_type = [Menu::MENU_TYPE_ACTION, Menu::MENU_TYPE_EXTERNAL_LINK];
            $menuProvider = $searchMenu->search([]);
            $menuProvider->getPagination()->pageSize = 100;

            return $this->render('search', compact('term', 'newsProvider', 'articleProvider', 'pageProvider', 'menuProvider'));
        } else
            return $this->goBack();
    }

    public function actionTest()
    {
        dd(Apartment::find()->count());
    }

    /*public function actionTest()
    {
        $insurances = [
            ['name' => 'بيمه تامين اجتماعي'],
            ['name' => 'بيمه سلامت'],
            ['name' => 'بيمه ايران'],
            ['name' => 'بيمه آسيا'],
            ['name' => 'بيمه البرز'],
            ['name' => 'بيمه دانا '],
            ['name' => 'بيمه پارسيان'],
            ['name' => 'بيمه ما'],
            ['name' => 'بيمه ملت'],
            ['name' => 'بيمه نوين '],
            ['name' => 'بيمه تعاون'],
            ['name' => 'بيمه سايپا'],
            ['name' => 'بيمه آتيه سازان حافظ'],
            ['name' => 'بيمه SOS'],
            ['name' => 'بيمه ميهن'],
            ['name' => 'بيمه كارآفرين'],
            ['name' => 'صنايع هواپيمايي'],
            ['name' => 'هواپيمايي آسمان'],
            ['name' => 'شركت هواپيمايي سامان'],
            ['name' => 'شركت نفت فلات قاره'],
            ['name' => 'مجلس شوراي اسلامي'],
            ['name' => 'مركز مشاوره دانشگاه تهران'],
            ['name' => 'بانك مركزي'],
            ['name' => 'بانك ملت'],
            ['name' => 'بانك صادرات'],
            ['name' => 'بانك توسعه صادرات'],
            ['name' => 'بانك تجارت '],
            ['name' => 'بانك رفاه '],
            ['name' => 'بانك مسكن '],
            ['name' => 'بانك سپه '],
            ['name' => 'بانك كشاوري'],
            ['name' => 'بانك صنعت و معدن'],
            ['name' => 'بانك مهر ايران'],
            ['name' => 'صندوق رفاه كيش']
        ];

        $insurances2 = [
            ['name' => 'بيمه تامين اجتماعي'],
            ['name' => 'بيمه سلامت'],
            ['name' => 'بيمه ايران'],
            ['name' => 'بيمه آسيا'],
            ['name' => 'بيمه البرز'],
            ['name' => 'بيمه پارسيان'],
            ['name' => 'بيمه سايپا'],
            ['name' => 'صنايع هواپيمايي'],
            ['name' => 'هواپيمايي آسمان'],
            ['name' => 'شركت سازه گستر سايپا'],
            ['name' => 'مجلس شوراي اسلامي'],
            ['name' => 'بانك مركزي'],
            ['name' => 'بانك ملت'],
            ['name' => 'بانك صادرات'],
            ['name' => 'بانك توسعه صادرات'],
            ['name' => 'بانك تجارت '],
            ['name' => 'بانك رفاه '],
            ['name' => 'بانك مسكن '],
            ['name' => 'بانك سپه '],
            ['name' => 'بانك كشاوري'],
            ['name' => 'بانك صنعت و معدن'],
            ['name' => 'صندوق رفاه كيش']
        ];


        foreach ($insurances as $insurance) {
            $model = new Insurance();
            $model->name = $insurance['name'];
            $model->code = $insurance['code'];
            $model->type = Insurance::TYPE_INPATIENT;
            @$model->save();
        }

        foreach ($insurances2 as $insurance) {
            $model = new Insurance();
            $model->name = $insurance['name'];
            $model->code = $insurance['code'];
            $model->type = Insurance::TYPE_OUTPATIENT;
            @$model->save();
        }
    }*/


    public function actionIndex()
    {
        $this->bodyClass = 'home';

        $slides = Slide::find()->valid()->orderBy(['id' => SORT_ASC])->all();
        return $this->render('index', compact('slides'));
    }

    public function actionMoreOne()
    {
        $this->innerPage = true;
        $this->bodyClass = 'more-one';
        return $this->render('more-one');
    }

    public function actionProjectList()
    {
        $this->innerPage = true;
        $this->bodyClass = 'more-one';
        return $this->render('project-list');
    }

    public function actionTextPage()
    {
        $this->innerPage = true;
        $this->bodyClass = 'text-page';
        return $this->render('text-page');
    }

    public function actionSpecial()
    {
        $this->innerPage = true;
        $this->bodyClass = 'final-project-view special';
        return $this->render('special');

    }

    public function actionIn()
    {
        $this->innerPage = true;
        $this->bodyClass = 'final-project-view';
        return $this->render('in');
    }

}
