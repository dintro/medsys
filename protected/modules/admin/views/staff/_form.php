<?php
/* @var $this StaffController */
/* @var $model Staff */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'staff-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fathername'); ?>
		<?php echo $form->textField($model,'fathername',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fathername'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
            'attribute'=>'birthday',
            'value'=>$model->birthday,
            //additional javascript options for the date picker plugin
            'options'=>array(
            'dateFormat'=>'yy-mm-dd',
            'showAnim'=>'clip',
            'changeMonth'=>true,
            'changeYear'=>true,
            'yearRange'=>'1920:2099',
            'minDate' => '1920-01-01',      // minimum date
            'maxDate' => '2099-12-31',      // maximum date
            ),
            'htmlOptions'=>array('style'=>'height:20px;'),
        ));?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobtitle'); ?>
		<?php echo $form->textField($model,'jobtitle',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'jobtitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expe'); ?>
		<?php echo $form->textField($model,'expe',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'expe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deps_id'); ?>
		<?php echo $form->dropDownList($model,'deps_id', Deps::all()); ?>
		<?php echo $form->error($model,'deps_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->