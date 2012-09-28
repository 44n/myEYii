<?php
$this->breadcrumbs=array(
	'Секции',
);

$this->menu=array(
	array('label'=>'Создать новую', 'url'=>array('create')),
	array('label'=>'Администрировать', 'url'=>array('admin')),
);
?>

<h1>Секции</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
