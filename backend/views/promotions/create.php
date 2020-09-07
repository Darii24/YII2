<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
    use kartik\depdrop\DepDrop;
    use yii\helpers\Url;
    use kartik\widgets\FileInput;

    $this->title = 'Create Promotions';
    $this->params['breadcrumbs'][] = ['label' => 'Promotions', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
    <div class="panel panel-default">
        <div class="panel-heading">            
            <h4><?=$this->title?></h4>
        </div>
<?php
    $form=ActiveForm::begin(['id'=>'promotions-create']);
?>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$form->field($model, 'name')->textInput();?>
                </div>
            </div>   
            <div class="row">
                <div class="col-md-12">
                    <?=$form->field($model, 'description')->textarea(['row'=>'5']);?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?=$form->field($model, 'imageFile')->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                            'multiple' => false,
                            'max' => 1,
                        ],
                        'pluginOptions' => [
                            'initialPreview'=>$imagePath_prew,
                            'initialPreviewConfig' =>$imagePath_conf,
                            'initialPreviewAsData'=>true,
                            'showCaption' => false,
                            'showRemove' => true,
                            'showUpload' => false,
                            'removeClass' => 'btn btn-default pull-right',
                            'browseClass' => 'btn btn-primary pull-right',
                            'removeLabel' => 'Delete',
                            'browseLabel' => 'Upload',
                            'deleteUrl' =>  Url::to(['/select-data/'.$promotion_id.'/file-delete-promotion']),
                            'overwriteInitial'=>false,
                        ],
                    ]);?>
                </div>           
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
        </div>
<?php
    ActiveForm::end();
?>
    </div>