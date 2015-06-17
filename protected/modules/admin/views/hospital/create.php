<?php

$this->menu=array(
	array('label'=>'Журнал стационара', 'url'=>array('index')),
);
?>

<h1>Добавить запись</h1>

<p> Поля со <font color="red"> * </font> обязательны </p>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>