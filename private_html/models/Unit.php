<?php

namespace app\models;

use app\components\MainController;
use app\controllers\ApartmentController;
use app\controllers\UnitController;
use app\models\blocks\OtherUnits;
use app\models\blocks\UnitDetails;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * This is the model class for table "item".
 *
 * @property int $itemID
 * @property int $unit_number
 * @property int project_blocks
 * @property int $image
 * @property int $floor_number
 * @property int air_conditioner
 * @property int wc
 * @property int bath_room
 * @property int parking
 * @property int radiator
 * @property int area_size
 * @property int location
 * @property int bed_room
 * @property int $sort
 *
 * @property Block[] $blocks
 * @property Project $project
 */
class Unit extends Item
{
    public static $multiLanguage = false;
    public static $modelName = 'unit';

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
            'image' => ['CHAR', ''],
            'itemID' => ['INTEGER', ''],
            'unit_number' => ['INTEGER', ''],
            'floor_number' => ['INTEGER', ''],
            'air_conditioner' => ['INTEGER', ''],
            'wc' => ['INTEGER', ''],
            'bath_room' => ['INTEGER', ''],
            'parking' => ['INTEGER', ''],
            'radiator' => ['INTEGER', ''],
            'location' => ['CHAR', ''],
            'bed_room' => ['CHAR', ''],
//            'services' => ['CHAR', ''],
            'sold' => ['INTEGER', ''],
            'project_blocks' => ['INTEGER', ''],
            // unit sort field
            'sort' => ['INTEGER', ''],

            //first column
            'area_size' => ['INTEGER', ''],//Foundation
            'view' => ['CHAR', 'INTEGER'],
            'type_of_document' => ['INTEGER', ''],
            'number_of_assignments' => ['INTEGER', ''],
            'cabinets' => ['INTEGER', ''],

            //second column
            'water_score' => ['INTEGER', ''],
            'store' => ['INTEGER', ''],
            'floor_heating' => ['INTEGER', ''],
            'iPhone_video' => ['INTEGER', ''],
            'elevator' => ['INTEGER', ''],
            'terrace' => ['INTEGER', ''],
//            'floor' => ['INTEGER', ''],

