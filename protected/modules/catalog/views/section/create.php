<?php
$this->breadcrumbs=array(
    'Секции'=>array('index'),
    'Создать',
);

$this->menu=array(
    array('label'=>'Список секций', 'url'=>array('index')),
    array('label'=>'Редактирование', 'url'=>array('admin')),
);
?>

<h1>Создать секцию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>