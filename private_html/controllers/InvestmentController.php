<?php

namespace app\controllers;

use app\components\AuthController;
use app\models\projects\Investment;
use app\models\projects\InvestmentSearch;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use devgroup\dropzone\UploadedFiles;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * InvestmentController implements the CRUD actions for Investment model.
 */
class InvestmentController extends AuthController
{
    public static $imgDir = 'uploads/investment';
//    public static $thumbDir = 'uploads/investment/thumbs';

    public static $imageOptions = ['thumbnail' => [
        'width' => 100,
        'height' => 100
    ]];

    /**
     * for set admin theme
     */
    public function init()
    {
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
     * Lists all Investment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvestmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Investment model.
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
     * Creates a new Investment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Investment();

        if (Yii::$app->request->isAjax and !Yii::$app->request->isPjax) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $image = new UploadedFiles(self::$tempDir, $model->image, self::$imageOptions);

            if ($model->save()) {
                $image->move(self::$imgDir);

                Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => Yii::t('words', 'base.successMsg')]);
                return $this->redirect(['index', 'id' => $model->id]);
            } else
                Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => Yii::t('words', 'base.dangerMsg')]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Investment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax and !Yii::$app->request->isPjax) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $image = new UploadedFiles(self::$imgDir, $model->image, self::$imageOptions);

        if (Yii::$app->request->post()) {
            $old = $model->image;

            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                $image->update($old, $model->image, self::$tempDir);

                Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => Yii::t('words', 'base.successMsg')]);
                return $this->redirect(['index', 'id' => $model->id]);
            } else
                Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => Yii::t('words', 'base.dangerMsg')]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Investment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $image = new UploadedFiles(self::$imgDir, $model->image, self::$imageOptions);
        $image->removeAll(true);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Investment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Investment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Investment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('words', 'The requested page does not exist.'));
    }

    public function actions()
    {
        return [
            'upload-image' => [
                'class' => UploadAction::className(),
                'rename' => UploadAction::RENAME_UNIQUE,
                'modelName' => 'Investment',
                'model' => new Investment(),
                'validateOptions' => array(
                    'acceptedTypes' => array('png', 'jpg', 'jpeg')
                )
            ],
            'delete-image' => [
                'class' => RemoveAction::className(),
                'upload' => self::$imgDir,
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new Investment(),
                'attribute' => 'image',
                'options' => static::$imageOptions
            ],
        ];
    }

    public function getMenuActions(){return ['index'];}

}
