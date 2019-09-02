<?php

namespace app\models\projects;

use app\components\MainController;
use app\controllers\ConstructionController;
use app\models\Project;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "item".
 *
 */
class OtherConstruction extends Project implements ProjectInterface
{
    public static $typeName = self::TYPE_OTHER_CONSTRUCTION;

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            // define fields that only for other constructions
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['type', 'default', 'value' => self::$typeName],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [

        ]);
    }

    /**
     * @return string
     */
    public function render()
    {
        // TODO: Implement render() method.
    }

    /**
     * @return string
     */
    public function renderView()
    {
        // TODO: Implement renderView() method.
    }

    public function formAttributes()
    {
        return array_merge(parent::formAttributes(), [
            'image' => [
                'type' => static::FORM_FIELD_TYPE_DROP_ZONE,
                'containerCssClass' => 'col-sm-12',
                'temp' => MainController::$tempDir,
                'path' => ConstructionController::$imgDir,
                'filesOptions' => ConstructionController::$imageOptions,
                'options' => [
                    'url' => Url::to(['upload-image']),
                    'removeUrl' => Url::to(['delete-image']),
                    'sortable' => false, // sortable flag
                    'sortableOptions' => [], // sortable options
                    'htmlOptions' => ['class' => '', 'id' => Html::getInputId(new self(), 'image')],
                    'options' => [
                        'createImageThumbnails' => true,
                        'addRemoveLinks' => true,
                        'dictRemoveFile' => 'حذف',
                        'addViewLinks' => true,
                        'dictViewFile' => '',
                        'dictDefaultMessage' => 'جهت آپلود تصویر کلیک کنید',
                        'acceptedFiles' => 'png, jpeg, jpg',
                        'maxFiles' => 1,
                        'maxFileSize' => 0.5,
                    ],
                ]
            ],

        ]);
    }

}
