<?php
$this->breadcrumbs=array(
	'Товар'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список Товаров', 'url'=>array('index')),
	array('label'=>'Создать товар', 'url'=>array('create','category_id' =>$model->category_id)),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Администрировать', 'url'=>array('admin')),
);
?>

<h1>Товар<?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'short_description',
		'full_description',
		'meta_title',
		'meta_keywords',
		'category_id',
		'price',
	),
)); ?>
