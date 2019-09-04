<?php

namespace app\controllers;

use app\components\CrudControllerInterface;
use app\components\CrudControllerTrait;
use app\components\Imager;
use app\models\Attachment;
use devgroup\dropzone\RemoveAction;
use devgroup\dropzone\UploadAction;
use devgroup\dropzone\UploadedFiles;
use Yii;
use app\models\Page;
use app\models\PageSearch;
use app\components\AuthController;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends AuthController implements CrudControllerInterface
{
    use CrudControllerTrait;

    public static $imageDir = 'uploads/pages';
    public static $imageOptions = [];
    public static $galleryOptions = ['thumbnail' => ['width' => 200, 'height' => 200]];

    /**
     * @return string
     */
    public static function getModelName()
    {
        return Page::className();
    }

    public function getSystemActions()
    {
        return [
            'upload-image',
            'delete-image',
            'upload-attachment',
            'delete-attachment',
            'show',
        ];
    }

    public function actions()
    {
        return [
            'upload-image' => [
                'class' => UploadAction::className(),
                'fileName' => Html::getInputName(new Page(), 'image'),
                'rename' => UploadAction::RENAME_UNIQUE,
                'validateOptions' => array(
                    'acceptedTypes' => array('png', 'jpg', 'jpeg')
                )
            ],
            'delete-image' => [
                'class' => RemoveAction::className(),
                'storedMode' => RemoveAction::STORED_DYNA_FIELD_MODE,
                'model' => new Page(),
                'attribute' => 'image',
                'upload' => self::$imageDir,
                'options' => self::$imageOptions
            ],
            'upload-attachment' => [
                'class' => UploadAction::className(),
                'rename' => UploadAction::RENAME_UNIQUE,
                'model' => new Page(),
                'modelName' => 'Page'
            ],
            'delete-attachment' => [
                'class' => RemoveAction::className(),
                'upload' => Attachment::$attachmentPath,
                'storedMode' => RemoveAction::STORED_RECORD_MODE,
                'model' => new Attachment(),
                'attribute' => 'file',
                'options' => self::$galleryOptions
            ],
        ];
    }

    public function actionShow($id)
    {
        $this->setTheme('frontend', ['bodyClass' => 'innerPages']);
        $model = $this->findModel($id);

        $model->scenario = 'increase_seen';
        $model->seen++;
        $model->save(false);

        return $this->render('show', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();

        if (Yii::$app->request->isAjax and !Yii::$app->request->isPjax) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $image = new UploadedFiles($this->tmpDir, $model->image, $this->imageOptions);
            $gallery = new UploadedFiles($this->tmpDir, $model->gallery, $this->galleryOptions);
            if ($model->save()) {
                $image->move($this->imageDir);
                $gallery->move(Attachment::getAttachmentPath());
                Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => trans('words', 'base.successMsg')]);
                return $this->redirect(isset($_GET['return']) ? $_GET['return'] : ['view', 'id' => $model->id]);
            } else
                Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => trans('words', 'base.dangerMsg')]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Page model.
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

        $image = new UploadedFiles($this->imageDir, $model->image, $this->imageOptions);
        $gallery = new UploadedFiles(Attachment::$attachmentPath, $model->attachments, $this->galleryOptions);

        if (Yii::$app->request->post()) {
            $oldImage = $model->image;
            $oldGallery = ArrayHelper::map($model->gallery, 'id', 'file');
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                $image->update($oldImage, $model->image, $this->tmpDir);
                $gallery->updateAll($oldGallery, $model->gallery, $this->tmpDir, Attachment::getAttachmentRelativePath());
                Yii::$app->session->setFlash('alert', ['type' => 'success', 'message' => trans('words', 'base.successMsg')]);
                return $this->redirect(['view', 'id' => $model->id]);
            } else
                Yii::$app->session->setFlash('alert', ['type' => 'danger', 'message' => trans('words', 'base.dangerMsg')]);
        }

        return $this->render('update', [
            'model' => $model,
            'image' => $image,
            'gallery' => $gallery,
        ]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = new UploadedFiles($this->imageDir, $model->image, $this->imageOptions);
        $image->removeAll(true);
        $gallery = new UploadedFiles(Attachment::$attachmentPath, $model->attachments, $this->galleryOptions);
        $gallery->removeAll(true);
        $model->delete();

        return $this->redirect(['index']);
    }
}
