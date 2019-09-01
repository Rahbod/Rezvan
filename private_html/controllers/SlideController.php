<?php

namespace app\controllers;

use Yii;
use app\components\CrudControllerTrait;
use app\components\Setting;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use app\models\Slide;
use app\components\AuthController;
use yii\helpers\Html;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends AuthController
{
    use CrudControllerTrait; // add crud functions [index, create, update, delete]

    // crud controller trait properties
    public static $modelName = 'app\models\Slide';
    public static $routeAfterSave = 'index';
    // end

    public static $imgDir = 'uploads/slide';
    public static $imageOptions = [];

    public function getSystemActions()
    {
        return [
            'upload-image',
            'delete-image',
        ];
    }

    public function uploaderAttributes()
    {
        return [
            'image' => [
                'dir' => static::$imgDir,
                'options' => static::$imageOptions,
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
                'upload' => static::$imgDir
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
