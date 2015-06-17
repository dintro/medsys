<?php 

$this->menu=array(
	array('label'=>'Журнал записей', 'url'=>array('index')),
	array('label'=>'Добавить запись', 'url'=>array('create')),
	array('label'=>'Редактировать запись', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить запись', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены что хоттите удалить эту запись?')),
    array('label'=>'Создать PDF', 'url'=>array('topdf')),
);
?>

<h1>Медицинская запись #<?php echo $model->id; ?></h1>

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
		'staff_id' => array(
            'name' => 'staff_id',
            'value' => $model->staff->firstname . " " . $model->staff->fathername . " " .$model->staff->lastname,
        ),
		'meetdate',
		'meettime',
		'office_num',
	),
)); ?>
