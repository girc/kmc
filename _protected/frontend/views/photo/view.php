<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/4/2015
 * Time: 1:34 PM
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-view">

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
    <?php
    // Show uploaded file if exists
    if (!$model->isNewRecord && $model->original) {
        echo Html::img($model->getOriginalImageUrl());
    }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category',
            'rank',
            'building_id',
            'inventory_id',
            'location_id',
            'title' ,
            'description',
            'original',
            'medium' ,
            'thumb' ,
            'taken_time',
            'verified',
            'filename',
            'created_time',
            'updated_time'
        ],
    ]) ?>

</div>
