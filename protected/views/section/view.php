<?php
$this->breadcrumbs=array(
    'Категории'=>array('index'),
    $model->meta_title,
);

$this->menu=array(
    array('label'=>'Список категорий', 'url'=>array('index')),
    array('label'=>'Создать категорию', 'url'=>array('create')),
    array('label'=>'Обновить гатегорию', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Добавить потомка', 'url'=>array('create', 'parent'=>$model->id)),
    array('label'=>'Добавить Товар', 'url'=>array('/item/create', 'id'=>$model->id)),
    array('label'=>'Удалить категорию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены ,что хотите удалить категорию?')),
    array('label'=>'Администрировать', 'url'=>array('admin')),
);
?>

<h1>Обзор категории  <?php echo $model->meta_title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'parent_id',
        'short_description',
        'full_description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'price',
    ),
)); ?>
</br>
</br>
</br>
<h1>Потомки категории <?php echo $model->meta_title; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'section-model-grid',
    'dataProvider'=>$model->searchChild(),
   /* 'filter'=>$model, */
    'columns'=>array(
        'id',
        'parent_id',
        'short_description',
        'full_description',
        'meta_title',
        'meta_keywords',
        /*
        'meta_description',
        'price',
        */
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>

<h1> Товары категории <?php echo $model->meta_title; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'sectionItems',
    'dataProvider'=>$model->searchItems(),
    'columns'=>array(
        'id',
        'short_description',
        'full_description',
        'meta_title',
        'meta_keywords',
     array(
            'class'=>'CButtonColumn',
        ),
       
    ),
)); ?>
