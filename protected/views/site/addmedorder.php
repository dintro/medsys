<center> <h1> Запись на приём к врачу </h1> </center>
<i></a> <h5> <font color="crimson" face="Arial"> Здесь вы можете подать заявку на запись к врачу. Для этого выберите отделение, врача и дату,
на которую хотите записаться. </font> </h5> </i>

<?php if(Yii::app()->user->hasFlash('medorder')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('medorder'); ?>
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
                echo CHtml::ajaxSubmitButton('Подать заявку', array('site/addmedorder'),array(
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