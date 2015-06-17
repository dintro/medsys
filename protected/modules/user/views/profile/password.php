<?php

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->id=>array('index','id'=>$model->username),
	'Редактировать пароль',
);

$this->menu=array(
	array('label'=>'Просмотр пользователя', 'url'=>array('index', 'id'=>$model->username)),
    array('label'=>'Редактирование профиля', 'url'=>array('update', 'id'=>$model->username)),
);
?>
Укажите пароль <br />
<?php
    echo CHtml::form();
    echo CHtml::textField('password');
    echo CHtml::submitButton('Изменить');
    echo CHtml::endForm();
?>