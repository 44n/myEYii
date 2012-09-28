<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_description'); ?>
		<?php echo $form->textField($model,'meta_description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'short_description'); ?>
		<?php echo $form->textField($model,'short_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_description'); ?>
		<?php echo $form->textField($model,'full_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_keywords'); ?>
		<?php echo $form->textField($model,'meta_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'section_id'); ?>
		<?php echo $form->textField($model,'section_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->