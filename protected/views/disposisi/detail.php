<?php
$this->breadcrumbs=array(
	'Disposisis'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Disposisi','url'=>array('index')),
array('label'=>'Create Disposisi','url'=>array('create')),
array('label'=>'Update Disposisi','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Disposisi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Disposisi','url'=>array('admin')),
);
?>

<h1>Detail Disposisi</h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
		'data'=>$model,
		'type'=>'striped bordered',
		'attributes'=>array(
			'tanggal',
			'no_agenda',
			'perihal',
			array(
				'label'=>'Asal Disposisi',
				'value'=>$model->getAsalDisposisi()
			),
			array(
				'label'=>'Tujuan Disposisi',
				'value'=>$model->getTujuanDisposisi()
			),
			array(
				'label'=>'Sifat',
				'value'=>$model->getRelationField('disposisi_sifat','nama')
			),
			array(
				'label'=>'Tindakan',
				'value'=>$model->getRelationField('disposisi_tindakan','nama')
			),
			'catatan',
			
			'waktu_dilihat',
			'waktu_dibuat',
		),
)); ?>

<h2>Detail Surat</h2>

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
