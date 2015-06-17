<?php

$this->menu=array(
	array('label'=>'Журнал записей', 'url'=>array('index')),
);
?>

<h1>Добавить запись</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>