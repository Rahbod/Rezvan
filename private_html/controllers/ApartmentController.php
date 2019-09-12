<?php

namespace app\controllers;

use app\components\AuthController;
use app\models\Page;
use app\models\projects\Apartment;
use app\models\projects\ApartmentSearch;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use devgroup\dropzone\UploadedFiles;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ApartmentController implements the CRUD actions for Apartment model.
 */
class ApartmentController extends AuthController
{
    public static $imgDir = 'uploads/apartment';

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


    public function actions()
    {
        return [
            'upload-image' => [
                'class' => UploadAction::className(),
                'fileName' => Html::getInputName(new Apartment(), 'image'),
                'rename' => UploadAction::RENAME_UNIQUE,
                'validateOptions' => array(
                    'acceptedTypes' => array('png', 'jpg', 'jpeg')
                )
            ],
            'delete-image' => [
                'class' => RemoveAction::className(),
                'upload' => self::$imgDir,
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new Apartment(),
                'attribute' => 'image',
                'options' => static::$imageOptions
            ],
        ];
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
     * Lists all Apartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apartment model.
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
     * Creates a new Apartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Apartment();

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
                Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => trans('words', 'base.successMsg')]);
                return $this->redirect(['index', 'id' => $model->id]);
            } else
                Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => trans('words', 'base.dangerMsg')]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Apartment model.
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
                Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => trans('words', 'base.successMsg')]);
                return $this->redirect(['index', 'id' => $model->id]);
            } else
                Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => trans('words', 'base.dangerMsg')]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Apartment model.
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
     * Finds the Apartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apartment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(trans('words', 'The requested page does not exist.'));
    }

    public function getMenuActions()
    {
        return ['index'];
    }

    // ----------------rezvan methods ------------------
    public function actionList()
    {
        $this->setTheme('frontend');

        $this->innerPage = true;
        $this->bodyClass = 'more-one';

        $projects = Apartment::find()->orderBy([
            'id' => SORT_DESC,
        ])->all();
        $availableApartments = Apartment::find()->andWhere(['>', Apartment::columnGetString('free_count'), 0])->count();

        return $this->render('list', [
            'projects' => $projects,
            'availableApartments' => $availableApartments,
        ]);
    }

    public function actionShow($id)
    {
        $this->setTheme('frontend');
        $this->innerPage = true;
        $this->bodyClass = 'more-one';

        $projects = Apartment::find($id)->orderBy(['id' => SORT_DESC,])->all();

        return $this->render('list', ['projects' => $projects]);
    }

    public function actionSpecial()
    {
        $this->setTheme('frontend');

        $this->innerPage = true;
        $this->bodyClass = 'final-project-view special';
        return $this->render('special');

    }//show project blocks

    public function actionIn()
    {
        $this->setTheme('frontend');

        $this->innerPage = true;
        $this->bodyClass = 'final-project-view';
        return $this->render('in');
    }//show project units
}
