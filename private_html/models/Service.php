<?php

namespace app\models;

use app\components\MainController;
use app\controllers\ServiceController;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "item".
 * @property string $body
 * @property string description
 * @property string ar_description
 * @property string en_description
 * @property string subtitle
 * @property string ar_subtitle
 * @property string en_subtitle
 * @property string $icon
 * @property string $icon_hover
 * @property string $image
 *
 */
class Service extends Page
{

    public static $typeName = self::SERVICES_TYPE;

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
            'description' => ['CHAR', ''],
            'ar_description' => ['CHAR', ''],
            'en_description' => ['CHAR', ''],

            'icon' => ['CHAR', ''],
            'icon_hover' => ['CHAR', ''],
            'image' => ['CHAR', ''],
            'subtitle' => ['CHAR', ''],
            'ar_subtitle' => ['CHAR', ''],
            'en_subtitle' => ['CHAR', ''],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['type'], 'default', 'value' => static::$typeName],
            [['description', 'ar_description', 'en_description', 'subtitle', 'ar_subtitle', 'en_subtitle'], 'required'],
            [['icon','icon_hover','image'], 'string'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'description' => trans('words', 'Description'),
            'ar_description' => trans('words', 'Ar Description'),
            'en_description' => trans('words', 'En Description'),
            'subtitle' => trans('words', 'Subtitle'),
            'ar_subtitle' => trans('words', 'Ar Subtitle'),
            'en_subtitle' => trans('words', 'En Subtitle'),
            'icon' => trans('words', 'Icon'),
            'icon_hover' => trans('words', 'Icon Hover'),
            'image' => trans('words', 'Image'),
        ]);
    }

    public function formAttributes()
    {
        return array_merge(Item::formAttributes(), [
            [
                ['subtitle', 'ar_subtitle', 'en_subtitle'],
                ['type' => static::FORM_FIELD_TYPE_TEXT, 'containerCssClass' => 'col-sm-4']
            ],
            [
                ['description', 'ar_description', 'en_description'],
                ['type' => static::FORM_FIELD_TYPE_TEXT_AREA, 'containerCssClass' => 'col-sm-4']
            ],
            [['body', 'ar_body', 'en_body'], [
                'type' => static::FORM_FIELD_TYPE_TEXT_EDITOR,
                'containerCssClass' => 'col-sm-12',
                'options' => [
                    'options' => ['rows' => 30]
                ]
            ]],
            'icon' => [
                'type' => self::FORM_FIELD_TYPE_DROP_ZONE,
                'hint' => 'تصویر آیکون با فرمت svg',
                'containerCssClass' => 'col-sm-4',
                'temp' => MainController::$tempDir,
                'path' => ServiceController::$iconDir,
                'filesOptions' => ServiceController::$iconOptions,
                'options' => [
                    'url' => Url::to(['upload-icon']),
                    'removeUrl' => Url::to(['delete-icon']),
                    'sortable' => false, // sortable flag
                    'sortableOptions' => [], // sortable options
                    'htmlOptions' => ['class' => '', 'id' => Html::getInputId(new self(), 'icon')],
                    'options' => [
                        'createImageThumbnails' => true,
                        'addRemoveLinks' => true,
                        'dictRemoveFile' => 'حذف',
                        'addViewLinks' => true,
                        'dictViewFile' => '',
                        'dictDefaultMessage' => 'جهت آپلود آیکون کلیک کنید',
                        'acceptedFiles' => 'svg',
                        'maxFiles' => 1,
                        'maxFileSize' => 0.5,
                    ],
                ]
            ],
            'icon_hover' => [
                'type' => self::FORM_FIELD_TYPE_DROP_ZONE,
                'hint' => 'تصویر آیکون hover با فرمت svg',
                'containerCssClass' => 'col-sm-4',
                'temp' => MainController::$tempDir,
                'path' => ServiceController::$iconDir,
                'filesOptions' => ServiceController::$iconOptions,
                'options' => [
                    'url' => Url::to(['upload-icon-hover']),
                    'removeUrl' => Url::to(['delete-icon-hover']),
                    'sortable' => false, // sortable flag
                    'sortableOptions' => [], // sortable options
                    'htmlOptions' => ['class' => '', 'id' => Html::getInputId(new self(), 'icon_hover')],
                    'options' => [
                        'createImageThumbnails' => true,
                        'addRemoveLinks' => true,
                        'dictRemoveFile' => 'حذف',
                        'addViewLinks' => true,
                        'dictViewFile' => '',
                        'dictDefaultMessage' => 'جهت آپلود آیکون کلیک کنید',
                        'acceptedFiles' => 'svg',
                        'maxFiles' => 1,
                        'maxFileSize' => 0.5,
                    ],
                ]
            ],
            'image' => [
                'type' => self::FORM_FIELD_TYPE_DROP_ZONE,
                'hint' => 'تصویر بزرگ',
                'containerCssClass' => 'col-sm-4',
                'temp' => MainController::$tempDir,
                'path' => ServiceController::$imageDir,
                'filesOptions' => ServiceController::$imageOptions,
                'options' => [
                    'url' => Url::to(['upload-image']),
                    'removeUrl' => Url::to(['delete-image']),
                    'sortable' => false, // sortable flag
                    'sortableOptions' => [], // sortable options
                    'htmlOptions' => ['class' => '', 'id' => Html::getInputId(new self(), 'image')],
                    'options' => [
                        'createImageThumbnails' => true,
                        'addRemoveLinks' => true,
                        'dictRemoveFile' => 'حذف',
                        'addViewLinks' => true,
                        'dictViewFile' => '',
                        'dictDefaultMessage' => 'جهت آپلود آیکون کلیک کنید',
                        'acceptedFiles' => 'png, jpg, jpeg',
                        'maxFiles' => 1,
                        'maxFileSize' => 5,
                    ],
                ]
            ],
        ]);
    }

    public static function getList()
    {
        return ArrayHelper::map(Service::find()->valid()->all(), 'id', 'name');
    }

    public function getSubtitleStr()
    {
        if (!static::$multiLanguage) {
            if (Yii::$app->language == 'fa')
                return $this->subtitle;
            else
                return $this->{Yii::$app->language . '_subtitle'} ?: $this->subtitle;
        }
        return $this->subtitle;
    }

    public function getDescriptionStr()
    {
        if (!static::$multiLanguage) {
            if (Yii::$app->language == 'fa')
                return $this->description;
            else
                return $this->{Yii::$app->language . '_description'} ?: $this->description;
        }
        return $this->description;
    }

    public function getUrl()
    {
        return Url::to(['/service/show', 'id' => $this->id, 'title' => encodeUrl($this->name)]);
    }

    public function getIconSrc()
    {
        if(is_file(alias('@webroot').DIRECTORY_SEPARATOR.ServiceController::$iconDir.DIRECTORY_SEPARATOR.$this->icon)) {
            $path = Yii::$app->request->getBaseUrl();
            return $path . '/' . ServiceController::$iconDir . '/' . $this->icon;
        }
        return null;
    }

    public function getIconHoverSrc()
    {
        if(is_file(alias('@webroot').DIRECTORY_SEPARATOR.ServiceController::$iconDir.DIRECTORY_SEPARATOR.$this->icon_hover)) {
            $path = Yii::$app->request->getBaseUrl();
            return $path . '/' . ServiceController::$iconDir . '/' . $this->icon_hover;
        }
        return $this->getIconSrc();
    }

    public function getImageSrc()
    {
        if(is_file(alias('@webroot').DIRECTORY_SEPARATOR.ServiceController::$imageDir.DIRECTORY_SEPARATOR.$this->image)) {
            $path = Yii::$app->request->getBaseUrl();
            return $path . '/' . ServiceController::$imageDir . '/' . $this->image;
        }
        return null;
    }
}
