<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subcategory".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 *
 * @property Category $category
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID subcategory',
            'name' => 'Name subcategory',
            'description' => 'Description subcategory',
            'category_id' => 'Category',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
