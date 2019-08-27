<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 */
class Apartment extends Project
{
    public static $typeName = self::TYPE_AVAILABLE_APARTMENT;

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            // define fields that only for apartment
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
}
