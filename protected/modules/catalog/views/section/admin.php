<?php

$this->breadcrumbs=array(
    'Секции'=>array('index'),
    'Администрирование',
);

$this->menu=array(
    array('label'=>'Подробное описание', 'url'=>array('index')),
    array('label'=>'Создать новую', 'url'=>array('create')),
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

<h1>Администрирование Секций</h1>
 
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'section-model-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'title',
        'meta_description',
        'short_description',
        'full_description',
        'meta_title',
        /*
        'meta_keywords',
        */
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
