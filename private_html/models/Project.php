<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $short_title
 * @property int $view_type
 */
class Project extends Item
{
    const APARTMENT_TYPE = 1;
    const INVESTMENT_TYPE = 2;
    const OTHER_TYPE = 3;



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
            'short_title' => ['CHAR', ''],
            'view_type' => ['INTEGER', '']
        ]);
    }

    /**
    * {@inheritdoc}
    */
    public function formAttributes()
    {
        return [];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['userID', 'modelID', 'name', 'created', 'status'], 'required'],
            [['userID', 'modelID', 'status'], 'integer'],
            [['type'], 'number'],
            [['short_title'], 'string'],
            [['view_type'], 'integer'],
            [['dyna', 'extra'], 'string'],
            [['name'], 'string', 'max' => 511],
            [['created'], 'string', 'max' => 20],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userID' => 'id']],
            [['modelID'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['modelID' => 'id']],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('app', 'ID'),
            'userID' => Yii::t('app', 'User I D'),
            'modelID' => Yii::t('app', 'Model I D'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'dyna' => Yii::t('app', 'Dyna'),
            'extra' => Yii::t('app', 'Extra'),
            'created' => Yii::t('app', 'Created'),
            'status' => Yii::t('app', 'Status'),
            'short_title' => Yii::t('app', 'Short Title'),
        ]);
    }
}
