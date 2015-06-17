<?php

$this->menu=array(
	array('label'=>'Журнал сотрудников', 'url'=>array('index')),
	array('label'=>'Добавление сотрудника', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#staff-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал сотрудников</h1>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'staff-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'firstname',
		'fathername',
		'lastname',
		'birthday',
		'jobtitle',
		'expe',
		'deps_id' => array(
            'name' => 'deps_id',
            'value' => '$data->deps->department',
            'filter' => Deps::all(),
        ),
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
