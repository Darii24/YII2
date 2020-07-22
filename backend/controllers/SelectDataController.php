<?php
    namespace backend\controllers;
    use Yii;
    use yii\web\Controller;
    use common\models\SubCategory;
    class SelectDataController extends Controller
    {
        public function actionSubCategory()
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if (isset($_POST['depdrop_all_params']['category'])){
                $output=[];
                $category=$_POST['depdrop_all_params']['category'];
                $sub_categories=SubCategory::findAll(['category_id'=>$category]);
                foreach ($sub_categories as $value){
                    $output[]=[
                        'id'=>$value->id,
                        'name'=>$value->name,
                    ];
                }
                $selected=[];
                if ($_POST['depdrop_all_params']['sel-subcategory']==!''){
                    $sel_subcategory=$_POST['depdrop_all_params']['sel-subcategory'];
                    $select=SubCategory::findOne(['id'=>$sel_subcategory]);
                    $selected=[
                        'id'=>$select->id,
                        'name'=>$select->name,
                    ];
                }
                return ['output'=>$output, 'selected'=>$selected];
            }
        }
    }