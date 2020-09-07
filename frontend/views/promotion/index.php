<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\GridView;
    $this->title='PROMOTIONS';
?>

<div class="bg-example bg-light">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
<?php
    $active='active';
    foreach($promotions as $promotion){
?>
            <div class="carousel-item <?=$active?>">
                <?= Html::img(str_replace('../../../','../../',json_decode($promotion->urlImage)), ['alt' => 'PROMO', 'class' => 'd-block w-100 mx-auto', 'style'=>'height: 500px;']) ?>            
            </div>
<?php
    $active='';
    }
?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>