<?php

$this->menu=array(
	array('label'=>'Журнал стационара', 'url'=>array('index')),
	array('label'=>'Добавить запись', 'url'=>array('create')),
	array('label'=>'Просмотр журнала стационара', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактировать журнал стационара <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>