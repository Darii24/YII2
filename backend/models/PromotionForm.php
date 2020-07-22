<?php
    namespace backend\models;
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
                [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'message'=>'need to upload file'], 
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
            if($this->validate('name, description')){
                $this->imageFile->saveAs($this->imagePath());
                return true;
            }
            return false;
        }
        public function imagePath()
        {
            return '../../uploads/'.$this->imageFile->baseName.'.'.$this->imageFile->extension;
        }
    }