<?php

namespace app\models\projects;

use app\components\MainController;
use app\controllers\InvestmentController;
use app\models\Project;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "item".
 *
 */
class Investment extends Project implements ProjectInterface
{
    public static $typeName = self::TYPE_INVESTMENT;

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            // define fields that only for investments
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

    public function formAttributes()
    {
        return array_merge(parent::formAttributes(), [
            'image' => [
                'type' => static::FORM_FIELD_TYPE_DROP_ZONE,
                'containerCssClass' => 'col-sm-12',
                'temp' => MainController::$tempDir,
                'path' => InvestmentController::$imgDir,
                'filesOptions' => InvestmentController::$imageOptions,
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

    /**
     * @return string
     */
    public function renderView()
    {
        // TODO: Implement renderView() method.
    }
}