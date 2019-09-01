<?php


namespace app\components;

use Yii;
use DeepCopy\Exception\PropertyException;
use devgroup\dropzone\UploadedFiles;
use yii\db\ActiveRecord;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Trait CrudController
 * @package app\components
 *
 * @property $modelName static
 */
trait CrudControllerTrait
{
    /**
     * for set admin theme
     */
    public function init()
    {
        if (!isset(static::$modelName))
            throw new PropertyException("Undefined modelName property in " . self::className() . " class.", 500);
        $this->setTheme('default');
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelName = self::$modelName . "Search";
        $searchModel = new $searchModelName();

        $dataProvider = $searchModel->search(app()->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slide model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /** @var DynamicActiveRecord $model */
        $model = new self::$modelName();

        if (app()->request->isAjax and !app()->request->isPjax) {
            $model->load(app()->request->post());
            app()->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (app()->request->post()) {
            $model->load(app()->request->post());
            if ($model->save()) {
                $this->saveUploaderAttributes($model);
                app()->session->setFlash('alert', ['type' => 'success', 'message' => Yii::t('words', 'base.successMsg')]);
                $route = isset(static::$routeAfterSave) ? static::$routeAfterSave : ['index'];
                if ($route instanceof \Closure)
                    $route = call_user_func($route, $model);
                return $this->redirect($route);
            } else
                app()->session->setFlash('alert', ['type' => 'danger', 'message' => Yii::t('words', 'base.dangerMsg')]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slide model.
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
                $this->editUploaderAttributes($model,$oldUploaderValues);
                app()->session->setFlash('alert', ['type' => 'success', 'message' => Yii::t('words', 'base.successMsg')]);
                $route = isset(static::$routeAfterSave) ? static::$routeAfterSave : ['index'];
                if ($route instanceof \Closure)
                    $route = call_user_func($route, $model);
                return $this->redirect($route);
            } else
                app()->session->setFlash('alert', ['type' => 'danger', 'message' => Yii::t('words', 'base.dangerMsg')]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Slide model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        /** @var ActiveRecord $model */
        $model = $this->findModel($id);
        $this->deleteUploaderAttributes($model);
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $modelClass = self::$modelName;
        if (($model = $modelClass::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('words', 'The requested page does not exist.'));
    }

    /******************************************** DropZone Field types functions **************************************/

    /**
     * @param $model ActiveRecord
     */
    public function saveUploaderAttributes($model)
    {
        if (!method_exists($this, 'uploaderAttributes'))
            return;
        $fields = $this->uploaderAttributes();
        foreach ($fields as $attribute => $options)
            (new UploadedFiles(MainController::$tempDir, $model->$attribute, $options['options']))->move($options['dir']);
    }

    /**
     * @param $model ActiveRecord
     * @return array
     */
    public function getOldUploaderValues($model)
    {
        if (!method_exists($this, 'uploaderAttributes'))
            return [];
        $fields = $this->uploaderAttributes();
        $values = [];
        foreach ($fields as $attribute => $options)
            $values[$attribute] = $model->$attribute;
        return $values;
    }

    /**
     * @param $model ActiveRecord
     * @param $oldValues
     */
    public function editUploaderAttributes($model, $oldValues)
    {
        if (!method_exists($this, 'uploaderAttributes'))
            return;
        $fields = $this->uploaderAttributes();
        foreach ($fields as $attribute => $options)
            (new UploadedFiles($options['dir'], $model->$attribute, $options['options']))
                ->update($oldValues[$attribute], $model->$attribute, MainController::$tempDir);
    }

    /**
     * @param $model ActiveRecord
     */
    public function deleteUploaderAttributes($model)
    {
        if (!method_exists($this, 'uploaderAttributes'))
            return;
        $fields = $this->uploaderAttributes();
        foreach ($fields as $attribute => $options)
            (new UploadedFiles($options['dir'], $model->$attribute, $options['options']))
                ->removeAll(true);
    }

    /********************************************** End DropZone Field types ******************************************/
}