<?php
/* @var $this MednotesController */
/* @var $model Mednotes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mednotes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model,'user_id', User::all()); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deps_id'); ?>
        <?php echo $form->dropDownList($model,'deps_id', CHtml::listData(Deps::model()->findAll(), 'id','department'));
        //echo $form->dropDownList($model, 'deps_id', Deps::all());
        ?>
		<?php echo $form->error($model,'deps_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datein'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
            'attribute'=>'datein',
            'value'=>$model->datein,
            //additional javascript options for the date picker plugin
            'options'=>array(
            'dateFormat'=>'yy-mm-dd',
            'showAnim'=>'clip',
            //'changeMonth'=>true,
            ),
            'htmlOptions'=>array('style'=>'height:20px;'),
        ));?>
		<?php echo $form->error($model,'datein'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateout'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
            'attribute'=>'dateout',
            'value'=>$model->dateout,
            //additional javascript options for the date picker plugin
            'options'=>array(
            'dateFormat'=>'yy-mm-dd',
            'showAnim'=>'clip',
            //'changeMonth'=>true,
            ),
            'htmlOptions'=>array('style'=>'height:20px;'),
        ));?>
		<?php echo $form->error($model,'dateout'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ward_number'); ?>
		<?php echo $form->textField($model,'ward_number'); ?>
		<?php echo $form->error($model,'ward_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->