<?php
$this->breadcrumbs=array(
	'Section Models'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SectionModel', 'url'=>array('index')),
	array('label'=>'Create SectionModel', 'url'=>array('create')),
	array('label'=>'Update SectionModel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SectionModel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SectionModel', 'url'=>array('admin')),
);
?>

<h1>View SectionModel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'meta_description',
		'short_description',
		'full_description',
		'meta_title',
		'meta_keywords',
	),
)); ?>
