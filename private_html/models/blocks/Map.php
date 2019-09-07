<?php

namespace app\models\blocks;

use app\models\Block;
use Yii;

/**
 * This is the model class for table "item".
 *
 */
class Map extends Block implements BlockInterface
{
    public static $typeName = self::TYPE_MAP_VIEW;

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            'location_link' => ['CHAR', '']
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['type', 'default', 'value' => self::$typeName],
            ['location_link', 'required'],
            ['location_link', 'string'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'location_link' => trans('words', 'Location link')
        ]);
    }

    public function formAttributes()
    {
        return array_merge(parent::formAttributes(),[
           'location_link'=>self::FORM_FIELD_TYPE_TEXT
        ]);
    }


    public function render()
    {
        // TODO: Implement render() method.
    }
}