<?php
$this->breadcrumbs=array(
    'Категории'=>array('index'),
    'Создать',
);

$this->menu=array(
    array('label'=>'Список категорий', 'url'=>array('index')),
    array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Создание категории</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>