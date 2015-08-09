<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput() ?>

    <?= $form->field($model, 'rank')->textInput() ?>

    <?= $form->field($model, 'building_id')->textInput() ?>

    <?= $form->field($model, 'inventory_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'location_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'original')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'medium')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thumb')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'filename')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'taken_time')->textInput() ?>

    <?= $form->field($model, 'verified')->checkbox() ?>

    <?= $form->field($model, 'created_time')->checkbox() ?>

    <?= $form->field($model, 'updated_time')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
