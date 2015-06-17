<?php
$this->menu=array(
	array('label'=>'Журнал страниц', 'url'=>array('index')),
	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Просмотр страницы', 'url'=>array('/page/view', 'id'=>$model->id)),
);
?>

<h1>Обновление страницы <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>