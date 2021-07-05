<?php
$this->breadcrumbs=array(
	'Surats'=>array('index'),
	$model->id,
);

?>

<h1>Detail Surat</h1>
	

<?php $this->widget('booster.widgets.TbDetailView',array(
		'data'=>$model,
		'type'=>'striped bordered',
		'attributes'=>array(
			'nomor_agenda',
			'asal_surat',
			'tanggal_surat',
			'nomor_surat',
			'perihal',
			'ringkasan',
			'catatan',
			'pengolah',
			'waktu_dilihat',
			'waktu_dibuat',
		),
)); ?>

<div>&nbsp;</div>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Disposisi',
		'icon'=>'share-alt',
		'url'=>array('disposisi/create','id_surat'=>$model->id),
		'htmlOptions'=>array('style'=>'width:100%')
)); ?>
