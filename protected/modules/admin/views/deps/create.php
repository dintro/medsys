<?php

$this->menu=array(
	array('label'=>'Журнал отделений', 'url'=>array('index')),
);
?>

<h1>Добавить отделение</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>