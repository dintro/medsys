<?php
/* @var $this MednotesController */
/* @var $model Mednotes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deps_id'); ?>
		<?php echo $form->textField($model,'deps_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_id'); ?>
		<?php echo $form->textField($model,'staff_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meetdate'); ?>
		<?php echo $form->textField($model,'meetdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meettime'); ?>
		<?php echo $form->textField($model,'meettime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'office_num'); ?>
		<?php echo $form->textField($model,'office_num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->