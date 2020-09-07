<?php
    namespace backend\controllers;
    use Yii;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use backend\models\TovarForm;
    use yii\web\UploadedFile;
    use yii\data\ActiveDataProvider;
    use common\models\Category;
    use common\models\Discount;
    use common\models\Tovar;
    class TovarController extends Controller
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
            $dataProvider=new ActiveDataProvider([
                'query'=>Tovar::find()
            ]);
            return $this->render('index', ['dataProvider'=>$dataProvider]);
        }
        public function actionCreate()
        {
            $model=new TovarForm;
            if ($model->load(Yii::$app->request->post())){
                $model->imageFile=UploadedFile::getInstances($model, 'imageFile');
                if ($imagePath=$model->upload()){
                    $tovar=new Tovar;
                    $tovar->name=$model->name;
                    $tovar->description=$model->description;
                    $tovar->count=$model->count;
                    $tovar->category_id=$model->category_id;
                    $tovar->subcategory_id=$model->subcategory_id;
                    $tovar->discount_id=$model->discount_id;
                    $tovar->price=$model->price;
                    $tovar->urlImages=json_encode($imagePath);
                    $tovar->save();
                    $this->redirect('index');
                }
            }
            $categoryes=Category::find()->all();
            $category=[];
            foreach ($categoryes as $value){
                $category[$value->id]=$value->name;
            }
            $discounts=Discount::find()->all();
            $discount=[];
            foreach ($discounts as $value){
                $discount[$value->id]='Name - '.$value->name.' discount - '.$value->discount;
            }
            return $this->render('create', [
                'model'=>$model, 
                'category'=>$category, 
                'discount'=>$discount,
                'imagePath_prew'=>[],
                'imagePath_conf'=>[],
                'tovar_id'=>'',
            ]);
        }
        public function actionDelete($id)
        {
            $tovar=Tovar::findOne(['id'=>$id]);
            $tovar->delete();
            $this->redirect(['tovar/index']);
        }
        public function actionUpdate($id)
        {   
            $model=new TovarForm;
            $tovar=Tovar::findOne(['id'=>$id]);
            if ($model->load(Yii::$app->request->post())){
                $model->imageFile=UploadedFile::getInstances($model, 'imageFile');
                if ($imagePath=$model->upload()){
                    $tovar->name=$model->name;
                    $tovar->description=$model->description;
                    $tovar->count=$model->count;
                    $tovar->category_id=$model->category_id;
                    $tovar->subcategory_id=$model->subcategory_id;
                    $tovar->discount_id=$model->discount_id;
                    $tovar->price=$model->price;
                    $tovar->urlImages=json_encode(array_merge(json_decode($tovar->urlImages, true), $imagePath));
                    $tovar->save();
                    $this->redirect('index');
                }
            }
            $model->name=$tovar->name;
            $model->description=$tovar->description;
            $model->count=$tovar->count;
            $model->category_id=$tovar->category_id;
            $model->subcategory_id=$tovar->subcategory_id;
            $model->discount_id=$tovar->discount_id;
            $model->price=$tovar->price;
            $categoryes=Category::find()->all();
            $category=[];
            foreach ($categoryes as $value){
                $category[$value->id]=$value->name;
            }
            $discounts=Discount::find()->all();
            $discount=[];
            foreach ($discounts as $value){
                $discount[$value->id]='Name - '.$value->name.' discount - '.$value->discount;
            }
            $imagePath_prew=json_decode($tovar->urlImages);
            $imagePath_conf=[];
            foreach ($imagePath_prew as $value){
                $name_file=explode('/', $value);
                $imagePath_conf[]=[
                    'key'=>$name_file[count($name_file)-1]
                ];
            }
            return $this->render('create', [
                'model'=>$model, 
                'category'=>$category, 
                'discount'=>$discount,
                'imagePath_prew'=>$imagePath_prew,
                'imagePath_conf'=>$imagePath_conf,
                'tovar_id'=>$id,
            ]);
        }
    }