<?php
$this->breadcrumbs=array(
	'Item Models',
);

$this->menu=array(
	array('label'=>'Create ItemModel', 'url'=>array('create')),
	array('label'=>'Manage ItemModel', 'url'=>array('admin')),
);
?>

<h1>Item Models</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
