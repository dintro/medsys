<?php
$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Изменение пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы в этом уверены?')),
);
?>

<h2> <b> Просмотр профиля: </b> </h2> <h1><?php echo $model->name ?> <?php echo $model->fname ?> <?php echo $model->lastname ?></h1>

<h3>(Логин пользователя: <?php echo $model->username ?>) </h3>

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
		'password',
		'created' => array(
            'name' => 'created',
            'value' => date("j.m.Y H:i", $model->created),
        ),
		'ban' => array(
            'name' => 'ban',
            'value' => ($model->ban==1)?" ":"Бан",
        ),
        'role' => array(
            'name' => 'role',
            'value' => ($model->role==1)?"User":"Admin",
        ),
		'email',
	),
)); ?>
