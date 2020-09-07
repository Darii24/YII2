<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\GridView;
    $this->title='SHOP';
?>    
<div class="row">
<?php
    foreach($tovars as $tovar){
?>
<div class="col-xl-3 p-4">
    <div class="card w-100 m-0" style="width: 18rem;">    
        <div class="bg-example bg-light">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
<?php
    $active='active';
    foreach(json_decode($tovar->urlImages) as $image){
?>
            <div class="carousel-item <?=$active?>">
                <?= Html::img(str_replace('../../../../','../../../', $image), ['alt' => 'TOVAR', 'class' => 'd-block w-100 mx-auto', 'style'=>'height: 200px;']) ?>            
            </div>
<?php
    $active='';
    }
?>
    </div>
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;"><?=$tovar->name?></h4>
            <p class="card-text">Description: <?=$tovar->description?></p>
            <p class="card-text">Price: <?=$tovar->price?></p>
<?=Html::a('Buy', ['buy', 'id'=>$tovar->id], ['class'=>'btn btn-primary']);?>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php
    }
?>
</div>