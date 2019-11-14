<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 * @property $image string
 * @property $link string
 *
 */
class Request extends Item
{
    const STATUS_UNREAD = 0;
    const STATUS_PENDING = 1;
    const STATUS_REVIEWED = 2;
    const STATUS_CALLED = 3;

    public static $multiLanguage = false;
    public static $modelName = 'request';

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
        $this->status = self::STATUS_UNREAD;
        $this->dynaDefaults = [
            'seen' => ['INTEGER', ''],

            // contact fields
            'email' => ['CHAR', ''],
            'mobile' => ['CHAR', ''],
            'phone' => ['CHAR', ''],
            'details' => ['CHAR', ''],

            // general fields
            'building_age' => ['INTEGER', ''],
            'shopping' => ['INTEGER', ''],
            'rent' => ['INTEGER', ''],
            'mortgages' => ['INTEGER', ''],
            'floor' => ['INTEGER', ''],
            'facilities' => ['INTEGER', ''],
            'elevator' => ['INTEGER', ''],
            'parking' => ['INTEGER', ''],
            'warehouse' => ['INTEGER', ''],
            'closet' => ['INTEGER', ''],
            'terrace' => ['INTEGER', ''],
            'iPhone_video' => ['INTEGER', ''],
            'security_door' => ['INTEGER', ''],
            'electric_door' => ['INTEGER', ''],
            'toilet' => ['INTEGER', ''],
            'wallpaper' => ['INTEGER', ''],
            'desktop_case' => ['INTEGER', ''],
            'cuban_panel' => ['INTEGER', ''],
            'hood' => ['INTEGER', ''],
            'master_bath' => ['INTEGER', ''],
            'camera' => ['INTEGER', ''],
            'jacuzzi' => ['INTEGER', ''],
            'sauna' => ['INTEGER', ''],
            'swimming_pool' => ['INTEGER', ''],
            'showcase' => ['INTEGER', ''],
            'shelf' => ['INTEGER', ''],
            'wc' => ['INTEGER', ''],
            'protective_shutters' => ['INTEGER', ''],
            'juice_house' => ['INTEGER', ''],
            'alarm' => ['INTEGER', ''],
            'fire_announcement' => ['INTEGER', ''],
            'water_well' => ['INTEGER', ''],
            'round_the_wall' => ['INTEGER', ''],
            'water_cooler' => ['INTEGER', ''],
            'heater' => ['INTEGER', ''],
            'package' => ['INTEGER', ''],
            'water_heater' => ['INTEGER', ''],
            'air_conditioner' => ['INTEGER', ''],
            'heating' => ['INTEGER', ''],
            'floor_heating' => ['INTEGER', ''],
            'chiller' => ['INTEGER', ''],
            'radiator' => ['INTEGER', ''],
            'restaurant' => ['INTEGER', ''],
            'kitchen' => ['INTEGER', ''],
            'lobby' => ['INTEGER', ''],
            'enough_coffee' => ['INTEGER', ''],
            'landry' => ['INTEGER', ''],
            'television' => ['INTEGER', ''],
            'refrigerator' => ['INTEGER', ''],
            'oven' => ['INTEGER', ''],
            'single_kitchen' => ['INTEGER', ''],
            'iranian_service' => ['INTEGER', ''],
            'furniture' => ['INTEGER', ''],
            'safe_box' => ['INTEGER', ''],
            'bathroom' => ['INTEGER', ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['modelID', 'default', 'value' => isset(Yii::$app->controller->models[self::$modelName]) ? Yii::$app->controller->models[self::$modelName] : null],
            [['email', 'mobile', 'phone', 'details'], 'string'],
            ['email', 'email'],
            ['userID', 'default', 'value' => 1],
            [['building_age', 'shopping', 'rent', 'mortgages', 'floor', 'facilities', 'elevator', 'parking', 'warehouse', 'closet', 'terrace', 'iPhone_video', 'security_door', 'electric_door', 'toilet', 'wallpaper', 'desktop_case', 'cuban_panel', 'hood', 'master_bath', 'camera', 'jacuzzi', 'sauna', 'swimming_pool', 'showcase', 'shelf', 'wc', 'protective_shutters', 'juice_house', 'alarm', 'fire_announcement', 'water_well', 'round_the_wall', 'water_cooler', 'heater', 'package', 'water_heater', 'air_conditioner', 'heating', 'floor_heating', 'chiller', 'radiator', 'restaurant', 'kitchen', 'lobby', 'enough_coffee', 'landry', 'television', 'refrigerator', 'oven', 'single_kitchen', 'iranian_service', 'furniture', 'safe_box', 'bathroom'], 'integer']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => trans('words', 'First name and Last name'),
            // contact fields
            'email' => trans('words', 'E-Mail'),
            'mobile' => trans('words', 'Mobile Number'),
            'phone' => trans('words', 'Phone Number'),
            'details' => trans('words', 'More DETAILS'),

            // general fields
            'building_age' => trans('words', 'Age of the building'),
            'shopping' => trans('words', 'Shopping'),
            'rent' => trans('words', 'Rent'),
            'mortgages' => trans('words', 'Mortgages'),
            'floor' => trans('words', 'Floor'),
            'facilities' => trans('words', 'Facilities'),
            'elevator' => trans('words', 'Elevator'),
            'parking' => trans('words', 'Parking lot'),
            'warehouse' => trans('words', 'Warehouse'),
            'closet' => trans('words', 'Closet'),
            'terrace' => trans('words', 'Terrace'),
            'iPhone_video' => trans('words', 'iPhone Video'),
            'security_door' => trans('words', 'Security Door'),
            'electric_door' => trans('words', 'Electric Door'),
            'toilet' => trans('words', 'Toilet'),
            'wallpaper' => trans('words', 'Wallpaper'),
            'desktop_case' => trans('words', 'Desktop Case'),
            'cuban_panel' => trans('words', 'Cuban panel'),
            'hood' => trans('words', 'Hood'),
            'master_bath' => trans('words', 'Master bath'),
            'camera' => trans('words', 'CCTV Camera'),
            'jacuzzi' => trans('words', 'Jacuzzi'),
            'sauna' => trans('words', 'Sauna'),
            'swimming_pool' => trans('words', 'Swimming pool'),
            'showcase' => trans('words', 'Showcase'),
            'shelf' => trans('words', 'Shelf'),
            'wc' => trans('words', 'WC'),
            'protective_shutters' => trans('words', 'Protective shutters'),
            'juice_house' => trans('words', 'Juice House'),
            'alarm' => trans('words', 'Alarm'),
            'fire_announcement' => trans('words', 'Fire announcement'),
            'water_well' => trans('words', 'Water Well'),
            'round_the_wall' => trans('words', 'Round the wall'),
            'water_cooler' => trans('words', 'Water Cooler'),
            'heater' => trans('words', 'Heater'),
            'package' => trans('words', 'Package'),
            'water_heater' => trans('words', 'Water heater'),
            'air_conditioner' => trans('words', 'Air conditioner'),
            'heating' => trans('words', 'Heating'),
            'floor_heating' => trans('words', 'Heating from the floor'),
            'chiller' => trans('words', 'Chiller'),
            'radiator' => trans('words', 'Radiator'),
            'restaurant' => trans('words', 'Restaurant'),
            'kitchen' => trans('words', 'Kitchen'),
            'lobby' => trans('words', 'Lobby'),
            'enough_coffee' => trans('words', 'Enough coffee'),
            'landry' => trans('words', 'Landry'),
            'television' => trans('words', 'Television'),
            'refrigerator' => trans('words', 'Refrigerator'),
            'oven' => trans('words', 'Oven'),
            'single_kitchen' => trans('words', 'Single kitchen'),
            'iranian_service' => trans('words', 'Iranian Service'),
            'furniture' => trans('words', 'Furniture'),
            'safe_box' => trans('words', 'Safe box'),
            'bathroom' => trans('words', 'Bathroom'),
        ];
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
        return [
            [['name', 'email', 'mobile', 'phone'], [
                'type' => self::FORM_FIELD_TYPE_TEXT,
                'fieldOptions' => [
                    'inputOptions' => ['class' => 'input'],
                    'labelOptions' => ['class' => 'register-label'],
                ]
            ]],
            'details' => [
                'type' => self::FORM_FIELD_TYPE_TEXT_AREA,
                'containerCssClass' => 'col-lg-12',
                'fieldOptions' => [
                    'labelOptions' => ['class' => 'register-label'],
                ],
                'options' => ['class' => 'message-input', 'rows' => 6]
            ],
        ];
    }

    public function formGeneralAttributes()
    {
        return [
            [
                ['building_age', 'shopping', 'rent', 'mortgages', 'floor', 'facilities', 'elevator', 'parking', 'warehouse', 'closet', 'terrace', 'iPhone_video', 'security_door', 'electric_door', 'toilet', 'wallpaper', 'desktop_case', 'cuban_panel', 'hood', 'master_bath', 'camera', 'jacuzzi', 'sauna', 'swimming_pool', 'showcase', 'shelf', 'wc', 'protective_shutters', 'juice_house', 'alarm', 'fire_announcement', 'water_well', 'round_the_wall', 'water_cooler', 'heater', 'package', 'water_heater', 'air_conditioner', 'heating', 'floor_heating', 'chiller', 'radiator', 'restaurant', 'kitchen', 'lobby', 'enough_coffee', 'landry', 'television', 'refrigerator', 'oven', 'single_kitchen', 'iranian_service', 'furniture', 'safe_box', 'bathroom'],
                [
                    'type' => self::FORM_FIELD_TYPE_SWITCH,
                    'fieldOptions' => [
                        'inputOptions' => ['class' => 'container_toggle'],
                        'labelOptions' => ['class' => ''],
                    ]
                ]
            ]
        ];
    }
}