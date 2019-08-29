<?php

namespace app\models\projects;

//use app\models\Project;
use app\models\Project;

/**
 * This is the model class for table "item".
 *
 * @property mixed|null image
 */
class Apartment extends Project implements ProjectInterface
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
