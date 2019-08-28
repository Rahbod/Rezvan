<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 */
abstract class Project extends Item
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
            ['modelID', 'default', 'value' => Yii::$app->controller->getModel(self::$modelName)],
            [['subtitle', 'begin_date', 'construction_time', 'location'], 'string'],
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
}
