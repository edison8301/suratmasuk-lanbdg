<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'disposisi-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'id_surat'); ?>

	<div class="row">
		<div class="col-md-6">
			<?php echo $form->datePickerGroup($model,'tanggal',array(
					'widgetOptions'=>array(
						'options'=>array('format'=>'yyyy-mm-dd','autoclose'=>true),
						'htmlOptions'=>array('class'=>'span5')
					), 		
					'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>'
			)); ?>
		</div>
		<div class="col-md-6">
			<?php echo $form->textFieldGroup($model,'no_agenda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php echo $form->textFieldGroup($model,'perihal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<?php print CHtml::label('Tujuan Disposisi',''); ?>
			<?php foreach(Jabatan::model()->findAllByAttributes(array('id_jabatan_jenis'=>1,'id_atasan'=>1)) as $jabatan) { ?>	
			<div style="font-weight:none">
				<?php print CHtml::checkBox('id_disposisi_tujuan['.$jabatan->id.']',$model->id_disposisi_tujuan,CHtml::listData(Jabatan::model()->findAllByAttributes(array('id'=>$jabatan->id)),'id','nama')); ?>
				 
				<?php print $jabatan->nama_jabatan; ?> - <b><?php print Pegawai::getNamaByIdJabatan($jabatan->id); ?></b>
			</div>
			<?php foreach($jabatan->findAllSubjabatan() as $subjabatan) { ?>
			<div style="padding-left:30px;font-weight:none">
				<?php print CHtml::checkBox('id_disposisi_tujuan['.$subjabatan->id.']',$model->id_disposisi_tujuan,CHtml::listData(Jabatan::model()->findAllByAttributes(array('id'=>$subjabatan->id)),'id','nama')); ?>
				
				<?php print $subjabatan->nama_jabatan; ?> - <b><?php print Pegawai::getNamaByIdJabatan($subjabatan->id); ?></b>
			</div>
			<?php } ?>
			<?php } ?>
			
			<div>&nbsp;</div>

			<?php echo $form->select2Group($model,'disposisi_nama',array(
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-5',
					),
					'widgetOptions' => array(
						'asDropDownList' => false,
						'options' => array(
							'tags' => Pegawai::model()->getListAutoComplete(),
							'placeholder' => 'Ketik Nama Pegawai',
							'separator' => ';'
						)
					)
			)); ?>
			<?php /*	
			<div class="form-group">
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'disposisi_nama',
    				'source'=>Pegawai::model()->getListAutoComplete(),
    				//additional javascript options for the autocomplete plugin
    				'options'=>array(
        				'minLength'=>'1',
    				),
    				'htmlOptions'=>array(
    					'class'=>'form-control',
    					'placeholder'=>'Berdasarkan Nama Pegawai'
    				),
    				'value'=>$model->getDisposisiNama()
			)); ?>
			</div>
			*/ ?>

		</div>
		<div class="col-md-6">
			<?php echo $form->dropDownListGroup($model,'id_disposisi_sifat',array(
					'widgetOptions'=>array(
						'data'=>CHtml::listData(DisposisiSifat::model()->findAll(),'id','nama'),
						'htmlOptions'=>array('class'=>'span5')
					)
			)); ?>

			<?php echo $form->checkBoxListGroup($model,'id_disposisi_tindakan',array(
					'widgetOptions'=>array(
						'data'=>CHtml::listData(DisposisiTindakan::model()->findAll(),'id','nama'),
						'htmlOptions'=>array('class'=>'span5')
					)
			)); ?>

			<?php echo $form->textAreaGroup($model,'catatan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
		
		</div>
	</div>
	
	<div>&nbsp;</div>

	<div class="form-actions well">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'icon'=>'share-alt',
			'label'=>'Disposisi',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
