<?php
$this->breadcrumbs=array(
	'Item Models'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemModel', 'url'=>array('index')),
	array('label'=>'Create ItemModel', 'url'=>array('create')),
	array('label'=>'View ItemModel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ItemModel', 'url'=>array('admin')),
);
?>

<h1>Update ItemModel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>