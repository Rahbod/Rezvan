<?php

namespace app\controllers;

use app\components\AuthController;
use app\components\customWidgets\CustomCaptchaAction;
use app\components\MultiLangActiveRecord;
use app\components\Setting;
use app\models\ContactForm;
use app\models\Message;
use app\models\projects\Apartment;
use app\models\projects\ApartmentSearch;
use app\models\projects\Investment;
use app\models\projects\OtherConstruction;
use app\models\Service;
use app\models\Slide;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

//use Symfony\Component\EventDispatcher\Tests\Service;

class SiteController extends AuthController
{

    public function getMenuActions()
    {
        return [
            'index',
            'contact',
            'infography',
            'coming-soon'
//            'about',
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

    public function actionComingSoon()
    {
        return $this->renderPartial('coming_soon');
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
                'setTheme' => true,
                'width' => 130,
                'height' => 40,
                'transparent' => true,
                'onlyNumber' => true,
                'foreColor' => 0x555555,
                'minLength' => 4,
                'maxLength' => 4,
                'fontFile' => '@webroot/themes/frontend/assets/fonts/OpenSans-Bold.ttf'
            ],
        ];
    }


//    public function actionError()
//    {
//        var_dump(Yii::$app->request);exit;
//    }

    public function actionChangeLang($language = false, $controller = false, $action = false)
    {
        if ($language && in_array($language, array_keys(MultiLangActiveRecord::$langArray))) {
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
        $this->innerPage = true;
        $this->bodyClass = 'more-one list';

        $availableApartments = Apartment::find()->valid()->andWhere(['>', Apartment::columnGetString('free_count'), 0])->count();

        $term = Yii::$app->request->getQueryParam('query');
        if ($term && !empty($term)) {
            $searchApartment = new ApartmentSearch();
            $searchApartment->name = $term;
            $searchApartment->subtitle = $term;
            $apartmentProvider = $searchApartment->search([]);
            $apartmentProvider->getPagination()->pageSize = 20;

//            $searchInvestment = new InvestmentSearch();
//            $searchInvestment->name = $term;
//            $searchInvestment->subtitle = $term;
//            $investmentProvider = $searchInvestment->search([]);
//            $investmentProvider->getPagination()->pageSize = 20;
//
//            $searchConstruction = new OtherConstructionSearch();
//            $searchConstruction->name = $term;
//            $searchConstruction->subtitle = $term;
//            $constructionProvider = $searchConstruction->search([]);
//            $constructionProvider->getPagination()->pageSize = 20;

//            $searchPage = new PageSearch();
//            $searchPage->name = $term;
//            $searchPage->body = $term;
//            $searchPage->status = Page::STATUS_PUBLISHED;
//            $pageProvider = $searchPage->search([]);
//            $pageProvider->getPagination()->pageSize = 100;

//            $services = Service::find()->all();

            return $this->render('//apartment/list', [
                'projects' => $apartmentProvider->getModels(),
                'availableApartments' => $availableApartments,
            ]);

//            return $this->render('search', compact('term', 'investmentProvider',
//                'constructionProvider', 'searchApartment', 'apartmentProvider', 'services'));
        } else
            return $this->goBack();
    }


    public function actionIndex()
    {
        $this->bodyClass = 'home';

        $apartmentCounts = Apartment::find()->valid()->count();
        $investmentCounts = Investment::find()->valid()->count();
        $constructionCounts = OtherConstruction::find()->valid()->count();

//        $services = Service::find()->where(['=','name','SERVICES'])->orderBy(['id' => SORT_DESC,])->all();
        $services = Service::find()->all();
        $slides = Slide::find()->valid()->orderBy(['id' => SORT_ASC])->all();

        $availableApartments = Apartment::find()->valid()->orderBy([Apartment::columnGetString('special') => SORT_DESC, 'id' => SORT_DESC])->andWhere(['>', Apartment::columnGetString('free_count'), 0])->all();
        $availableInvestments = Investment::find()->valid()->orderBy([Investment::columnGetString('special') => SORT_DESC, 'id' => SORT_DESC])->andWhere(['>', Investment::columnGetString('free_count'), 0])->all();
        $availableConstructions = OtherConstruction::find()->valid()->orderBy([OtherConstruction::columnGetString('special') => SORT_DESC, 'id' => SORT_DESC])
//            ->andWhere(['>', OtherConstruction::columnGetString('free_count'), 0])
            ->all();

        return $this->render('index', compact(['slides', 'apartmentCounts', 'investmentCounts',
            'constructionCounts', 'availableApartments', 'availableInvestments', 'availableConstructions', 'services']));
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->setTheme('frontend');
        $this->innerPage = true;
        $this->bodyClass = 'more-one list';
        $this->mainTag = 'main-submit-page';

        $model = new ContactForm();

        if (Yii::$app->request->isAjax and !Yii::$app->request->isPjax) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {

                $message = new Message();
                $message->name = $model->name;
                $message->tel = $model->tel;
                $message->subject = $model->subject;
                $message->email = $model->email;
                $message->body = $model->body;
                if ($message->save())
                    $model->contact(Setting::get('email'));

                Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => trans('words', 'base.successMsg')]);
                return $this->refresh();
            } else
                Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => trans('words', 'base.dangerMsg')]);
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }
//
//    /**
//     * Displays about page.
//     *
//     * @return string
//     */
//    public function actionAbout()
//    {
//        $this->setTheme('frontend');
//        $this->innerPage = true;
//        $this->bodyClass = 'text-page';
//        $this->headerClass = 'header-style-2';
//        $this->mainTag = 'main-text-page';
//
//        $model = Page::find()->one();
//
//        $availableApartments = Apartment::find()->andWhere(['>', Apartment::columnGetString('free_count'), 0])->all();
//
//        return $this->render('//page/show', compact('availableApartments', 'model'));
//    }


    public function getProjects()
    {
        return Apartment::find()->valid()->andWhere(['>', Apartment::columnGetString('free_count'), 0])->all();
    }

    public function actionInfography()
    {
        $this->setTheme('frontend');
        $this->layout = 'infography';

        return $this->render('info');
    }

