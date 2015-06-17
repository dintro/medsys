<?php

$this->menu=array(
	array('label'=>'Журнал записей', 'url'=>array('index')),
	array('label'=>'Добавить запись', 'url'=>array('create')),
	array('label'=>'Просмотр записи', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактировать запись <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>