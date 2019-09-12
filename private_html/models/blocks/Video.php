<?php

namespace app\models\blocks;

use app\components\MainController;
use app\controllers\BlockController;
use app\models\Block;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "item".
 *
 */
class Video extends Block implements BlockInterface
{
    public static $typeName = self::TYPE_VIDEO;

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            'link' => ['CHAR', ''],
            'video' => ['CHAR', ''],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['type', 'default', 'value' => self::$typeName],
            [['link', 'video'], 'string'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'link' => trans('words', 'Link'),
            'video' => trans('words', 'Video file'),
        ]);
    }

    public function formAttributes()
    {
        return array_merge(parent::formAttributes(), [
            'link' => [
                'type' => self::FORM_FIELD_TYPE_TEXT_AREA,
                'containerCssClass' => 'col-sm-12',
                'options' => ['dir' => 'auto']
            ],
            'video' => [
                'type' => static::FORM_FIELD_TYPE_DROP_ZONE,
                'containerCssClass' => 'col-sm-12',
                'temp' => MainController::$tempDir,
                'path' => BlockController::$videoDir,
                'filesOptions' => [],
                'options' => [
                    'name' => Html::getInputName(new Block(), 'video'),
                    'url' => Url::to(['upload-video']),
                    'removeUrl' => Url::to(['delete-video']),
                    'sortable' => false, // sortable flag
                    'sortableOptions' => [], // sortable options
                    'htmlOptions' => ['class' => '', 'id' => Html::getInputId(new Block(), 'video')],
                    'options' => [
                        'createImageThumbnails' => false,
                        'addRemoveLinks' => true,
                        'dictRemoveFile' => 'حذف',
                        'addViewLinks' => true,
                        'dictViewFile' => '',
                        'dictDefaultMessage' => 'جهت آپلود ویدئو کلیک کنید',
                        'acceptedFiles' => 'mp4',
                        'maxFiles' => 1,
                        'maxFileSize' => 50,
                    ],
                ]
            ],
        ]);
    }

    public function render()
    {

    }
}