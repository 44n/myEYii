<?php
$this->breadcrumbs=array(
    'Товары'=>array('index'),
    'Создание',
);

$this->menu=array(
    array('label'=>'Список товаров', 'url'=>array('index')),
    array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Создать товар</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>