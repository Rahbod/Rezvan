<?php

namespace app\models;

use function app\components\dd;
use app\components\MultiLangActiveQuery;
use creocoder\nestedsets\NestedSetsQueryBehavior;
use app\components\DynamicActiveQuery;

/**
 * This is the ActiveQuery class for [[Category]].
 *
 * @see Category
 */
class MenuQuery extends MultiLangActiveQuery
{
    public static $languageCondition = true;
    protected $_typeName = null;

    public function behaviors()
    {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }

    public function __construct($modelClass, array $config = [])
    {
        $this->_typeName = $modelClass::$typeName;
        parent::__construct($modelClass, $config);
    }

    /**
     * {@inheritdoc}
     * @return Item[]|array
     */
    public function all($db = null)
    {
        if ($this->_typeName) {
            $this->andWhere([
                'type' => $this->_typeName
            ]);
        }
        $this->orderBySort();
        return parent::all($db);
    }

    public function count($q = '*', $db = null)
    {
        if ($this->_typeName) {
            $this->andWhere([
                'type' => $this->_typeName
            ]);
        }
        return parent::count($q, $db); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     * @return Item|array|null
     */
    public function one($db = null)
    {
        if ($this->_typeName) {
            $this->andWhere([
                'type' => $this->_typeName
            ]);
        }
        return parent::one($db);
    }

    public function valid()
    {
        if (self::$languageCondition)
            $this->andWhere(['status' => Category::STATUS_PUBLISHED]);
        else {
            $lang = \Yii::$app->language;
            if ($lang == 'fa')
                $this->andWhere(['status' => Category::STATUS_PUBLISHED]);
            else
                $this->andWhere([Category::columnGetString("{$lang}_status") => Category::STATUS_PUBLISHED]);
        }
        $this->orderBySort();
        return $this;
    }

    public function orderBySort()
    {
        $this->orderBy([Category::columnGetString('sort') => SORT_ASC]);
        return $this;
    }
}
