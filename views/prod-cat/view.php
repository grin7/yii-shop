<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProdCat */

$this->title = $model->prod_cat_id;
$this->params['breadcrumbs'][] = ['label' => 'Prod Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prod-cat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->prod_cat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->prod_cat_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prod_cat_id',
            'product_id',
            'category_id',
        ],
    ]) ?>

</div>
