<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\models\Lists;
use yii\widgets\DetailView; ?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <link rel="stylesheet" href="<?= request()->baseUrl . '/themes/frontend/assets/bootstrap/css/bootstrap.css' ?>">
    </head>
    <?php
    ?>

    <body class="rtl">
    <?php $this->beginBody(); ?>
    <main>
        <div class="container">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'email',
                    [
                        'attribute' => 'mobile',
                        'value' => function ($model) {
                            return "<span dir='auto'>{$model->mobile}</span>";
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'phone',
                        'value' => function ($model) {
                            return "<span dir='auto'>{$model->phone}</span>";
                        },
                        'format' => 'raw',
                    ],
                    'details',
                    [
                        'attribute' => 'created',
                        'value' => jDateTime::date('Y/m/d', $model->created)
                    ],
                ],
            ]) ?>
            <hr>
            <h4>مشخصات عمومی</h4>
            <table class="table table-bordered">
                <?php
                $i = 0;
                foreach ($model->dynaDefaults as $key => $config):
                    if (in_array($key, [
                        'email', 'mobile', 'phone', 'details', 'user_lang',
                        'heating_system', 'cooling_system', 'city', 'type_of_buy', 'type_of_unit',
                        'price_from', 'price_to', 'currency',
                        'area_from', 'area_to', 'area_unit',
                        'building_old', 'unit_room'
                    ]))
                        continue;
                    $text = $model->$key == 1 ? '<span class="text-success" style="vertical-align: middle">دارد</span>' : '<span class="text-danger" style="vertical-align: middle">&times;</span>';
                    ?>
                    <?php if ($i % 3 === 0): ?><tr><?php endif; ?>
                    <th><?= $model->getAttributeLabel($key) ?></th>
                    <td><?= $text ?></td>
                    <?php if ($i % 3 === 0): ?></tr><?php endif; ?>
                    <?php
                    $i++;
                endforeach; ?>
            </table>
            <hr>
            <table class="table table-bordered">
                <?php
                $otherFields = ['heating_system', 'cooling_system', 'city', 'type_of_buy', 'type_of_unit',
                    'price_from', 'area_from', 'building_old', 'unit_room'];
                $i = 0;
                foreach ($otherFields as $field):
                    if (in_array($field, ['building_old', 'heating_system', 'cooling_system', 'city', 'type_of_buy', 'type_of_unit'])) {
                        $option = Lists::findOne($model->$field);
                        $text = $option->name;
                    } elseif ($field == 'price_from') {
                        $currency = Lists::findOne($model->currency);
                        $currency = $currency->name;
                        $text = trans('words', 'From') . ': ' . $model->$field ? number_format((float)$model->$field) : '' . ' ' . $currency .
                        ' - ' . trans('words', 'To') . ': ' . $model->price_to ? number_format((float)$model->price_to) : '' . ' ' . $currency;
                    } elseif ($field == 'area_from') {
                        $area_unit = Lists::findOne($model->area_unit);
                        $area_unit = $area_unit->name;
                        $text = trans('words', 'From') . ': ' . $model->$field . ' ' . $area_unit .
                            ' - ' . trans('words', 'To') . ': ' . $model->area_to . ' ' . $area_unit;
                    } else
                        $text = $model->$field;
                    ?>
                    <?php if ($i % 3 === 0): ?><tr><?php endif; ?>
                    <th><?= $model->getAttributeLabel($key) ?></th>
                    <td><?= $text ?></td>
                    <?php if ($i % 3 === 0): ?></tr><?php endif; ?>
                    <?php
                    $i++;
                endforeach; ?>
            </table>
        </div>
    </main>
    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>