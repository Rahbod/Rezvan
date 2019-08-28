<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $itemID
 * @property int $unit_number
 * @property int $floor_number
 * @property int $area_size
 * @property string $location
 * @property string $services
 * @property int $sort
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
            'itemID' => ['INTEGER', ''],
            'unit_number' => ['INTEGER', ''],
            'floor_number' => ['INTEGER', ''],
            'area_size' => ['INTEGER', ''],
            'location' => ['CHAR', ''],
            'services' => ['CHAR', ''],

            // unit sort field
            'sort' => ['INTEGER', '']
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['modelID', 'default', 'value' => Yii::$app->controller->getModel(self::$modelName)],
            [['itemID'], 'required'],
            [['itemID', 'unit_number', 'floor_number', 'area_size', 'sort'], 'integer'],
            [['location', 'services'], 'string']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'itemID' => Yii::t('words', 'Project ID'),
            'sort' => Yii::t('words', 'Sort'),
            'unit_number' => Yii::t('words', 'Unit number'),
            'floor_number' => Yii::t('words', 'Floor number'),
            'area_size' => Yii::t('words', 'Area size'),
            'location' => Yii::t('words', 'Location'),
            'services' => Yii::t('words', 'Services'),
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
}
