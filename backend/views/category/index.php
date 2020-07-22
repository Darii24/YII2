<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\GridView;
    $this->title='CATEGORY';
?>

    <div class="row">
        <div class="col-md-12">
            <?=Html::a(
                'ADD CATEGORY',
                Url::toRoute('category/create'),
                [
                    'class'=>'btn btn-success pull-right',
                    'id'=>'category/create'
                ]
                );
            ?>
        </div>
    </div>
<?=GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        ['class'=>'yii\grid\SerialColumn'],
        'id',
        'name',
        'description',
        ['class'=>'yii\grid\ActionColumn', 'template'=>'{update} {delete}',
            'buttons'=>[
                'update'=>function($url, $model, $key){
                    return Html::a('Edit', ['update', 'id'=>$model->id], ['class'=>'btn btn-success']);
                },
                'delete'=>function($url, $model, $key){
                    return Html::a('Delete', ['delete', 'id'=>$model->id], ['class'=>'btn btn-success']);
                },
                'view'=>function($url, $model, $key){
                    return Html::a('View', ['view', 'id'=>$model->id], ['class'=>'btn btn-success']);
                },
            ]
        ]
    ]
]);