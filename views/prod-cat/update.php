<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProdCat */

$this->title = 'Update Prod Cat: ' . $model->prod_cat_id;
$this->params['breadcrumbs'][] = ['label' => 'Prod Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prod_cat_id, 'url' => ['view', 'id' => $model->prod_cat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prod-cat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
