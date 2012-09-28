<?php
$this->breadcrumbs=array(
    'Категории'=>array('index'),
    'Администрирвание',
);

$this->menu=array(
    array('label'=>'Список категорий', 'url'=>array('index')),
    array('label'=>'Создать категорию', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('section-model-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>Администрирование категории</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'section-model-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
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
