<?php

use app\models\Request;
use yii\helpers\Html;
use \app\components\customWidgets\CustomGridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = trans('words', 'Requests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        <?= Html::encode($this->title) ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form__content"><?= $this->render('//layouts/_flash_message') ?></div>
            <!--begin: Datatable -->
            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <?= CustomGridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
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
                                return "<span dir='auto'>{$model->phone}</";
                            },
                            'format' => 'raw',
                        ],
                        [
                            'attribute' => 'created',
                            'value' => function ($model) {
                                return jDateTime::date('Y/m/d', $model->created);
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return $model->getStatusLabels($model->status, true);
                            },
                            'format' => 'raw',
                            'filter' => Request::getStatusFilter()
                        ],
                        [
                            'class' => 'app\components\customWidgets\CustomActionColumn',
                            'template' => '{pdf} {view} {delete}',
                            'buttons' => [
                                'pdf' => function ($url, $model, $key) {
                                    return Html::a('<span class="far fa-file-pdf text-danger" ></span >',
                                        ['pdf', 'id' => $model->id],
                                        [
                                            'class' => '',
                                            'title' => "خروجی pdf",
                                            'aria-label' => "خروجی pdf",
                                            'data-pjax' => 0

                                        ]
                                    );
                                },
                            ]
                        ]
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
