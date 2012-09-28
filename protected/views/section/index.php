<?php


$this->breadcrumbs=array(
    'Категории',
);

$this->menu=array(
    array('label'=>'Создать категорию', 'url'=>array('create')),
    array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Категории</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>
