<?php

namespace frontend\controllers;

use common\models\Photo;
use common\models\search\PhotoSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'admin', 'delete-image'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['create', 'update', 'admin'],
                        'allow' => true,
                        'roles' => ['editor'],
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true
                    ],
                    [
                        // other rules
                    ],

                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-image' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

    /**
     * Lists all Photo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Photo model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Photo();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            if ($model->save()) {
                if (UploadedFile::getInstance($model, 'image')) {
                    // process uploaded image file instance
                    $image = UploadedFile::getInstance($model, 'image');
                    // upload only if valid uploaded file instance found
                    if ($image !== false) {
                        try {
                            $model->saveUploadedImage($image);
                        } catch (Exception $e) {
                            $transaction->rollBack();
                        }
                    }
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            if ($model->save()) {
                if (UploadedFile::getInstance($model, 'image')) {
                    // process uploaded image file instance
                    $image = UploadedFile::getInstance($model, 'image');
                    // upload only if valid uploaded file instance found
                    if ($image !== false) {
                        try {
                            // replace old image by new
                            $model->replaceUploadedImage($image);
                        } catch (Exception $e) {
                            $transaction->rollBack();
                        }
                    }
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Photo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // validate deletion and on failure process any exception
        // e.g. display an error message
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Success deleting image');
        } else {
            Yii::$app->session->setFlash('error', 'Error deleting image');
        }
        return $this->redirect(['index']);
    }

    public function actionDeleteImage($id)
    {
        $model = $this->findModel($id);
        if (!$model->deleteImage()) {
            Yii::$app->session->setFlash('error', 'Error deleting image');
        }
        return $this->render('view', ['model' => $model]);
    }

    /**
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Photo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
