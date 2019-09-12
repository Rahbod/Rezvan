<?php

namespace app\controllers;

use app\components\AuthController;
use app\components\customWidgets\CustomCaptchaAction;
use app\models\Item;
use app\models\Menu;
use app\models\MenuSearch;
use app\models\Page;
use app\models\PageSearch;
use app\models\Post;
use app\models\PostSearch;
use app\models\Project;
use app\models\projects\Apartment;
use app\models\projects\ApartmentSearch;
use app\models\projects\Investment;
use app\models\projects\InvestmentSearch;
use app\models\projects\OtherConstruction;
use app\models\Slide;
use Symfony\Component\EventDispatcher\Tests\Service;
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
        $term = Yii::$app->request->getQueryParam('query');
        if ($term && !empty($term)) {
            $searchApartment = new ApartmentSearch();
            $searchApartment->name = $term;
            $searchApartment->sub_title = $term;
            $searchApartment->type = Project::TYPE_AVAILABLE_APARTMENT;
            $apartmentProvider = $searchApartment->search([]);
            $apartmentProvider->getPagination()->pageSize = 50;

            $searchInvestment = new InvestmentSearch();
            $searchInvestment->name = $term;
            $searchInvestment->sub_title = $term;
            $searchInvestment->type = Project::TYPE_INVESTMENT;
            $investmentProvider = $searchInvestment->search([]);
            $investmentProvider->getPagination()->pageSize = 50;

            $searchConstruction = new InvestmentSearch();
            $searchConstruction->name = $term;
            $searchConstruction->sub_title = $term;
            $searchConstruction->type = Project::TYPE_OTHER_CONSTRUCTION;
            $constructionProvider = $searchConstruction->search([]);
            $constructionProvider->getPagination()->pageSize = 50;

//            $searchPage = new PageSearch();
//            $searchPage->name = $term;
//            $searchPage->body = $term;
//            $searchPage->status = Page::STATUS_PUBLISHED;
//            $pageProvider = $searchPage->search([]);
//            $pageProvider->getPagination()->pageSize = 100;

            return $this->render('search', compact('term', 'investmentProvider',
                'constructionProvider', 'searchApartment'));
        } else
            return $this->goBack();
    }


    public function actionIndex()
    {
        $this->bodyClass = 'home';

        $apartmentCounts = Apartment::find()->count();
        $investmentCounts = Investment::find()->count();
        $constructionCounts = OtherConstruction::find()->count();

        $services = Item::find()->where(['=','name','SERVICES'])->orderBy(['id' => SORT_DESC,])->all();
        $slides = Slide::find()->valid()->orderBy(['id' => SORT_ASC])->all();

        $availableApartments = Apartment::find()->orderBy(['id' => SORT_DESC,])->andWhere(['>', Apartment::columnGetString('free_count'), 0])->all();
        $availableInvestments = Investment::find()->orderBy(['id' => SORT_DESC,])->andWhere(['>', Investment::columnGetString('free_count'), 0])->all();
        $availableConstructions = OtherConstruction::find()->orderBy(['id' => SORT_DESC,])->andWhere(['>', OtherConstruction::columnGetString('free_count'), 0])->all();

        return $this->render('index', compact(['slides', 'apartmentCounts', 'investmentCounts',
            'constructionCounts','availableApartments','availableInvestments','availableConstructions','services']));
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

        return $this->render('contact', ['availableApartments' => ($this->getProjects())]);

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
        return $this->render('about', ['availableApartments' => ($this->getProjects())]);
    }


    public function getProjects()
    {
        return Apartment::find()->andWhere(['>', Apartment::columnGetString('free_count'), 0])->all();
    }
}
