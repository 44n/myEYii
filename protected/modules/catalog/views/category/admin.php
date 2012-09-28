<?php
  
$this->menu=array(	
	array('label'=>'Create CategoryModel', 'url'=>array('category/create', 'section_id' => $section_id)),                                 
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список категорий секции</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-model-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'meta_description',
		'short_description',
		'full_description',
		'meta_title',
		'meta_keywords',
		/*
		'title',
		'section_id',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}&nbsp;{delete}',
            'buttons'=>array(
                    'update' => array(
                        'label'=>'Редактировать',
                        'url'=>'Yii::app()->createUrl("catalog/category/update", array("id"=>$data->id))',
                    ),
                    'delete' => array(
                        'label'=>'Удалить',
                        'url'=>'Yii::app()->createUrl("catalog/category/delete", array("id"=>$data->id))',
                    ),
        
                 ),
		),
	),
)); ?>
