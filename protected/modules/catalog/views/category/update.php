

<h1> Редактировать категорию <?php echo $model->title; ?> </h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo $this->renderPartial('/item/admin', array('model'=>$modelItem,'category_id' => $model->id));?>
<?php   
$this->breadcrumbs =array(
    'Секции'=>array('section/admin'),
    $model->section->title=>array('section/update','id'=>$model->section->id),
    $model->title=>array('update','id'=>$model->id),
    'Редактировать',
);

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Создать товар', 'url'=>array('item/create', 'category_id' => $model->id)),
	array('label'=>'Подробнее', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Администрировать', 'url'=>array('admin')),
);
?>
