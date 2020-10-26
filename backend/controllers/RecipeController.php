<?php

namespace backend\controllers;

use backend\models\CreateRecipe;
use common\models\Dishe;
use common\models\Ingredient;
use Yii;
use common\models\Recipe;
use backend\models\RecipeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecipeController implements the CRUD actions for Recipe model.
 */
class RecipeController extends Controller
{
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
     * Lists all Recipe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dishe = Dishe::find()->indexBy('id')->all();
        $ingredient = Ingredient::find()->indexBy('id')->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dishe'=>$dishe,
            'ingredient'=>$ingredient
        ]);
    }

    /**
     * Displays a single Recipe model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $dishe = Dishe::find()->indexBy('id')->all();
        $ingredient = Ingredient::find()->indexBy('id')->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dishe'=>$dishe,
            'ingredient'=>$ingredient
        ]);
    }

    /**
     * Creates a new Recipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $createRecipe = new CreateRecipe();
        if($post = Yii::$app->request->post()){
            $ingredients = explode(',', $post['CreateRecipe']['ingredients']);
            $id_ingredient = Ingredient::create($ingredients);
            $dishe = $post['CreateRecipe']['title'];
            $dishe_id = Dishe::create($dishe);
            Recipe::create($dishe_id, $id_ingredient);
            return $this->redirect('index');
        }

        return $this->render('create', [
            'createRecipe' => $createRecipe,
        ]);
    }

    /**
     * Updates an existing Recipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dishe = Dishe::find()->indexBy('id')->all();
        $ingredient = Ingredient::find()->indexBy('id')->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $post = Yii::$app->request->post();
            //debug($post);
            if($post['Recipe']['disabled'] == 0) {

                $recipe = Recipe::find()->where(['dishe_id' => $id])->all();
                foreach ($recipe as $item){
                    $item->disabled = 0;
                    $item->save();
                }
            } else {
                $recipe = Recipe::find()->where(['dishe_id' => $id])->all();
                foreach ($recipe as $item){
                    $item->disabled = 1;
                    $item->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dishe'=>$dishe,
            'ingredient'=>$ingredient
        ]);
    }

    /**
     * Deletes an existing Recipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
