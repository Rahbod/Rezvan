<?php

namespace app\controllers;

use devgroup\dropzone\UploadedFiles;
use Yii;
use app\components\Setting;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use app\models\ProjectSection;
use app\components\AuthController;
use yii\helpers\Html;
use app\components\CrudControllerTrait;
use app\components\CrudControllerInterface;
use yii\helpers\Url;

/**
 * SectionController implements the CRUD actions for ProjectSection model.
 */
class SectionController extends AuthController implements CrudControllerInterface
{
    use CrudControllerTrait;

    public $indexTitle = 'Register Section';
    public $createTitle = 'Create Section';
    public $updateTitle = 'Update Section: {name}';
    public $viewTitle = 'View Section: {name}';

    public static $iconDir = 'uploads/register/section';
    public static $imageDir = 'uploads/register/section';
    public static $videoDir = 'uploads/register/video';
    public static $iconOptions = [];
    public static $imageOptions = [];

    /**
     * @return string
     */
    public function getModelName()
    {
        return ProjectSection::className();
    }

    public function getViewPath()
    {
        return '@app/views/layouts/default_crud';
    }

    public function getSystemActions()
    {
        return [
            'upload-icon', 'delete-icon', 'upload-icon-hover', 'delete-icon-hover', 'upload-image', 'delete-image', 'archive'
        ];
    }

    public function uploaderAttributes()
    {
        return [
            'icon' => ['dir' => self::$iconDir, 'options' => self::$iconOptions],
            'icon_hover' => ['dir' => self::$iconDir, 'options' => self::$iconOptions],
            'image' => ['dir' => self::$imageDir, 'options' => self::$imageOptions],
        ];
    }

    public function actions()
    {
        return [
                'upload-video' => [
                    'class' => UploadAction::className(),
                    'fileName' => 'sectionVideo',
                    'rename' => UploadAction::RENAME_UNIQUE,
                    'validateOptions' => array(
                        'acceptedTypes' => array('mp4')
                    )
                ],
                'delete-video' => [
                    'class' => RemoveAction::className(),
                    'upload' => self::$videoDir,
                    'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                    'options' => []
                ],

                'upload-icon' => [
                    'class' => UploadAction::className(),
                    'fileName' => Html::getInputName(new ProjectSection(), 'icon'),
                    'rename' => UploadAction::RENAME_UNIQUE,
                    'validateOptions' => array(
                            'acceptedTypes' => array('svg')
                    )
                ],
                'delete-icon' => [
                        'class' => RemoveAction::className(),
                        'upload' => self::$iconDir,
                        'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                        'model' => new ProjectSection(),
                        'attribute' => 'icon',
                        'options' => static::$iconOptions
                ],

                'upload-icon-hover' => [
                    'class' => UploadAction::className(),
                    'fileName' => Html::getInputName(new ProjectSection(), 'icon_hover'),
                    'rename' => UploadAction::RENAME_UNIQUE,
                    'validateOptions' => array(
                            'acceptedTypes' => array('svg')
                    )
                ],
                'delete-icon-hover' => [
                        'class' => RemoveAction::className(),
                        'upload' => self::$iconDir,
                        'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                        'model' => new ProjectSection(),
                        'attribute' => 'icon_hover',
                        'options' => static::$iconOptions
                ],

                'upload-image' => [
                        'class' => UploadAction::className(),
                        'fileName' => Html::getInputName(new ProjectSection(), 'image'),
                        'rename' => UploadAction::RENAME_UNIQUE,
                        'validateOptions' => array(
                                'acceptedTypes' => array('png', 'jpg', 'jpeg')
                        )
                ],
                'delete-image' => [
                        'class' => RemoveAction::className(),
                        'upload' => self::$imageDir,
                        'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                        'model' => new ProjectSection(),
                        'attribute' => 'image',
                        'options' => static::$imageOptions
                ],
        ];
    }
}