<?php
    namespace backend\models;
    use yii\base\Model;
    class CategoryForm extends Model
    {
        public $name;
        public $description;
        public function rules()
        {
            return[
                [['name', 'description'], 'string', 'message'=>'false data type'],
                [['name', 'description'], 'required', 'message'=>'Data required'],
            ];
        }
        public function attributeLabels()
        {
            return[
                'name'=>'Category name',
                'description'=>'Description',
            ];
        }
        public function upload()
        {
            if($this->validate('name, description')){
                return true;
            }
            return false;
        }
    }