<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Building */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="building-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inventory_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'house_no')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kitta_no')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'location_id')->textInput() ?>

    <?= $form->field($model, 'construction_date_age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'renovation_history')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'important_features')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'historical_socio_cultural_significance')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'architectural_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'present_use')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'owner_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'items_to_be_preserved_before')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'surveyor_opinion_before')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'old_date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recorded_by')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'items_to_be_preserved_after')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'surveyor_opinion_after')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'new_date')->textInput() ?>

    <?= $form->field($model, 'damage_type')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'present_physical_conditions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timestamp_created_at')->textInput() ?>

    <?= $form->field($model, 'timestamp_updated_at')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'verified')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
