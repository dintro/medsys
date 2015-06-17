<?php
$this->breadcrumbs=array(
	'Категория: '. $model->category->title => array('index', 'id'=>$model->category_id),
    $model->title,
);?>

<h1><?php echo $model->title; ?></h1>
<?php
	echo date('j.m.Y H:i', $model->created);
?>
<hr />

<?php 
    echo $model->content;
?>


<hr />

<?php if(Yii::app()->user->hasFlash('comment')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('comment'); ?>
</div>

<?php else: ?>
<?php
	echo $this->renderPartial('newComment',array('model'=>$newComment));
?>

<?php
	endif;
?>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>Comment::all($model->id),
    'itemView'=>'_viewComment',
)); ?>