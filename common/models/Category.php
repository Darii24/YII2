<?php
    namespace common\models;
    use yii\db\ActiveRecord;
    /**
     * @property int $id
     * @property string $name
     * @property string $description
     */
    class Category extends ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'category';
        }
        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return[
                [['name', 'description'], 'string'],
                [['id'], 'integer'],
            ];
        }
        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return[
                'id'=>'ID category',
                'name'=>'Category name',
                'description'=>'Description',
            ];
        }
    }