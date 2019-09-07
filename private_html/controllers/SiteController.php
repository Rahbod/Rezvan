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
            'about',
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


    public function actionIndex()
    {
        $this->bodyClass = 'home';

        $slides = Slide::find()->valid()->orderBy(['id' => SORT_ASC])->all();
        return $this->render('index', compact('slides'));
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->innerPage = true;
        $this->bodyClass = 'text-page';

        return $this->render('contact', compact($this->getProjects()));
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->innerPage = true;
        $this->bodyClass = 'text-page';
        return $this->render('about', compact($this->getProjects()));
    }

    public function actionMoreOne()
    {
        $this->innerPage = true;
        $this->bodyClass = 'more-one';
        return $this->render('more-one');
    }

    public function getProjects()
    {
        return Apartment::find()->orderBy(['id' => SORT_DESC,])->all();
    }
}
