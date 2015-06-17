<?php
/* @var $this MednotesController */
/* @var $model Mednotes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mednotes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
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
        <?php echo $form->dropDownList($model,'deps_id', CHtml::listData(Deps::model()->findAll(), 'id','department'),
              array(
              'prompt' => 'Выберите отделение',
              'value' => '0',
              'ajax'  => array(
                  'type'  => 'POST',
                  'url' => Yii::app()->createUrl('admin/mednotes/selectstaff'), //Yii::app()->createUrl CController::createUrl
                  'beforeSend'=>'function(){alert("Теперь выберите врача");}',
                  'update'=>'#' . CHtml::activeId($model, 'staff_id'),  //selector to update value
                  'data' => array('deps_id'=>'js:this.value'),
                  'complete' => 'function(){$("#").change();}',
              )      
              )
            );
        //echo $form->dropDownList($model, 'deps_id', Deps::all());
        ?>
		<?php echo $form->error($model,'deps_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'staff_id'); ?>
		<?php echo $form->dropDownList($model,'staff_id', array(), array('empty' => 'Выберите врача'), CHtml::listData(Staff::model()->findAll(), 'id', 'fullname' )); ?>
		<?php echo $form->error($model,'staff_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meetdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
            'attribute'=>'meetdate',
            'value'=>$model->meetdate,
            //additional javascript options for the date picker plugin
            'options'=>array(
            'dateFormat'=>'yy-mm-dd',
            'showAnim'=>'clip',
            //'changeMonth'=>true,
            ),
            'htmlOptions'=>array('style'=>'height:20px;'),
        ));?>
		<?php echo $form->error($model,'meetdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meettime'); ?>
		<?php $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
              'model'=>$model,
              'attribute'=>'meettime',
              // additional javascript options for the date picker plugin
              'options'=>array(
              'showPeriod'=>true,
              ),
              'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
              ));
        ?>
		<?php echo $form->error($model,'meettime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'office_num'); ?>
		<?php echo $form->textField($model,'office_num'); ?>
		<?php echo $form->error($model,'office_num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->