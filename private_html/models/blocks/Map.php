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
            'link' => ['CHAR', '']
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['type', 'default', 'value' => self::$typeName],
            ['link', 'required'],
            ['link', 'string'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'link' => Yii::t('words', 'Link')
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