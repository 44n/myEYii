<?php
$this->breadcrumbs=array(
    'Категории'=>array('section/index'),
	'Item Models'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ItemModel', 'url'=>array('index')),
	array('label'=>'Create ItemModel', 'url'=>array('create')),
	array('label'=>'Update ItemModel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ItemModel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemModel', 'url'=>array('admin')),
);
?>

<h1>View ItemModel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'section_id',
		'short_description',
		'full_description',
		'meta_title',
		'meta_keywords',
		'meta_description',
		'price',
	),
)); ?>
