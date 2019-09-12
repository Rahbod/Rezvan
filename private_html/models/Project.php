<?php

namespace app\models;

use app\components\MainController;
use app\controllers\ApartmentController;
use app\models\projects\ProjectInterface;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * This is the model class for table "item".
 *
 * @property mixed|null project_type
 */
class Project extends Item implements ProjectInterface
{
    const TYPE_AVAILABLE_APARTMENT = 1;
    const TYPE_INVESTMENT = 2;
    const TYPE_OTHER_CONSTRUCTION = 3;

    const SINGLE_VIEW = 1;
    const MULTI_VIEW = 2;

    public static $multiLanguage = false;
    public static $modelName = 'project';

    public static $typeLabels = [
        self::TYPE_AVAILABLE_APARTMENT => 'Available apartments',
        self::TYPE_INVESTMENT => 'Investments',
        self::TYPE_OTHER_CONSTRUCTION => 'Other constructions'
    ];

    public static $projectTypeLabels = [
        self::SINGLE_VIEW => 'Single view',
        self::MULTI_VIEW => 'Multi view',
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
            'begin_date' => ['CHAR', ''],
            'construction_time' => ['CHAR', ''],
            'location' => ['CHAR', ''],
            'subtitle' => ['CHAR', ''],
            'image' => ['CHAR', ''],
            'area_size' => ['INTEGER', ''],
            'unit_count' => ['INTEGER', ''],
            'unit_per_floor_count' => ['INTEGER', ''],
            'free_count' => ['INTEGER', ''],
            'sold_count' => ['INTEGER', ''],
            'project_type' => ['INTEGER', ''],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['modelID', 'default', 'value' => isset(Yii::$app->controller->models[self::$modelName]) ? Yii::$app->controller->models[self::$modelName] : null],
            [['project_type'], 'required'],
            [['subtitle', 'begin_date', 'construction_time', 'location', 'image'], 'string'],
            [['area_size', 'unit_count', 'free_count', 'sold_count', 'project_type'], 'integer']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'project_type' => trans('words', 'Project type'),
            'subtitle' => trans('words', 'Subtitle'),
            'image' => trans('words', 'Image'),
            'begin_date' => trans('words', 'Begin date'),
            'construction_time' => trans('words', 'Construction time'),
            'location' => trans('words', 'Location'),
            'area_size' => trans('words', 'Area size'),
            'unit_count' => trans('words', 'Unit count'),
            'free_count' => trans('words', 'Free count'),
            'sold_count' => trans('words', 'Sold count'),
        ]);
    }

    public function getTypeLabel($type = false)
    {
        if (!$type)
            $type = $this->type;
        return trans('words', ucfirst(self::$typeLabels[$type]));
    }

    public static function getTypeLabels()
    {
        $lbs = [];
        foreach (self::$typeLabels as $key => $label)
            $lbs[$key] = trans('words', ucfirst($label));
        return $lbs;
    }

    public function getProjectTypeLabel($type = false)
    {
        if (!$type)
            $type = $this->project_type;
        return trans('words', ucfirst(self::$projectTypeLabels[$type]));
    }

    public static function getProjectTypeLabels()
    {
        $lbs = [];
        foreach (self::$projectTypeLabels as $key => $label)
            $lbs[$key] = trans('words', ucfirst($label));
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
            'hr' => self::FORM_SEPARATOR,
            'subtitle' => self::FORM_FIELD_TYPE_TEXT,
            'project_type' => [
                'type' => self::FORM_FIELD_TYPE_SELECT,
                'items' => self::getProjectTypeLabels()
            ],
            'construction_time' => self::FORM_FIELD_TYPE_TEXT,
            'begin_date' => [
                'type' => self::FORM_FIELD_TYPE_TEXT,
//                'options' => [
//                    'options' => array(
//                        'format' => 'yyyy/mm/dd',
//                        'viewformat' => 'yyyy/mm/dd',
//                        'placement' => 'right',
//                    ),
//                    'htmlOptions' => [
//                        'class' => 'form-control m-input m-input--solid',
//                        'autocomplete' => 'off'
//                    ]
//                ]
            ],
            'location' => self::FORM_FIELD_TYPE_TEXT,
            'area_size' => self::FORM_FIELD_TYPE_TEXT,
            'unit_count' => self::FORM_FIELD_TYPE_TEXT,
            'free_count' => self::FORM_FIELD_TYPE_TEXT,
            'sold_count' => self::FORM_FIELD_TYPE_TEXT,
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

    public function getBlocks()
    {
        return $this->hasMany(Block::className(), [self::columnGetString('itemID') => 'id']);
    }

    public function getImageSrc()
    {
        if (isset($this->image) && is_file(Yii::getAlias('@webroot/uploads/apartment/') . $this->image))
            return Yii::getAlias('@web/uploads/apartment/') . $this->image;
        return Yii::getAlias('@webapp/public_html/themes/frontend/images/default.jpg');
    }

    /**
     * @inheritDoc
     */
    public function render(View $view)
    {
        if ($this->project_type == self::SINGLE_VIEW)
            return $this->renderBlocks();
        else {
            $className = strtolower($this->formName());
            return $view->renderAjax('/' . $className . '/_render', ['model' => $this]);
        }
    }

    public function renderBlocks()
    {
        return "Blocks";
    }
}