<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\BuildingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="building-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'inventory_id') ?>

    <?= $form->field($model, 'house_no') ?>

    <?= $form->field($model, 'kitta_no') ?>

    <?= $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'construction_date_age') ?>

    <?php // echo $form->field($model, 'renovation_history') ?>

    <?php // echo $form->field($model, 'important_features') ?>

    <?php // echo $form->field($model, 'historical_socio_cultural_significance') ?>

    <?php // echo $form->field($model, 'architectural_style') ?>

    <?php // echo $form->field($model, 'present_use') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'owner_name') ?>

    <?php // echo $form->field($model, 'contact_no') ?>

    <?php // echo $form->field($model, 'items_to_be_preserved_before') ?>

    <?php // echo $form->field($model, 'surveyor_opinion_before') ?>

    <?php // echo $form->field($model, 'old_date') ?>

    <?php // echo $form->field($model, 'recorded_by') ?>

    <?php // echo $form->field($model, 'items_to_be_preserved_after') ?>

    <?php // echo $form->field($model, 'surveyor_opinion_after') ?>

    <?php // echo $form->field($model, 'new_date') ?>

    <?php // echo $form->field($model, 'damage_type') ?>

    <?php // echo $form->field($model, 'present_physical_conditions') ?>

    <?php // echo $form->field($model, 'timestamp_created_at') ?>

    <?php // echo $form->field($model, 'timestamp_updated_at') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'verified')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
