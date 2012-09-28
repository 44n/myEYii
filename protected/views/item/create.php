<?php
$this->breadcrumbs=array(
	'Item Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ItemModel', 'url'=>array('index')),
	array('label'=>'Manage ItemModel', 'url'=>array('admin')),
);
?>

<h1>Create ItemModel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>