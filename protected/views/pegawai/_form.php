<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pegawai-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	
	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>

	
	<div class="form-actions well">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'icon'=>'ok',
			'label'=>'Simpan',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
