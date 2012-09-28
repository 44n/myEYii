<?php
$this->breadcrumbs=array(
    'Категории'=>array('index'),
    $model->meta_title=>array('view','meta_title'=>$model->meta_title),
    'Редактировать',
);

$this->menu=array(
    array('label'=>'Список категорий', 'url'=>array('index')),
    array('label'=>'Создать категорию', 'url'=>array('create')),
    array('label'=>'Обзор', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Добавить потомка', 'url'=>array('create', 'parent'=>$model->id)),
    array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Обновить Категорию <?php echo $model->meta_title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
