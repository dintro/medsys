<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'Редактирование профиля', 'url'=>array('update')),
    array('label'=>'Редактирование пароля', 'url'=>array('update')),
);

?>

<h2> <b> Просмотр профиля: </b> </h2> <h1><?php echo $model->name ?> <?php echo $model->fname ?> <?php echo $model->lastname ?></h1>

<h3>(Логин пользователя: <?php echo $model->username ?>) </h3>

<!-- <a href="#">Редактировать профиль</a><br />
<a href="#">Редактировать пароль</a> -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'id',
		'username',
        'name',
        'fname',
        'lastname',
        'birthdate' => array(
        'name' => 'birthdate',
        'value'=>Yii::app()->dateFormatter->format('dd MMM yyyy',$model->birthdate),
        ),
		'created' => array(
            'name' => 'created',
            'value' => date("j.m.Y H:i", $model->created),
        ),
		'email',
	),
)); ?>

<?php
	echo CHtml::form();
    echo CHtml::link('Редактировать профиль');
?>
<?php
	echo CHtml::endForm();
?>