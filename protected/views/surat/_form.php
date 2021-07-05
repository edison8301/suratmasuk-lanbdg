<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'surat-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nomor_agenda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'asal_surat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->datePickerGroup($model,'tanggal_surat',array(
			'widgetOptions'=>array(
					'options'=>array('format'=>'yyyy-mm-dd','autoclose'=>true),
					'htmlOptions'=>array('class'=>'span5')
			), 
			'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>'
	)); ?>

	<?php echo $form->textFieldGroup($model,'nomor_surat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'perihal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textAreaGroup($model,'ringkasan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->fileFieldGroup($model,'lampiran_1',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->fileFieldGroup($model,'lampiran_2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->fileFieldGroup($model,'lampiran_3',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>



	<div class="form-actions well">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'icon'=>'ok',
			'label'=>'Simpan',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
