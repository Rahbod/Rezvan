<?php


namespace app\components;


use app\models\Lists;
use devgroup\dropzone\DropZone;
use devgroup\dropzone\UploadedFiles;
use dosamigos\tinymce\TinyMce;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

trait FormRendererTrait
{
    /** @var int $tabindex */
    public static $tabindex = 1;

    /**
     * @param $form ActiveForm
     * @param string $template
     * @param string $allContainerCssClass
     * @param string $method name that used from model to render attributes
     * @return string
     */
    public function formRenderer($form, $template = '{field}', $allContainerCssClass = '', $method = 'formAttributes')
    {
        $output = '';

        if (method_exists($this, $method)) {
            $fields = $this->{$method}();
            $i = 1;

            foreach ($fields as $name => $field) {
                if (is_int($name)) {
                    $names = $field[0];
                    $field = $field[1];
                    if (is_array($names))
                        foreach ($names as $name)
                            $output .= $this->fieldRenderer($form, $template, $name, $field, $allContainerCssClass, $i);
                    else
                        $output .= $this->fieldRenderer($form, $template, $names, $field, $allContainerCssClass, $i);
                } else
                    $output .= $this->fieldRenderer($form, $template, $name, $field, $allContainerCssClass, $i);
                $i++;
            }
        }

        return $output;
    }

