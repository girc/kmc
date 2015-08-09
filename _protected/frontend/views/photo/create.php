<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/4/2015
 * Time: 1:32 PM
 */

/* @var $this yii\web\View */
/* @var $model common\models\Photo */

$this->title = Yii::t('app', 'Create Photo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
