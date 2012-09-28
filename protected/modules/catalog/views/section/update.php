

<h1>Редактирование секции <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo $this->renderPartial('/category/admin', array('model'=>$modelCategory,'section_id' => $model->id)); ?>

<?php
$this->breadcrumbs =array(
    'Section Models'=>array('index'),
    $model->title=>array('view','id'=>$model->id),
    'Update',
);

$this->menu +=array(
    array('label'=>'List SectionModel', 'url'=>array('index')),
    array('label'=>'Create SectionModel', 'url'=>array('create')),
    array('label'=>'View SectionModel', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage SectionModel', 'url'=>array('admin')),
);
?>
