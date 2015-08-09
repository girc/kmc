<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/4/2015
 * Time: 3:18 PM
 */
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Photo*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Photos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Photo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category',
            'rank',
            'building_id',
            'inventory_id:ntext',
            // 'location_id',
            // 'title',
            // 'description:ntext',
            // 'original:ntext',
            // 'medium:ntext',
            // 'thumb:ntext',
            // 'filename:ntext',
            // 'taken_time',
            // 'verified:boolean',
            // 'created_time:boolean',
            // 'updated_time:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