    /**
     * @param $form ActiveForm
     * @param $template
     * @param $name
     * @param $field array
     * sample: [
     *      'model' => $model, // optional, if not set be $this
     *      'attribute' => ...,
     *      'type' => static::FORM_FIELD_TYPE_...,
     *      'options' => [...], // field htmlOptions
     * ]
     * @param $allContainerCssClass
     * @param $index
     * @return \yii\widgets\ActiveField|string
     */
    public function fieldRenderer($form, $template, $name, $field, $allContainerCssClass, $index)
    {
        if (!is_array($field))
            $field = ['type' => $field];

        // for js script type
        if ($field['type'] === static::FORM_JS_SCRIPT) {
            if (isset($field['url']))
                $form->view->registerJsFile($field['url'], isset($field['pos']) ? $field['pos'] : View::POS_READY, isset($field['key']) ? $field['key'] : $name . '-script');
            elseif (isset($field['js']))
                $form->view->registerJs($field['js'], isset($field['pos']) ? $field['pos'] : View::POS_READY, isset($field['key']) ? $field['key'] : $name . '-script');
            return '';
        }

        $hint = false;
        if (isset($field['hint'])) {
            if ($field['hint'] instanceof \Closure)
                $hint = $field['hint']($this);
            else
                $hint = $field['hint'];
            unset($field['hint']);
        }

        if (isset($field['visible'])) {
            if ($field['visible'] instanceof \Closure)
                $visible = $field['visible']($this);
            else
                $visible = $field['visible'];

            if (!$visible)
                return null;
        }

        $labelEx = true;
        $label = '';
        if ($field['type'] !== static::FORM_SEPARATOR && isset($field['label'])) {
            if ($field['label'] instanceof \Closure)
                $label = $field['label']($this);
            else
                $label = $field['label'];

            $labelEx = $label === true;

            unset($field['label']);
        }

        $containerOptions = isset($field['containerOptions']) ? $field['containerOptions'] : [];
        unset($field['containerOptions']);
        $containerCssClass = isset($field['containerCssClass']) ? $field['containerCssClass'] : '';
        unset($field['containerCssClass']);

        $field['attribute'] = $name;
        static::$tabindex = $index;
        $field['tabindex'] = isset($field['tabindex']) ? $field['tabindex'] : $index;

        $model = isset($field['model']) ? $field['model'] : $this;
        $options = isset($field['options']) ? $field['options'] : [];
        $fieldOptions = isset($field['fieldOptions']) ? $field['fieldOptions'] : [];
        $items = isset($field['items']) ? $field['items'] : [];
        if(isset($field['listSlug'])) {
            /** @var Lists $list */
            $list = Lists::find()->andWhere([Lists::columnGetString('slug') => $field['listSlug']])->one();
            if($list) {
                $options = Lists::find()->andWhere([Lists::columnGetString('parentID')=>$list->id])->one();
                $items = $options?ArrayHelper::map($options, 'id', 'name') : [];
            }
        }
        $attribute = $field['attribute'];
        $type = isset($field['type']) ? $field['type'] : false;

        if (isset($field['tabindex']))
            $options['tabindex'] = $field['tabindex'];
        switch ($type) {
            case static::FORM_SEPARATOR:
                Html::addCssClass($options, 'm-form__heading');
                $obj = Html::tag('hr') .
                    (isset($field['label']) ? Html::tag('div', Html::tag('h3', $field['label'], ['class' => 'm-form__heading-title']), $options) : '');
                break;
            case static::FORM_FIELD_TYPE_DROP_ZONE:
                unset($options['tabindex']);
                $options['storedFiles'] = new UploadedFiles($model->isNewRecord ? $field['temp'] : $field['path'], $model->$attribute, $field['filesOptions']);
                $obj = $form->field($model, $attribute)->widget(DropZone::className(), $options);
                break;
            case static::FORM_FIELD_TYPE_CHECKBOX:
                $obj = $form->field($model, $attribute)->checkbox($options);
                break;
            case static::FORM_FIELD_TYPE_RADIO:
                $obj = $form->field($model, $attribute)->radio($options);
                break;
            case static::FORM_FIELD_TYPE_CHECKBOX_LIST:
                $obj = $form->field($model, $attribute)->checkboxList($items, $options);
                break;
            case static::FORM_FIELD_TYPE_RADIO_LIST:
                $obj = $form->field($model, $attribute)->radioList($items, $options);
                break;
            case static::FORM_FIELD_TYPE_SELECT:
                $obj = $form->field($model, $attribute)->dropDownList($items, $options);
                break;
            case static::FORM_FIELD_TYPE_SWITCH:
                if (!isset($fieldOptions['template']))
                    $fieldOptions['template'] = '{label}<label class="switch">{input}<span class="slider round"></span></label>{error}';
                $obj = $form->field($model, $attribute, $fieldOptions)->checkbox($options, false);
                break;
            case static::FORM_FIELD_TYPE_TEXT_EDITOR:
                $options['options']['tabindex'] = $options['tabindex'];
                unset($options['tabindex']);
                $obj = $form->field($model, $attribute, $fieldOptions)->widget(TinyMce::className(), $options);
                break;
            case static::FORM_FIELD_TYPE_TEXT_AREA:
                $obj = $form->field($model, $attribute, $fieldOptions)->textarea($options);
                break;
            case static::FORM_FIELD_TYPE_PASSWORD:
                $obj = $form->field($model, $attribute, $fieldOptions)->passwordInput($options);
                break;
            case static::FORM_FIELD_TYPE_LANGUAGE_SELECT:
                $obj = $form->field($model, $attribute, $fieldOptions)->dropDownList(MultiLangActiveRecord::$langArray, $options);
                break;
            case static::FORM_FIELD_TYPE_DATE:
                $options['htmlOptions']['tabindex'] = $options['tabindex'];
                unset($options['tabindex']);
                $obj = $form->field($model, $attribute)->widget(jalaliDatePicker::className(), $options);
                break;
            case static::FORM_FIELD_TYPE_TAG:
            case static::FORM_FIELD_TYPE_TIME:
            case static::FORM_FIELD_TYPE_DATETIME:
            case static::FORM_FIELD_TYPE_TEXT:
            default:
                $obj = $form->field($model, $attribute, $fieldOptions)->textInput($options);
                break;
        }

        $output = '';
        if (!$labelEx) {
            if (strpos($template, '{label}') === false)
                $obj->label($label);
            else {
                $obj->label(false);
                $output .= strtr($template, ['{label}' => $label]);
            }
        }

        if ($hint)
            $obj->hint($hint);

        Html::addCssClass($containerOptions, empty($containerCssClass) ? ($field['type'] !== static::FORM_SEPARATOR ? $allContainerCssClass : 'col-sm-12') : $containerCssClass);
        $fieldHtml = Html::tag('div', $obj, $containerOptions);
        $output .= strtr($template, ['{field}' => $fieldHtml]);
        return $output;
    }
}