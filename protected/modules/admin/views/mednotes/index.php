<?php

$this->menu=array(
	array('label'=>'Добавить запись', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mednotes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал медицинских записей</h1>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mednotes-grid',
    'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    //'afterAjaxUpdate' => 'reinstallDatePicker',
	'columns'=>array(
		'id',
        array(
        'class'=> 'CCheckBoxColumn',
        'id'=> 'user_id'
        ),
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
		'staff_id' => array(
            'name' => 'staff_id',
            'value' => '$data->staff->firstname . " " . $data->staff->fathername . " " .$data->staff->lastname',
            'filter' => Staff::all(),
        ),
		'meetdate' => array(
            'name' => 'meetdate',
            'value'=>'date("d-m-Y",strtotime($data->meetdate))',
        ),
		'meettime',
		'office_num',
		array(
			'class'=>'CButtonColumn',
             ),

		),
)); ?>

<?php
	echo CHtml::form();
    echo CHtml::link('Создать мед. направление', array('mednotes/createpdf'));
?>
<?php
	echo CHtml::endForm();
?>