<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "item".
 *
 * @property int $publish_date
 * @property int $summary
 */
class Post extends Item
{
    const TYPE_NEWS = 1;
    const TYPE_ARTICLE = 2;

    public static $modelName = 'post';

    public static $typeLabels = [
        self::TYPE_NEWS => 'news',
        self::TYPE_ARTICLE => 'article'
    ];

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
     */
    public static function tableName()
    {
        return 'item';
    }

    public function init()
    {
        parent::init();
        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            'body' => ['CHAR', ''],
            'image' => ['CHAR', ''],
            'publish_date' => ['CHAR', ''],
            'summary' => ['CHAR', ''],
            'seen' => ['INTEGER', ''],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['body', 'image', 'formCategories','publish_date'], 'required'],
            [['summary'], 'string'],
            [['publish_date'], 'safe'],
            ['seen', 'default', 'value' => 0],
            ['modelID', 'default', 'value' => Model::findOne(['name' => self::$modelName])->id],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'body' => Yii::t('words', 'Body'),
            'image' => Yii::t('words', 'Image'),
            'publish_date' => Yii::t('words', 'Publish Date'),
            'summary' => Yii::t('words', 'Summary'),
        ]);
    }

    /**
     * {@inheritdoc}
     * @return ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }

    public static function validQuery()
    {
        return self::find()->valid()->andWhere(['<=', self::columnGetString('publish_date'), time()]);
    }

    public function getComments_count()
    {
        return 0;
    }

    public function getUrl()
    {
        return Url::to(['/post/show', 'id' => $this->id, 'title' => self::encodeUrl($this->name)]);
    }

    public function afterFind()
    {
        parent::afterFind(); // TODO: Change the autogenerated stub

    }
}