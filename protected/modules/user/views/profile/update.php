<?php
/* @var $this ProfileController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->id=>array('index','id'=>$model->username),
	'Редактировать профиль',
);

$this->menu=array(
	array('label'=>'Просмотр User', 'url'=>array('index', 'id'=>$model->username)),
);
?>

<h1>Редактировать профиль <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>