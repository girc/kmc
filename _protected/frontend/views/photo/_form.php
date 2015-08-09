<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/4/2015
 * Time: 1:29 PM
 *
 * @var $this yii\web\View
 * @var $model common\models\Photo
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'] // !important
]); ?>
<?= $form->field($model,'title')->textInput()?>
<?= $form->field($model,'description')->textarea()?>
<?php
// Show uploaded file if exists
if (!$model->isNewRecord && $model->original) {
    echo Html::img($model->getOriginalImageUrl());
}
?>

<?php
// your fileinput widget for single file upload
echo $form->field($model, 'image')->fileInput([
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'gif', 'png']
        ]
    ]
);
/**
 * uncomment for multiple file upload
 * echo $form->field($model, 'image[]')->widget(FileInput::classname(), [
 * 'options'=>['accept'=>'image/*', 'multiple'=>true],
 * 'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
 * ]);
 */

?>


<?php
// render the submit button
echo Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
);
?>

<?php ActiveForm::end(); ?>
<hr/>
<p>
    <?= Html::a(Yii::t('app', 'X'), [Url::to('photo/delete-image'), 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this image?'),
            'method' => 'post',
        ],
    ]) ?>
</p>