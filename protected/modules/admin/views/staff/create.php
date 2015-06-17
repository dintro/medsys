<?php

$this->menu=array(
	array('label'=>'Журнал сотрудников', 'url'=>array('index')),
);
?>

<h1>Добавить сотрудника</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>