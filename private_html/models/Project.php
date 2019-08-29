<?php

namespace app\models;

use app\components\MainController;
use app\controllers\ApartmentController;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "item".
 *
 */
class Project extends Item
{
    const TYPE_AVAILABLE_APARTMENT = 1;
    const TYPE_INVESTMENT = 2;
    const TYPE_OTHER_CONSTRUCTION = 3;

    public static $multiLanguage = false;
    public static $modelName = 'project';

    public static $typeLabels = [
        self::TYPE_AVAILABLE_APARTMENT => 'Available Apartments',
        self::TYPE_INVESTMENT => 'Investments',
        self::TYPE_OTHER_CONSTRUCTION => 'Other constructions'
    ];

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
            // define common fields in project types
            'subtitle' => ['CHAR', ''],
            'image' => ['CHAR', ''],
            'begin_date' => ['CHAR', ''],
            'construction_time' => ['CHAR', ''],
            'location' => ['CHAR', ''],
            'area_size' => ['INTEGER', ''],
            'unit_count' => ['INTEGER', ''],
            'free_count' => ['INTEGER', ''],
            'sold_count' => ['INTEGER', ''],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['modelID', 'default', 'value' => isset(Yii::$app->controller->models[self::$modelName]) ? Yii::$app->controller->models[self::$modelName] : null],
            [['subtitle', 'begin_date', 'construction_time', 'location', 'image'], 'string'],
            [['area_size', 'unit_count', 'free_count', 'sold_count'], 'integer']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'subtitle' => Yii::t('words', 'Subtitle'),
            'image' => Yii::t('words', 'Image'),
            'begin_date' => Yii::t('words', 'Begin date'),
            'construction_time' => Yii::t('words', 'Construction time'),
            'location' => Yii::t('words', 'Location'),
            'area_size' => Yii::t('words', 'Area size'),
            'unit_count' => Yii::t('words', 'Unit count'),
            'free_count' => Yii::t('words', 'Free count'),
            'sold_count' => Yii::t('words', 'Sold count'),
        ]);
    }

    public function getTypeLabel($type = false)
    {
        if (!$type)
            $type = $this->type;
        return Yii::t('words', ucfirst(self::$typeLabels[$type]));
    }

    public static function getTypeLabels()
    {
        $lbs = [];
        foreach (self::$typeLabels as $key => $label)
            $lbs[$key] = Yii::t('words', ucfirst($label));
        return $lbs;
    }

    /**
     * {@inheritdoc}
     * @return ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }

    public function formAttributes()
    {
        return array_merge(parent::formAttributes(), [
            'name' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'subtitle' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'construction_time' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'begin_date' => [
                'type' => self::FORM_FIELD_TYPE_DATE,
                'options' => [
                    'options' => array(
                        'format' => 'yyyy/mm/dd',
                        'viewformat' => 'yyyy/mm/dd',
                        'placement' => 'right',
                    ),
                    'htmlOptions' => [
                        'class' => 'form-control m-input m-input--solid',
                        'autocomplete' => 'off'
                    ]
                ]
            ],
            'location' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'area_size' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'unit_count' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'free_count' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'sold_count' => ['type' => self::FORM_FIELD_TYPE_TEXT],
            'status' => ['type' => self::FORM_FIELD_TYPE_SWITCH],
            'image' => [
                'type' => static::FORM_FIELD_TYPE_DROP_ZONE,
                'containerCssClass' => 'col-sm-12',
                'temp' => MainController::$tempDir,
                'path' => ApartmentController::$imgDir,
                'filesOptions' => ApartmentController::$imageOptions,
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
