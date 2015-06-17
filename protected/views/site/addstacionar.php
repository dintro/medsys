<center> <h1> Запись на стационар </h1> </center>
<i></a> <h5> <font color="crimson" face="Arial"> Здесь вы можете подать заявку на поступление в стационар. Для этого выберите отделение и желаемую дату поступления и выписки. </font> </h5> </i>

<?php if(Yii::app()->user->hasFlash('stacionar')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('stacionar'); ?>
</div>

<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mednotes-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

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
    
    	<?php /* if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php /* echo $form->labelEx($model,'verifyCode');  ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Пожалуйста, введите буквы показанные на картинке.
		<br/>Буквы можно вводить в любом регистре.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; */ ?>

    <div class="row buttons">
        <?php
                echo CHtml::ajaxSubmitButton('Подать заявку', array('site/addstacionar'),array(
                'type'=>'POST',
                'update'=>'#',
                'complete' => 'function(){
                alert("Ваша заявка принята и обрабатывается. Мы оповестим Вас в ближайшие 24 часа!");
                }',
                ));
        ?>
<?php echo CHtml::endForm(); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>