<?php
    namespace backend\models;
    use yii\base\Model;
    use yii\web\UploadedFile;
    class TovarForm extends Model
    {
        public $name;
        public $description;
        public $imageFile;
        public $count;
        public $category_id;
        public $subcategory_id;
        public $price;
        public $discount_id;
        public function rules()
        {
            return[
                [['name', 'description'], 'string', 'message'=>'false data type'],
                [['category_id', 'subcategory_id', 'discount_id'], 'integer', 'message'=>'false data type'],
                [['price'], 'double', 'min'=>0, 'message'=>'false data type'],
                [['count'], 'integer', 'min'=>0, 'message'=>'false data type'],
                [['name', 'description', 'category_id', 'subcategory_id'], 'required', 'message'=>'Data required'],
                [['count', 'price'], 'required', 'message'=>'false data type'],
                [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles'=>15], 
            ];
        }
        public function attributeLabels()
        {
            return[
                'name'=>'Tovar name',
                'description'=>'Description',
                'imageFile'=>'Image',
                'count'=>'Count',
                'category_id'=>'Category',
                'subcategory_id'=>'Subcategory',
                'price'=>'Price',
                'discount_id'=>'Discount',
            ];
        }
        public function upload()
        {
            if($this->validate()){
                $result=[];
                foreach ($this->imageFile as $file){
                    $fileName=md5(microtime().rand(0, 1000000));
                    $imagePath='../../uploads/tovar/'.$fileName.'.'.$file->extension;
                    $file->saveAs($imagePath);
                    $result[]=$imagePath;
                }
                return $result;
            }
            return false;
        }
    }