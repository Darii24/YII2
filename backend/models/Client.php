<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $secondname
 * @property string $firstname
 * @property string $surname
 * @property string $email
 * @property string $phone
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['secondname', 'firstname', 'surname', 'email', 'phone'], 'required'],
            [['secondname', 'firstname', 'surname', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'secondname' => 'Secondname',
            'firstname' => 'Firstname',
            'surname' => 'Surname',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }
}
