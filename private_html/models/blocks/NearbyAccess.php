<?php

namespace app\models\blocks;

use app\models\Block;
use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $shrine_distance
 * @property int $shopping_distance
 * @property int $hospital_distance
 * @property int $metro_distance
 * @property int $laundry_distance
 * @property int $airport_distance
 * @property int $gas_distance
 * @property int $restaurant_distance
 * @property string $shrine_link
 * @property string $shopping_link
 * @property string $hospital_link
 * @property string $metro_link
 * @property string $laundry_link
 * @property string $airport_link
 * @property string $gas_link
 * @property string $restaurant_link
 */
class NearbyAccess extends Block implements BlockInterface
{
    public static $typeName = self::TYPE_NEARBY_ACCESS;

    public function init()
    {
        parent::init();

        $this->dynaDefaults = array_merge($this->dynaDefaults, [
            // below field values is link of google nearby searches
            'shrine_link' => ['CHAR', ''],
            'shopping_link' => ['CHAR', ''],
            'hospital_link' => ['CHAR', ''],
            'metro_link' => ['CHAR', ''], // metro
            'laundry_link' => ['CHAR', ''], // khoshkshoee
            'airport_link' => ['CHAR', ''],
            'gas_link' => ['CHAR', ''],
            'bank_link' => ['CHAR', ''],
            'restaurant_link' => ['CHAR', ''],

            // below field values is KM distance
            'shrine_distance' => ['INTEGER', ''],
            'shopping_distance' => ['INTEGER', ''],
            'hospital_distance' => ['INTEGER', ''],
            'metro_distance' => ['INTEGER', ''], // metro
            'laundry_distance' => ['INTEGER', ''], // khoshkshoee
            'airport_distance' => ['INTEGER', ''],
            'gas_distance' => ['INTEGER', ''],
            'bank_distance' => ['INTEGER', ''],
            'restaurant_distance' => ['INTEGER', ''],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['type', 'default', 'value' => self::$typeName],
            [['shrine_link', 'shopping_link', 'hospital_link', 'metro_link', 'laundry_link', 'airport_link', 'gas_link', 'restaurant_link'], 'string'],
            [['shrine_distance', 'shopping_distance', 'hospital_distance', 'metro_distance', 'laundry_distance', 'airport_distance', 'gas_distance',
                'restaurant_distance'], 'integer']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'shrine_link' => trans('words', 'Shrine link'),
            'shopping_link' => trans('words', 'Shopping link'),
            'hospital_link' => trans('words', 'Hospital link'),
            'metro_link' => trans('words', 'Metro link'),
            'laundry_link' => trans('words', 'Laundry link'),
            'airport_link' => trans('words', 'Airport link'),
            'gas_link' => trans('words', 'Gas link'),
            'bank_link' => trans('words', 'Bank link'),
            'restaurant_link' => trans('words', 'Restaurant link'),
            'shrine_distance' => trans('words', 'Shrine distance'),
            'shopping_distance' => trans('words', 'Shopping distance'),
            'hospital_distance' => trans('words', 'Hospital distance'),
            'metro_distance' => trans('words', 'Metro distance'),
            'laundry_distance' => trans('words', 'Laundry distance'),
            'airport_distance' => trans('words', 'Airport distance'),
            'gas_distance' => trans('words', 'Gas station distance'),
            'bank_distance' => trans('words', 'Bank distance'),
            'restaurant_distance' => trans('words', 'Restaurant distance'),
        ]);
    }

    public function formAttributes()
    {
        return array_merge(parent::formAttributes(), [
            [['shrine_link', 'shopping_link', 'hospital_link', 'metro_link', 'laundry_link',
                'airport_link', 'gas_link', 'bank_link', 'restaurant_link'], self::FORM_FIELD_TYPE_TEXT],
            [['shrine_distance', 'shopping_distance', 'hospital_distance', 'metro_distance', 'laundry_distance',
                'airport_distance', 'gas_distance', 'bank_distance', 'restaurant_distance'], self::FORM_FIELD_TYPE_TEXT],

        ]);
    }


    public function render()
    {
        // TODO: Implement render() method.
    }
}