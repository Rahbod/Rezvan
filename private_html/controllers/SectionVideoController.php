<?php

namespace app\controllers;

use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use app\models\ProjectSectionVideo;
use app\components\AuthController;
use app\components\CrudControllerTrait;
use app\components\CrudControllerInterface;
use yii\helpers\Html;

/**
 * SectionController implements the CRUD actions for ProjectSection model.
 */
class SectionVideoController extends AuthController implements CrudControllerInterface
{
    use CrudControllerTrait;

    public $indexTitle = 'Section Video';
    public $createTitle = 'Create Video';
    public $updateTitle = 'Update Video: {name}';
    public $viewTitle = 'View Video: {name}';

    public static $videoDir = 'uploads/register/video';
    public static $videoOptions = [];

    /**
     * @return string
     */
    public function getModelName()
    {
        return ProjectSectionVideo::className();
    }

    public function getViewPath()
    {
        return '@app/views/layouts/default_crud';
    }

    public function getSystemActions()
    {
        return [
            'upload-video', 'delete-video'
        ];
    }

    public function uploaderAttributes()
    {
        return [
            'video' => ['dir' => self::$videoDir, 'options' => self::$videoOptions],
        ];
    }

    public function actions()
    {
        return [
            'upload-video' => [
                'class' => UploadAction::className(),
                'fileName' => Html::getInputName(new ProjectSectionVideo(), 'video'),
                'rename' => UploadAction::RENAME_UNIQUE,
                'validateOptions' => array(
                    'acceptedTypes' => array('mp4')
                )
            ],
            'delete-video' => [
                'class' => RemoveAction::className(),
                'upload' => self::$videoDir,
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new ProjectSectionVideo(),
                'attribute' => 'video',
                'options' => static::$videoOptions
            ],
        ];
    }
}