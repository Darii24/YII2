<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\SubCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropdownList(
        Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'choose category']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
