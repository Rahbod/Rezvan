<?php

use yii\helpers\Html;
use \app\components\customWidgets\CustomGridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = trans('words', 'Messages');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('

$("body").on("click","#delete-selected-btn",function(){
    var url = $(this).data("url");
    var grid = $(this).data("grid");                                                            
    var keys = $(grid).yiiGridView("getSelectedRows");
    var pjaxContainer = "#messages-pjax";
   
    if(keys.length !== 0) {
        if(confirm($(this).data("confirm-text")))
            $.ajax({
                url: url,
                type: "POST",
                data: {ids: keys},
                dataType: "json",
                error: function(xhr, status, error) {
                    alert(\'There was an error with your request.\' + xhr.responseText);
                }
            }).done(function(data) {
                console.log(data);
                $.pjax.reload($.trim(pjaxContainer), {timeout: 3000});
            });
    }
});
')
?>
<div class="message-index">

    <?php Pjax::begin(['id' => 'messages-pjax']); ?>
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
            <div class="m-portlet__head-tools fade">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="<?= \yii\helpers\Url::to(['create']) ?>"
                           class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span><?= trans('words', 'Create Message') ?></span>
						</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form__content"><?= $this->render('//layouts/_flash_message') ?></div>
            <!--begin: Datatable -->
            <div class="row">
                <div class="col-sm-3 float-right mb-3">
                    <button type="button" class="btn btn-sm btn-danger" id="delete-selected-btn"
                            data-url="<?= Url::to(['delete-selected']) ?>"
                            data-confirm-text="<?= trans('words', 'Are you sure delete this selected items?') ?>"
                            data-grid="#grid-view">
                        حذف انتخاب شده ها
                    </button>
                </div>
            </div>
            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <?= CustomGridView::widget([
                    'id' => 'grid-view',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => 'yii\grid\CheckboxColumn',
                            // you may configure additional properties here
                        ],
                        'name',
                        'tel',
//                        'subject',
                        [
                            'attribute' => 'type',
                            'value' => function ($model) {
                                return \app\models\Message::getStatusLabels($model->type, true);
                            },
                            'format' => 'raw',
                            'filter' => \app\models\Message::getStatusLabels()
                        ],

                        [
                            'attribute' => 'created',
                            'value' => function ($model) {
                                return jDateTime::date('Y/m/d', $model->created);
                            }
                        ],
                        [
                            'class' => 'app\components\customWidgets\CustomActionColumn',
                            'template' => '{view} {delete}'
                        ]
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
