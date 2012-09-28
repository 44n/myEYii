<?php
$this->breadcrumbs=array(
	'Category Models'=>array('section/update','id'=>$model->section_id),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CategoryModel', 'url'=>array('index')),
	array('label'=>'Create CategoryModel', 'url'=>array('create')),
	array('label'=>'Update CategoryModel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategoryModel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoryModel', 'url'=>array('admin')),
);
?>

<h1>View CategoryModel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'meta_description',
		'short_description',
		'full_description',
		'meta_title',
		'meta_keywords',
		'title',
		'section_id',
	),
)); ?>
