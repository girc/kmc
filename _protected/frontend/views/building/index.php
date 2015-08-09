<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BuildingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buildings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Building'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'inventory_id:ntext',
            'house_no:ntext',
            'kitta_no:ntext',
            'location_id',
            // 'construction_date_age',
            // 'renovation_history:ntext',
            // 'important_features:ntext',
            // 'historical_socio_cultural_significance:ntext',
            // 'architectural_style',
            // 'present_use:ntext',
            // 'description:ntext',
            // 'owner_name',
            // 'contact_no',
            // 'items_to_be_preserved_before:ntext',
            // 'surveyor_opinion_before:ntext',
            // 'old_date:ntext',
            // 'recorded_by:ntext',
            // 'items_to_be_preserved_after:ntext',
            // 'surveyor_opinion_after:ntext',
            // 'new_date',
            // 'damage_type:ntext',
            // 'present_physical_conditions:ntext',
            // 'timestamp_created_at',
            // 'timestamp_updated_at',
            // 'user_id',
            // 'verified:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
