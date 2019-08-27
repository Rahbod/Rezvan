<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 */
class Block extends Item
{
    const TYPE_BANNER = 1;
    const TYPE_IMAGE = 2;
    const TYPE_VIDEO = 3;
    const TYPE_MAP_VIEW = 4;
    const TYPE_NEARBY_ACCESS = 5;
    const TYPE_UNITS_BLOCK = 6;
    const TYPE_RELATED_PROJECTS = 7;

    public static $modelName = 'block';

    public static $typeLabels = [
        self::TYPE_BANNER => 'Banner',
        self::TYPE_IMAGE => 'Image',
        self::TYPE_VIDEO => 'Video',
        self::TYPE_MAP_VIEW => 'Map view',
        self::TYPE_NEARBY_ACCESS => 'Nearby access',
        self::TYPE_UNITS_BLOCK => 'Units block',
        self::TYPE_RELATED_PROJECTS => 'Related projects block',
    ];

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