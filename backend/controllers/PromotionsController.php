<?php
    namespace backend\controllers;
    use Yii;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use backend\models\PromotionForm;
    use common\models\Promotions;
    use yii\web\UploadedFile;
    use yii\data\ActiveDataProvider;
    class PromotionsController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['index', 'create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['SeoManager'],
                        ],
                        [
                            'actions' => ['index', 'create', 'delete'],
                            'allow' => true,
                            'roles' => ['Owner'],
                        ],
                        [
                            'actions' => ['logout'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post'],
                    ],
                ],
            ];
        }
        public function actionIndex()
        {
            $dataProvider=new ActiveDAtaProvider([
                'query'=>Promotions::find(),
            ]);
            return $this->render('index', ['dataProvider'=>$dataProvider]);
        }
        public function actionCreate()
        {
            $model=new PromotionForm;
            if ($model->load(Yii::$app->request->post())){
                $model->imageFile=UploadedFile::getInstance($model, 'imageFile');
                if($imagePath=$model->upload()){
                    $promotion=new Promotions;
                    $promotion->name=$model->name;
                    $promotion->description=$model->description;
                    $promotion->urlImage=json_encode($imagePath);
                    $promotion->save();
                    $this->redirect('index');
                }
            }
            return $this->render('create', [
                'model'=>$model, 
                'imagePath_prew'=>[],
                'imagePath_conf'=>[],
                'promotion_id'=>'',
            ]);
        }
        public function actionDelete($id)
        {
            $promotion=Promotions::findOne(['id'=>$id]);
            $promotion->delete();
            $this->redirect(['promotions/index']);
        }
        public function actionUpdate($id)
        {
            $model=new PromotionForm;
            $promotion=Promotions::findOne(['id'=>$id]);
            if ($model->load(Yii::$app->request->post())){
                $model->imageFile=UploadedFile::getInstance($model, 'imageFile');
                if($imagePath = $model->upload()){
                    $promotion->urlImage=json_encode($imagePath);
                }
                    $promotion->name=$model->name;
                    $promotion->description=$model->description;
                    
                    $promotion->save();
                    $this->redirect('index');
            }
            $model->name=$promotion->name;
            $model->description=$promotion->description;
            $imagePath_prew=json_decode($promotion->urlImage);
            $name_file=explode('/', $imagePath_prew);
            $imagePath_conf[]=[
                'key'=>$name_file[count($name_file)-1]
            ];
            return $this->render('create', [
                'model'=>$model, 
                'imagePath_prew'=>$imagePath_prew,
                'imagePath_conf'=>$imagePath_conf,
                'promotion_id'=>$id,
            ]);        
        }
    }