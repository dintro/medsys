<?php
/* @var $this CommentController */
/* @var $data Comment */
?>


<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('guest')); ?>:</b>
    <?php echo CHtml::encode($data->guest); ?>
    <br />
    <?php
	   if($data->user_id!=false):
    ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user->username); ?>
    <br />
    
    <?php
	endif;
?>
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode(date("j.m.Y H:i",$data->created)); ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
    <?php echo CHtml::encode($data->content); ?>
    <br />


    


</div>