<?php

namespace app\models\projects;

use app\models\Project;
use Yii;

/**
 * This is the model class for table "item".
 *
 */
class OtherConstruction extends Project implements ProjectInterface
{
    public static $typeName = self::TYPE_OTHER_CONSTRUCTION;

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            // define fields that only for other constructions
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

    /**
     * @return string
     */
    public function render()
    {
        // TODO: Implement render() method.
    }

    /**
     * @return string
     */
    public function renderView()
    {
        // TODO: Implement renderView() method.
    }
}