//    public function actionOcr()
//    {
////        $this->setTheme('default');
////
//        $path = 'gs://path/to/your/document.pdf';
//        $path = alias('@webroot/uploads/pdf/Request file - 370.pdf');
//        $output = 'gs://path/to/store/results/';
//        $output = alias('@webroot/uploads/pdf/Request file - 370.pdf.txt');
//
//        # select ocr feature
//        $feature = (new Feature())
//            ->setType(Type::DOCUMENT_TEXT_DETECTION);
//
//        # set $path (file to OCR) as source
//        $gcsSource = (new GcsSource())
//            ->setUri($path);
//        # supported mime_types are: 'application/pdf' and 'image/tiff'
//        $mimeType = 'application/pdf';
//        $inputConfig = (new InputConfig())
//            ->setContent(file_get_contents($path))
////            ->setGcsSource($gcsSource)
//            ->setMimeType($mimeType);
//
//        # set $output as destination
//        $gcsDestination = (new GcsDestination())
//            ->setUri($output);
//        # how many pages should be grouped into each json output file.
//        $batchSize = 2;
//        $outputConfig = (new OutputConfig())
//            ->setGcsDestination($gcsDestination)
//            ->setBatchSize($batchSize);
//
//        # prepare request using configs set above
//        $request = (new AsyncAnnotateFileRequest())
//            ->setFeatures([$feature])
//            ->setInputConfig($inputConfig)
//            ->setOutputConfig($outputConfig);
//        $requests = [$request];
//
//        # make request
//        $imageAnnotator = new ImageAnnotatorClient();
//        $operation = $imageAnnotator->asyncBatchAnnotateFiles($requests);
//        print('Waiting for operation to finish.' . PHP_EOL);
//        $operation->pollUntilComplete();
//
//        # once the request has completed and the output has been
//        # written to GCS, we can list all the output files.
//        preg_match('/^gs:\/\/([a-zA-Z0-9\._\-]+)\/?(\S+)?$/', $output, $match);
//        $bucketName = $match[1];
//        $prefix = isset($match[2]) ? $match[2] : '';
//
//        $storage = new StorageClient();
//        $bucket = $storage->bucket($bucketName);
//        $options = ['prefix' => $prefix];
//        $objects = $bucket->objects($options);
//
//        # save first object for sample below
//        $objects->next();
//        $firstObject = $objects->current();
//
//        # list objects with the given prefix.
//        print('Output files:' . PHP_EOL);
//        foreach ($objects as $object) {
//            print($object->name() . PHP_EOL);
//        }
//
//        # process the first output file from GCS.
//        # since we specified batch_size=2, the first response contains
//        # the first two pages of the input file.
//        $jsonString = $firstObject->downloadAsString();
//        $firstBatch = new AnnotateFileResponse();
//        $firstBatch->mergeFromJsonString($jsonString);
//
//        # get annotation and print text
//        foreach ($firstBatch->getResponses() as $response) {
//            $annotation = $response->getFullTextAnnotation();
//            print($annotation->getText());
//        }
//
//        $imageAnnotator->close();
//    }

