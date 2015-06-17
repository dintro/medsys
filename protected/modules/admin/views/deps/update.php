<?php

$this->menu=array(
	array('label'=>'Журнал отделений', 'url'=>array('index')),
	array('label'=>'Добавить отделение', 'url'=>array('create')),
	array('label'=>'Просмотр отделений', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Редактировать отделения: </h2>
<h1> <?php echo $model->department; ?> </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>