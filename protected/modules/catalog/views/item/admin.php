<?php
$this->breadcrumbs=array(
	'Товары'=>array('index'),
	'Администрировать',
);

$this->menu=array(
	array('label'=>'Товары', 'url'=>array('index')),
	array('label'=>'Создать новый', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('item-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список товаров</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-model-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'short_description',
		'full_description',
		'meta_title',
		'meta_keywords',
		/*
		'category_id',
		'price',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}&nbsp;{delete}',
            'buttons'=>array(
                    'update' => array(
                        'label'=>'Редактировать',
                        'url'=>'Yii::app()->createUrl("catalog/item/update", array("id"=>$data->id))',
                    ),
                    'delete' => array(
                        'label'=>'Удалить',
                        'url'=>'Yii::app()->createUrl("catalog/category/delete", array("id"=>$data->id))',
                    ),
        
                 ),
		),
	),
)); ?>
