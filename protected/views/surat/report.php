
<h1>Laporan</h1>

<?php print CHtml::beginForm(); ?>

	<p>Periode Tanggal Surat</p>

	<div class="form-group">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    			'name'=>'tanggal_awal',
				// additional javascript options for the date picker plugin
    			'options'=>array(
        			'showAnim'=>'fold',
        			'dateFormat'=>'yy-mm-dd'
    			),
    			'htmlOptions'=>array(
        			'class'=>'form-control',
        			'placeholder'=>'Tanggal Awal'
    			),
		)); ?>
	</div>

	<div class="form-group">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    			'name'=>'tanggal_akhir',
				// additional javascript options for the date picker plugin
    			'options'=>array(
        			'showAnim'=>'fold',
        			'dateFormat'=>'yy-mm-dd'
    			),
    			'htmlOptions'=>array(
        			'class'=>'form-control',
        			'placeholder'=>'Tanggal Akhir'
    			),
		)); ?>
	</div>

	<div class="form-actions well">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'icon'=>'ok',
			'label'=>'Proses',
		)); ?>
	</div>
<?php print CHtml::endForm(); ?>


