<?php

namespace app\controllers;

use app\components\CrudControllerInterface;
use app\components\CrudControllerTrait;
use app\models\Request;
use app\components\AuthController;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * RequestController implements the CRUD actions for Slide model.
 */
class RequestController extends AuthController implements CrudControllerInterface
{
    use CrudControllerTrait; // add crud functions [index, create, update, delete]

    /**
     * @inheritDoc
     */
    public static function getModelName()
    {
        return Request::className();
    }

    public function getSystemActions()
    {
        return array_merge(parent::getSystemActions(),[
            'new'
        ]);
    }

    public function actionNew()
    {
        $this->setTheme('frontend');
        $this->innerPage = true;
        $this->mainTag = 'main-submit-page';

        $model = new Request();

        if (app()->request->isAjax and !app()->request->isPjax) {
            $model->load(app()->request->post());
            app()->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (app()->request->post()) {
            $model->load(app()->request->post());
            if ($model->save()) {
                app()->session->setFlash('alert', ['type' => 'success', 'message' => Yii::t('words', 'base.successMsg')]);
                return $this->refresh();
            } else
                app()->session->setFlash('alert', ['type' => 'danger', 'message' => Yii::t('words', 'base.dangerMsg')]);
        }

        return $this->render('new', [
            'model' => $model,
        ]);
    }
}
