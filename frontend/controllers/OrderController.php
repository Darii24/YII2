<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use common\models\LoginForm;
use common\models\Order;
// use common\models\Promotions;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
// use frontend\models\PromotionForm;

/**
 * Site controller
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
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
        $orders=Order::find()->all();
        return $this->render('index', [
            'orders'=>$orders, 
        ]); 
        // (WHERE)
    }
    public function actionCreateOrder()
        {
            $model=new OrderForm;
            if ($model->load(Yii::$app->request->post())){
                $model->imageFile=UploadedFile::getInstances($model, 'imageFile');
                if ($imagePath=$model->upload()){
                    $order=new Order;
                    $order->user_id=$model->user_id;
                    $order->tovar_id=$model->tovar_id;
                    $tovar->urlImages=json_encode($imagePath);
                    $tovar->save();
                    $this->redirect('index');
                }
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
}