<?php

$this->menu=array(
	array('label'=>'Журнал сотрудников', 'url'=>array('index')),
	array('label'=>'Добавить сотрудника', 'url'=>array('create')),
	array('label'=>'Редактировать сотрудника', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить сотрудника', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2>Просмотр сотрудника:</h2>
<h1> <?php echo $model->firstname; ?> <?php echo $model->fathername; ?> <?php echo $model->lastname; ?> </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'firstname',
		'fathername',
		'lastname',
		'birthday',
		'jobtitle',
		'expe',
		'deps_id' => array(
            'name' => 'deps_id',
            'value' => $model->deps->department,
        ),
		'email',
	),
)); ?>
