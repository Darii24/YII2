<?php
    namespace frontend\controllers;
    use Yii;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use frontend\models\TovarForm;
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
        /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }
    public function actionIndex()
    {
        $tovars=Tovar::find()->all();
        return $this->render('index', [
            'tovars'=>$tovars, 
        ]);

    }
    /**
     * Displays a single Discount model.
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
}