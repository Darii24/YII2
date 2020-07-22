<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
    <div class="row">
        <div class="col-md-12">
            <h3>Add category</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
<?php
    $form=ActiveForm::begin(
        [
            'options'=>[
                'enctype'=>'multipart/form-data'
            ]
        ]
    );
    echo $form->field($model, 'name')->textInput();
    echo $form->field($model, 'description')->textarea(['row'=>'5']);
?>
            <div class="form-group">
                <?=Html::submitButton('save', ['class'=>'btn btn-primary pull-left'])?>
            </div>
<?php
    ActiveForm::end();
?>
        </div>
    </div>