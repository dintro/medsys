<?php

$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id)),
);
?>
Укажите новый пароль <br />
<?php
    echo CHtml::form();
    echo CHtml::textField('password');
    echo CHtml::submitButton('Изменить');
    echo CHtml::endForm();
?>