            //third column
            'number_of_floors' => ['INTEGER', ''],
            'property_direction' => ['INTEGER', ''],
            'age_of_the_building' => ['INTEGER', ''],
            'state' => ['INTEGER', ''],
            'type_of_use' => ['INTEGER', ''],
            'wall' => ['INTEGER', ''],
            'gas_points' => ['INTEGER', ''],
            'electricity_rating' => ['INTEGER', ''],
            'split' => ['INTEGER', ''],
        ]);
    }

    public function __get($name)
    {
        $val = parent::__get($name);
        if(in_array($name, array_keys($this->dynaDefaults))) {
            $types = $this->formAttributes();
            if (isset($types[$name]) && isset($types[$name]['listSlug'])) {
                $option = Lists::find()->andWhere(['id' => (int)$val])->one();
                return $option ? $option->getName() : null;
            }
        }
        return $val;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['modelID', 'default', 'value' => isset(Yii::$app->controller->models[self::$modelName]) ? Yii::$app->controller->models[self::$modelName] : null],
            [['itemID', 'image'], 'required'],
            [
                ['itemID', 'unit_number', 'floor_number', 'area_size', 'sort',
                    'air_conditioner', 'wc', 'parking', 'bath_room', 'radiator', 'location', 'sold', 'bed_room']
                , 'integer'],
            [['project_blocks'], 'default', 'value' => 0],
            [['itemID', 'unit_number', 'floor_number', 'area_size', 'sort', 'price'], 'integer'],
            [['location', 'services'], 'string'],
            [
                ['type_of_use', 'number_of_assignments',
                    'cabinets', 'number_of_floors']
                , 'integer'],

            [
                ['view', 'type_of_document', 'water_score',
                    'store', 'floor_heating', 'iPhone_video', 'elevator', 'terrace',
                    'state', 'wall', 'gas_points', 'electricity_rating', 'split'
                ]
                , 'integer'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'image' => trans('words', 'Image'),
            'itemID' => trans('words', 'Project ID'),
            'sort' => trans('words', 'Sort'),
            'unit_number' => trans('words', 'Unit number'),
            'floor_number' => trans('words', 'Floor number'),
            'area_size' => trans('words', 'Area size'),
            'location' => trans('words', 'Location'),
            'unit_per_floor_number' => trans('words', 'Unit per floor number'),
//            'services' => trans('words', 'Services'),
            'air_conditioner' => trans('words', 'Air conditioner'),
            'wc' => trans('words', 'WC'),
            'bath_room' => trans('words', 'Bath room'),
            'Parking' => trans('words', 'Parking'),
            'radiator' => trans('words', 'Radiator'),
            'sold' => trans('words', 'Sold'),
            'project_blocks' => trans('words', 'Use project blocks'),
            'bed_room' => trans('words', 'Bed room'),
            'price' => trans('words', 'Price'),

            //first column
            'view' => trans('words', 'View'),
            'type_of_document' => trans('words', 'type of Document'),
            'number_of_assignments' => trans('words', 'Number of assignments'),
            'cabinets' => trans('words', 'Cabinets'),

            //second column
            'water_score' => trans('words', 'Water Score'),
            'store' => trans('words', 'Store'),
            'floor_heating' => trans('words', 'Floor heating'),
            'iPhone_video' => trans('words', 'IPhone Video'),
            'elevator' => trans('words', 'Elevator'),
            'terrace' => trans('words', 'Terrace'),
//            'floor' => trans('words),',

            //third column
            'number_of_floors' => trans('words', 'Number of floors'),
            'property_direction' => trans('words', 'Property direction'),
            'age_of_the_building' => trans('words', 'Age of the building'),
            'state' => trans('words', 'state'),
            'type_of_use' => trans('words', 'Type of use'),
            'wall' => trans('words', 'Wall'),
            'gas_points' => trans('words', 'Gas points'),
            'electricity_rating' => trans('words', 'Electricity rating'),
            'split' => trans('words', 'Split'),

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

    public function beforeSave($insert)
    {
        if ($insert)
            $this->sort = $this->getMaxSort() + 1;
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /**
     * Return maximum saved sort
     * @return integer
     */
    public function getMaxSort()
    {
        return self::find()->where([
            'itemID' => $this->itemID,
        ])->max(self::columnGetString('sort'));
    }

    public function formAttributes()
    {
        return array_merge(parent::formAttributes(), [
            'sep' => [
                'type' => static::FORM_SEPARATOR,
                'containerCssClass' => 'col-sm-12'
            ],
            'price' => ['type' => self::FORM_FIELD_TYPE_TEXT, 'hint' => 'تومان'],
            [['sold','project_blocks'], static::FORM_FIELD_TYPE_SWITCH],
            'sep2' => [
                'type' => static::FORM_SEPARATOR,
                'containerCssClass' => 'col-sm-12'
            ],
            [['radiator', 'parking', 'bath_room',
                'wc', 'air_conditioner', 'floor_number', 'unit_number',
                'unit_per_floor_number', 'bed_room'], self::FORM_FIELD_TYPE_TEXT],
            'area_size' => ['type' => self::FORM_FIELD_TYPE_TEXT, 'hint' => 'متر'],
            [[ 'number_of_assignments', 'number_of_floors'], self::FORM_FIELD_TYPE_TEXT],
            // lists
            'type_of_use' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'type_of_use'],
            'view' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'view'],
            'type_of_document' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'type_of_document'],
            'cabinets' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'cabinets'],
            'store' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'store'],
            'state' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'state'],
            'user' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'user'],
            'wall' => ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'wall'],
            [['water_score', 'gas_points', 'electricity_rating'], ['type' => self::FORM_FIELD_TYPE_SELECT, 'listSlug' => 'scores']],
            'sep3' => [
                'type' => static::FORM_SEPARATOR,
                'containerCssClass' => 'col-sm-12'
            ],
            [['floor_heating', 'iPhone_video', 'elevator', 'split','terrace'], self::FORM_FIELD_TYPE_SWITCH],
            'sep4' => [
                'type' => static::FORM_SEPARATOR,
                'containerCssClass' => 'col-sm-12'
            ],
            'image' => [
                'type' => static::FORM_FIELD_TYPE_DROP_ZONE,
                'hint' => 'تصویر کوچک',
                'containerCssClass' => 'col-sm-6',
                'temp' => MainController::$tempDir,
                'path' => UnitController::$imgDir,
                'filesOptions' =>UnitController::$imageOptions,
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
        return $this->hasMany(Block::className(), [Block::columnGetString('itemID') => 'id'])->orderBy([Block::columnGetString('sort') => SORT_ASC]);
    }

    public function getProject()
    {
        $model = Project::findOne($this->itemID);
        if (!$model)
            return null;
        $type = $model->type;
        /** @var Block $modelClass */
        $modelClass = Project::$typeModels[$type];
        return $modelClass::findOne($model->id);
    }

    /**
     * @inheritDoc
     */
    public function render(View $view)
    {
        if ($this->project_blocks == 1)
            return $this->project->renderBlocks($view, $this->project, $this);
        return $this->renderBlocks($view, $this);
    }

    /**
     * @param View $view
     * @param $project
     * @return string
     */
    public function renderBlocks($view, $unit)
    {
        $output = '';
        foreach ($this->blocks as $block) {
            $type = $block->type;
            /** @var Block $modelClass */
            $modelClass = Block::$typeModels[$type];
            $block = $modelClass::findOne($block->id);
            $output .= $block->render($view, $unit);
        }

        // render static unit blocks
        // render unit details
        $block = new UnitDetails($this);
        $output .= $block->render($view);

        // render other units
        $block = new OtherUnits($this);
        $output .= $block->render($view);

        return $output;
    }

    /// attribute string getters

    public function getSubtitleStr()
    {
        return $this->project->getSubtitleStr();
    }

    public function getSubtitle2Str()
    {
        return $this->project->getLocationTwoStr();
    }

    public function getFloorNumberStr()
    {
        return trans('words', 'on floor {value}', ['value' => $this->floor_number]);
    }

    public function getBedRoomStr()
    {
        if ((int)$this->bed_room > 1)
            return trans('words', 'have {value} rooms', ['value' => $this->bed_room]);
        return trans('words', 'have a room');
    }

    public function getAirConditionerStr()
    {
        if ((int)$this->air_conditioner > 1)
            return trans('words', 'have {value} air conditions', ['value' => $this->air_conditioner]);
        return trans('words', 'have a air condition');
    }

    public function getWcStr()
    {
        if ((int)$this->wc > 1)
            return trans('words', 'have {value} wc', ['value' => $this->wc]);
        return trans('words', 'have a wc');
    }

    public function getBathRoomStr()
    {
        if ((int)$this->bath_room > 1)
            return trans('words', 'have {value} separate bathroom', ['value' => $this->bath_room]);
        return trans('words', 'have a bathroom');
    }

    public function getParkingStr()
    {
        if ((int)$this->parking > 1)
            return trans('words', 'have {value} parking spaces', ['value' => $this->parking]);
        return trans('words', 'have a parking');
    }

    public function getRadiatorStr()
    {
        if ((int)$this->radiator > 1)
            return trans('words', 'have {value} radiators', ['value' => $this->radiator]);
        return trans('words', 'have a radiator');
    }

    public function getUrl()
    {
        return Url::to(['/unit/show', 'id' => $this->id]);
    }

    public function getWaterScorerStr()
    {
        if ((int)$this->water_score == 0)
            return trans('words', 'has not');
        elseif ((int)$this->water_score > 1)
            return trans('words', 'have {value}', ['value' => $this->water_score]);
        return trans('words', 'have it');
    }

    public function getModelImage()
    {
        if (isset($this->image) && is_file(Yii::getAlias('@webroot/uploads/unit/') . $this->image))
            return Yii::getAlias('@web/uploads/unit/') . $this->image;
        return '';
    }
}