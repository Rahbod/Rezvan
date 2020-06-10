<?php

namespace app\models;

use app\components\customWidgets\CustomActionColumn;
use app\components\MainController;
use app\controllers\SectionVideoController;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "item".
 *
 * @property string $video
 */
class ProjectSectionVideo extends Item
{
    public static $multiLanguage = false;
    public static $modelName = 'project-section-video';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            'video' => ['CHAR', ''],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function formAttributes()
    {
        return array_merge(parent::formAttributes(), [
            'video' => [
                'type' => self::FORM_FIELD_TYPE_DROP_ZONE,
                'hint' => 'ویدئو با فرمت MP4',
                'containerCssClass' => 'col-sm-4',
                'temp' => MainController::$tempDir,
                'path' => SectionVideoController::$videoDir,
                'filesOptions' => SectionVideoController::$videoOptions,
                'options' => [
                    'url' => Url::to(['upload-video']),
                    'removeUrl' => Url::to(['delete-video']),
                    'sortable' => false, // sortable flag
                    'sortableOptions' => [], // sortable options
                    'htmlOptions' => ['class' => '', 'id' => Html::getInputId(new self(), 'video')],
                    'options' => [
                        'createImageThumbnails' => true,
                        'addRemoveLinks' => true,
                        'dictRemoveFile' => 'حذف',
                        'addViewLinks' => true,
                        'dictViewFile' => '',
                        'dictDefaultMessage' => 'جهت آپلود ویدئو کلیک کنید',
                        'acceptedFiles' => 'mp4',
                        'maxFiles' => 1,
                        'maxFileSize' => 100,
                    ],
                ]
            ],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['video', 'required'],
            ['video', 'string'],
            ['modelID', 'default', 'value' => Model::findOne(['name' => self::$modelName])->id],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'icon' => trans('words', 'Video'),
        ]);
    }

    /**
     * {@inheritdoc}
     * @return ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }

    public function tableColumns()
    {
        return [
            'name',
            [
                'class' => CustomActionColumn::className(),
                'template' => '{update} {delete}'
            ]
        ];
    }

    public function getVideoSrc()
    {
        if(is_file(alias('@webroot').DIRECTORY_SEPARATOR.SectionVideoController::$videoDir.DIRECTORY_SEPARATOR.$this->video)) {
            $path = Yii::$app->request->getBaseUrl();
            return $path . '/' . SectionVideoController::$videoDir . '/' . $this->video;
        }
        return null;
    }
}