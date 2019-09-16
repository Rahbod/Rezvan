<?php

namespace app\controllers;

use app\components\AuthController;
use app\components\CrudControllerTrait;
use app\models\Page;
use app\models\projects\Apartment;
use app\models\projects\ApartmentSearch;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use devgroup\dropzone\UploadedFiles;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ApartmentController implements the CRUD actions for Apartment model.
 */
class ApartmentController extends AuthController
{
    use CrudControllerTrait;

    public static $imgDir = 'uploads/apartment';

    public static $imageOptions = ['thumbnail' => [
        'width' => 100,
        'height' => 100
    ]];

    /**
     * @return string
     */
    public function getModelName()
    {
        return Apartment::className();
    }

    public function getMenuActions()
    {
        return ['index'];
    }

    public function uploaderAttributes()
    {
        return [
            'image' => [
                'dir' => self::$imgDir,
                'options' => self::$imageOptions
            ]
        ];
    }

    public function actions()
    {
        return [
            'upload-image' => [
                'class' => UploadAction::className(),
                'fileName' => Html::getInputName(new Apartment(), 'image'),
                'rename' => UploadAction::RENAME_UNIQUE,
                'validateOptions' => array(
                    'acceptedTypes' => array('png', 'jpg', 'jpeg')
                )
            ],
            'delete-image' => [
                'class' => RemoveAction::className(),
                'upload' => self::$imgDir,
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new Apartment(),
                'attribute' => 'image',
                'options' => static::$imageOptions
            ],
        ];
    }

    // ----------------rezvan methods ------------------
    public function actionList()
    {
        $this->setTheme('frontend');

        $this->innerPage = true;
        $this->bodyClass = 'more-one';

        /** @var Apartment[] $projects */
        $projects = Apartment::find()->orderBy([
            'id' => SORT_DESC,
        ])->all();
//        return $this->render('list', ['projects' => $projects]);
        $availableApartments = Apartment::find()->andWhere(['>', Apartment::columnGetString('free_count'), 0])->count();

        return $this->render('list', [
            'projects' => $projects,
            'availableApartments' => $availableApartments,
        ]);
    }

    public function actionShow($id)
    {
        $this->setTheme('frontend');
        $this->innerPage = true;
        $this->bodyClass = 'more-one';

        $projects = Apartment::find($id)->orderBy(['id' => SORT_DESC,])->all();

        return $this->render('list', ['projects' => $projects]);
    }

    public function actionSpecial()
    {
        $this->setTheme('frontend');

        $this->innerPage = true;
        $this->bodyClass = 'final-project-view special';
        return $this->render('special');

    }//show project blocks

    public function actionIn()
    {
        $this->setTheme('frontend');

        $this->innerPage = true;
        $this->bodyClass = 'final-project-view';
        return $this->render('in');
    }//show project units
}
