<?php
/* @var $this HospitalController */
/* @var $model Hospital */
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
		<?php echo $form->label($model,'datein'); ?>
		<?php echo $form->textField($model,'datein'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateout'); ?>
		<?php echo $form->textField($model,'dateout'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ward_number'); ?>
		<?php echo $form->textField($model,'ward_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->