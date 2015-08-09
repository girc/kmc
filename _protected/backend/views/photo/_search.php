<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\PhotoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'rank') ?>

    <?= $form->field($model, 'building_id') ?>

    <?= $form->field($model, 'inventory_id') ?>

    <?php // echo $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'original') ?>

    <?php // echo $form->field($model, 'medium') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'taken_time') ?>

    <?php // echo $form->field($model, 'verified')->checkbox() ?>

    <?php // echo $form->field($model, 'created_time')->checkbox() ?>

    <?php // echo $form->field($model, 'updated_time')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
