<?php
$this->breadcrumbs=array(
    'Товары'=>array('index'),
    $model->title=>array('view','id'=>$model->id),
    'Редактировать',
);

$this->menu=array(
    array('label'=>'Список товаров', 'url'=>array('index')),
    array('label'=>'Создать товар', 'url'=>array('create','category_id'=>$model->category_id)),
    array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Администрирование', 'url'=>array('category/update','id'=>$model->category_id)),
);
?>

<h1>Редактирование товара <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>