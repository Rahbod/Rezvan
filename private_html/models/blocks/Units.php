<?php

namespace app\models\blocks;

use app\models\Block;

/**
 * This is the model class for table "item".
 *
 */
class Units extends Block implements BlockInterface
{
    public static $typeName = self::TYPE_VIDEO;

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [

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

    public function render()
    {
        // TODO: Implement render() method.
    }
}