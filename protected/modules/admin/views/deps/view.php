<?php

$this->menu=array(
	array('label'=>'Журнал отделений', 'url'=>array('index')),
	array('label'=>'Добавить одтделение', 'url'=>array('create')),
	array('label'=>'Редактировать отделение', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить отделение', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2>Просмотр отделения: </h2>
<h1> <?php echo $model->department; ?> </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'department',
		'staff_cnt',
	),
)); ?>
