<?php


namespace app\components;


use yii\db\ActiveRecord;

interface CrudControllerInterface
{
    const AFTER_SAVE_ROUTE = 'after_save_route';

    /**
     * @return ActiveRecord
     */
    public static function getModelName();

    /**
     * @return []
     */
    public static function getRoutes();
}