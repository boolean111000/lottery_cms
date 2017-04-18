<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Ad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adx-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'online_at')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
        ]
    ]); ?>
    <?= $form->field($model, 'offline_at')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
        ]
    ]); ?>
    <?= $form->field($model, 'imageFile')->widget(
        FileInput::className(),
        [
            'pluginOptions' => [
                'showUpload' => false,
                'initialPreview' => empty($model->image)?'':[\yii\helpers\Url::to($model->image)],
                'initialPreviewAsData' => true,
            ],
            'pluginEvents' => [
                "fileclear" => "function() { $('#ad-image').val('');}",
            ],
        ]
    ) ?>
    <?= $form->field($model, 'image',['options'=>['style'=>'display:none']])->hiddenInput(['id'=>'ad-image'])?>
    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sort')->dropDownList([0,1,2,3,4,5,6,7,8,9]) ?>
    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