//    public function actionClearFiles()
//    {
//        $folder = \request()->get('folder');
//        $path = alias('@webroot/uploads/' . $folder . '/');
//        if (!is_dir($path))
//            throw new HttpException(500, 'Folder not exits.');
//
//        $valid = [];
//        $notValid = [];
//        foreach (scandir($path) as $item) {
//            if ($item == '.' || $item == '..' || $item == 'thumbs')
//                continue;
//            $ext = pathinfo($item, PATHINFO_EXTENSION);
//            if (in_array($ext, ['png', 'jpg', 'jpeg'])) {
//                /** @var Block $block */
//                $block = Block::find()->andWhere([Block::columnGetString('image') => $item])->one();
//                if ($block && ($block->project || $block->unit))
//                    $valid[] = $item;
//                else
//                    unlink($path . $item);
//            } else if (in_array($ext, ['mp4'])) {
//                /** @var Block $block */
//                $block = Block::find()->andWhere([Block::columnGetString('video') => $item])->one();
//                if ($block && ($block->project || $block->unit))
//                    $valid[] = $item;
//                else
//                    unlink($path . $item);
//            }
//        }
//
//        dd(count(scandir($path)) - 3, $valid, scandir($path));
//    }
//
//    public function actionDeleteBlocks()
//    {
//        /** @var Block $block */
//        $valid = [];
//        $invalid = [];
//        foreach (Block::find()->all() as $block) {
//            if ($block && ($block->project || $block->unit))
//                $valid[] = ['id' => $block->id, 'itemID' => $block->itemID, 'type' => $block->project ? 'pr' : ($block->unit ? 'un' : 'na')];
//            else {
//                $invalid[] = ['id' => $block->id, 'itemID' => $block->itemID];
//                $block->delete();
//            }
//        }
//
//        dd(Block::find()->count(), $valid, $invalid);
//    }
//
//    public function actionDeleteUnits()
//    {
//        $valid = [];
//        $invalid = [];
//        /** @var Unit $block */
//        foreach (Unit::find()->all() as $block) {
//            if ($block && $block->project)
//                $valid[] = ['id' => $block->id, 'itemID' => $block->itemID];
//            else {
//                $invalid[] = ['id' => $block->id, 'itemID' => $block->itemID];
//                $block->delete();
//            }
//        }
//
//        dd(Unit::find()->count(), $valid, $invalid);
//    }

}