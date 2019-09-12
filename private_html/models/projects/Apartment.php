<?php

namespace app\models\projects;

//use app\models\Project;
use app\models\Project;
use Yii;

/**
 * This is the model class for table "item".
 *
 * @property mixed|null image
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

    public function getModelImage()
    {
        if (isset($this->image) && is_file(Yii::getAlias('@webroot/uploads/apartment/') . $this->image))
            return Yii::getAlias('@web/uploads/apartment/') . $this->image;
        return Yii::getAlias('@webapp/public_html/themes/frontend/images/default.jpg');
    }

}
