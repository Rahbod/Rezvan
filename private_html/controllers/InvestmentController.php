<?php

namespace app\controllers;

use app\components\AuthController;
use app\components\CrudControllerTrait;
use app\models\Project;
use app\models\projects\Apartment;
use app\models\projects\Investment;
use app\models\projects\InvestmentSearch;
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
 * InvestmentController implements the CRUD actions for Investment model.
 */
class InvestmentController extends AuthController
{
    use CrudControllerTrait;

    public static $imgDir = 'uploads/investment';
    public static $imageOptions = ['thumbnail' => [
        'width' => 100,
        'height' => 100
    ]];

    /**
     * @return string
     */
    public function getModelName()
    {
        return Investment::className();
    }

    public function getMenuActions()
    {
        return ['list'];
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
                'fileName' => Html::getInputName(new Investment(), 'image'),
                'rename' => UploadAction::RENAME_UNIQUE,
                'validateOptions' => array(
                    'acceptedTypes' => array('png', 'jpg', 'jpeg')
                )
            ],
            'delete-image' => [
                'class' => RemoveAction::className(),
                'upload' => self::$imgDir,
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new Investment(),
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
        $projects = Investment::find()->orderBy([
            'id' => SORT_DESC,
        ])->all();

        $availableApartments = Investment::find()->count();

        return $this->render('list', [
            'projects' => $projects,
            'availableApartments' => $availableApartments,
        ]);
    }

    public function actionShow($id)
    {
        $this->setTheme('frontend');
        $this->innerPage = true;

        $model = $this->findModel($id);

        if($model->project_type == Project::SINGLE_VIEW)
            $this->bodyClass = 'final-project-view';
        else
            $this->bodyClass = 'more-one';

        return $this->render('show', compact('model'));
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
