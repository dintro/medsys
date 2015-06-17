<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'comment-form',
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>
    
    <?php
	if(Yii::app()->user->isGuest):
?>
    
    <div class="row">
        <?php echo $form->labelEx($model,'guest'); ?>
        <?php echo $form->textField($model,'guest',array('size'=>15,'maxlength'=>15)); ?>
        <?php echo $form->error($model,'guest'); ?>
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
    <?php endif; ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Отправить'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->