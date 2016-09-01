<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Product;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Image */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?php if(!empty($model->image_name)){ ?>
        <label> Old Image: </label><br />
        <?= Html::img(Yii::$app->request->baseUrl.'/uploads/'.$model->image_name);
    }?>
    
    <?= $form->field($model, 'image_name')->fileInput() ?>

    <?php $param = ['options' =>[ $model->product_id => ['Selected' => true]]]; ?>
    
    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'product_id', 'product_name'), $param); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
