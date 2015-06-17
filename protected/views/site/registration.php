<?php if(Yii::app()->user->hasFlash('registration')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>

<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>
    
    
    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>
    
    
    <div class="row">
        <?php echo $form->labelEx($model,'fname'); ?>
        <?php echo $form->textField($model,'fname',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'fname'); ?>
    </div>
    
    
    <div class="row">
        <?php echo $form->labelEx($model,'lastname'); ?>
        <?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'lastname'); ?>
    </div>
    
    
    <div class="row">
        <?php echo $form->labelEx($model,'birthdate'); ?>
       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
            'attribute'=>'birthdate',
            'value'=>$model->birthdate,
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
        <?php echo $form->error($model,'birthdate'); ?>
    </div>
    

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Пожалуйста, введите буквы показанные на картинке.
		<br/>Буквы можно вводить в любом регистре.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Регистрация'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>