<?php

namespace app\controllers;

use Yii;
use app\components\CrudController;
use app\components\Setting;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use devgroup\dropzone\UploadedFiles;
use app\models\Slide;
use app\models\SlideSearch;
use app\components\AuthController;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends AuthController
{
    use CrudController; // add crud functions [index, create, update, delete]

    public static $modelName = 'app\models\Slide';

    public $imageDir = 'uploads/slide';
    private $imageOptions = [];

    public function getSystemActions()
    {
        return [
            'upload-image',
            'delete-image',
        ];
    }

    public function uploaderAttributes(){
        return [
            'image' => [
                'dir' => $this->imageDir,
                'options' => $this->imageOptions,
            ]
        ];
    }

    public function actions()
    {
        return [
            'upload-image' => [
                'class' => UploadAction::className(),
                'fileName' => Html::getInputName(new Slide(), 'image'),
                'rename' => UploadAction::RENAME_UNIQUE,
                'validateOptions' => array(
                    'acceptedTypes' => array('png', 'jpg', 'jpeg')
                )
            ],
            'delete-image' => [
                'class' => RemoveAction::className(),
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new Slide(),
                'attribute' => 'image',
                'upload' => $this->imageDir
            ]
        ];
    }

    public function actionSetting()
    {
        if (Yii::$app->request->post()) {
            $postData = \Yii::$app->request->post('Setting');

            ## region validation post data
            $config = Setting::getAll();
            ## endregion validation post data

            Setting::createOrUpdateDefaults($config);
            $config['slider'] = $postData;

            if (Setting::setAll($config)) {
                \Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => \Yii::t('words', 'base.successMsg')]);
                return $this->refresh();
            } else
                \Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => \Yii::t('words', 'base.dangerMsg')]);
        }

        return $this->render('setting');
    }
}
