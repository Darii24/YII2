<?php
    namespace frontend\models;
    use yii\base\Model;
    use yii\web\UploadedFile;
    class PromotionForm extends Model
    {
        public $name;
        public $description;
        public $imageFile;
        public function rules()
        {
            return[
                [['name', 'description'], 'string', 'message'=>'false data type'],
                [['name', 'description'], 'required', 'message'=>'Data required'],
                [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles'=>1], 
            ];
        }
        public function attributeLabels()
        {
            return[
                'name'=>'Promo name',
                'description'=>'Description',
                'imageFile'=>'Image',
            ];
        }
        public function upload()
        {
            if($this->validate()){
                    $fileName=md5(microtime().rand(0, 1000000));
                    $imagePath='../../images/promotions/'.$fileName.'.'.$this->imageFile->extension;
                    $this->imageFile->saveAs($imagePath);
                    $result='../../'.$imagePath;
                return $result;
            }
            return false;
        }
    }