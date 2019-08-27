<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 */
class Project extends Item
{
    const TYPE_AVAILABLE_APARTMENT = 1;
    const TYPE_INVESTMENT = 2;
    const TYPE_OTHER_CONSTRUCTION = 3;

    public static $multiLanguage = true;
    public static $modelName = 'project';

    public static $typeLabels = [
        self::TYPE_AVAILABLE_APARTMENT => 'Available Apartments',
        self::TYPE_INVESTMENT => 'Investments',
        self::TYPE_OTHER_CONSTRUCTION=> 'Other constructions'
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
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['modelID', 'default', 'value' => Yii::$app->controller->models[self::$modelName]],
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
