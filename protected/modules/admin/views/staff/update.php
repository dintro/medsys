<?php

$this->menu=array(
	array('label'=>'Журнал сотрудников', 'url'=>array('index')),
	array('label'=>'Добавить сотрудника', 'url'=>array('create')),
	array('label'=>'Просмотр сотрудника', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Редактировать сотрудника:</h2>
<h1> <?php echo $model->firstname; ?> <?php echo $model->fathername; ?> <?php echo $model->lastname; ?> </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>