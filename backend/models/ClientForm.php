<?php
    namespace backend\models;
    use yii\base\Model;
    use yii\web\UploadedFile;
    class TovarForm extends Model
    {
        public $secondname;
        public $firstname;
        public $surname;
        public $email;
        public $phone;
        public function rules()
        {
            return[
                [['secondname', 'firstname', 'surname', 'email', 'phone'], 'string', 'message'=>'false data type'],
                [['secondname', 'firstname', 'surname', 'email', 'phone'], 'required', 'message'=>'Data required'],
            ];
        }
        public function attributeLabels()
        {
            return[
                'secondname'=>'SecondName',
                'firstname'=>'Name',
                'surname'=>'SurName',
                'email'=>'Email',
                'phone'=>'Phone',
            ];
        }
    }