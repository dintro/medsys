<?php

$this->menu=array(
	array('label'=>'Журнал стационара', 'url'=>array('index')),
	array('label'=>'Добавить запись', 'url'=>array('create')),
	array('label'=>'Редактировать журнал', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить запись', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр журнала стационара #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id' => array(
            'name' => 'user_id',
            'value' => $model->user->name . " " . $model->user->fname . " " .$model->user->lastname,
        ),
		'deps_id' => array(
            'name' => 'deps_id',
            'value' => $model->deps->department,
        ),
		'datein',
		'dateout',
		'ward_number',
	),
)); ?>
