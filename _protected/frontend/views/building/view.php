<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Building */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'inventory_id:ntext',
            'house_no:ntext',
            'kitta_no:ntext',
            'location_id',
            'construction_date_age',
            'renovation_history:ntext',
            'important_features:ntext',
            'historical_socio_cultural_significance:ntext',
            'architectural_style',
            'present_use:ntext',
            'description:ntext',
            'owner_name',
            'contact_no',
            'items_to_be_preserved_before:ntext',
            'surveyor_opinion_before:ntext',
            'old_date:ntext',
            'recorded_by:ntext',
            'items_to_be_preserved_after:ntext',
            'surveyor_opinion_after:ntext',
            'new_date',
            'damage_type:ntext',
            'present_physical_conditions:ntext',
            'timestamp_created_at',
            'timestamp_updated_at',
            'user_id',
            'verified:boolean',
        ],
    ]) ?>

</div>
