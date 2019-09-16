<?php

namespace app\models\blocks;

use app\models\Block;
use app\models\Project;
use yii\web\View;

/**
 * This is the model class for table "item".
 *
 */
class RelatedProjects extends Block
{
    public static $typeName = self::TYPE_RELATED_PROJECTS;

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

    /**
     * @inheritDoc
     */
    public function render(View $view, $project)
    {
        /** @var $project Project */
        return $view->render('//block/_related_projects_view', ['block' => $this]);
    }
}