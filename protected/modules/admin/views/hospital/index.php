<?php

$this->menu=array(
	array('label'=>'Добавить заявку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hospital-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал стационара</h1>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'hospital-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id' => array(
            'name' => 'user_id',
            'value' => '$data->user->name . " " . $data->user->fname . " " .$data->user->lastname',
            'filter' => User::all(),
        ),
		'deps_id' => array(
            'name' => 'deps_id',
            'value' => '$data->deps->department',
            'filter' => Deps::all(),
        ),
		'datein',
		'dateout',
		'ward_number',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
	echo CHtml::form();
    echo CHtml::link('Создать PDF', array('hospital/createpdf'));
?>
<?php
	echo CHtml::endForm();
?>
