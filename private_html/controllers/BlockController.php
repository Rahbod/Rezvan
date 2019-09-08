<?php

namespace app\controllers;

use app\components\CrudControllerTrait;
use app\models\Page;
use app\models\projects\Apartment;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use Yii;
use app\models\Block;
use app\models\BlockSearch;
use app\components\AuthController;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * BlockController implements the CRUD actions for Block model.
 */
class BlockController extends AuthController
{
    use CrudControllerTrait;

    public static $imgDir = 'uploads/block';
    public static $imageOptions = [];

    /**
     * @return string
     */
    public function getModelName()
    {
        return Block::className();
    }

    public function uploaderAttributes()
    {
        return [
            'image' => [
                'dir' => self::$imgDir,
                'options' => self::$imageOptions
            ]
        ];
    }

    public function actions()
    {
        return [
            'upload-image' => [
                'class' => UploadAction::className(),
                'fileName' => Html::getInputName(new Block(), 'image'),
                'rename' => UploadAction::RENAME_UNIQUE,
                'validateOptions' => array(
                    'acceptedTypes' => array('png', 'jpg', 'jpeg')
                )
            ],
            'delete-image' => [
                'class' => RemoveAction::className(),
                'upload' => self::$imgDir,
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new Block(),
                'attribute' => 'image',
                'options' => static::$imageOptions
            ],
        ];
    }

    /**
     * Lists all Block models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        app()->session->set('itemID', $id);
        $searchModel = new BlockSearch();
        $searchModel->itemID = $id;
        $dataProvider = $searchModel->search(app()->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Block model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Block();
        if (app()->request->isAjax || app()->request->post()) {
            if (app()->request->getBodyParam('type')) {
                $type = app()->request->getBodyParam('type');
                $modelName = Block::$typeModels[$type];
                /** @var Block $model */
                $model = new $modelName();
                $model->type = $type;
            }
        }

        $model->itemID = app()->session->get('itemID');

        if (app()->request->isAjax and !app()->request->isPjax) {
            $model->load(app()->request->post());
            app()->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (app()->request->post() and !app()->request->isPjax) {
            $model->load(app()->request->post());
            if ($model->save()) {
                $this->saveUploaderAttributes($model);
                app()->session->setFlash('alert', ['type' => 'success', 'message' => trans('words', 'base.successMsg')]);
                return $this->redirect(['index', 'id' => $model->itemID]);
            } else
                app()->session->setFlash('alert', ['type' => 'danger', 'message' => trans('words', 'base.dangerMsg')]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Block model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (app()->request->isAjax and !app()->request->isPjax) {
            $model->load(app()->request->post());
            app()->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (app()->request->post()) {
            $oldUploaderValues = $this->getOldUploaderValues($model);
            $model->load(app()->request->post());
            if ($model->save()) {
                $this->editUploaderAttributes($model, $oldUploaderValues);
                app()->session->setFlash('alert', ['type' => 'success', 'message' => trans('words', 'base.successMsg')]);
                return $this->redirect(['index', 'id' => $model->itemID]);
            } else
                app()->session->setFlash('alert', ['type' => 'danger', 'message' => trans('words', 'base.dangerMsg')]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Block model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->deleteUploaderAttributes($model);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Block model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Block the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Block::findOne($id)) !== null) {
            $modelName = Block::$typeModels[$model->type];
            /** @var Block $modelName */
            $model = $modelName::findOne($id);
            return $model;
        }

        throw new NotFoundHttpException(trans('words', 'The requested page does not exist.'));
    }
}
