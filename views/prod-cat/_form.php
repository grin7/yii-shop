<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Product;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ProdCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prod-cat-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php $param_prod = ['options' =>[ $model->product_id => ['Selected' => true]]]; ?>
    
    <?php $param_cat = ['options' =>[ $model->category_id => ['Selected' => true]]]; ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'product_id', 'product_name'), $param_prod); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name'), $param_cat); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
