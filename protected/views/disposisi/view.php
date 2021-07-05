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
				'value'=>$model->getTindakan()
			),
			array(
				'label'=>'Catatan',
				'type'=>'raw',
				'value'=>'<span style="font-weight:bold;color:#DE1300">'.$model->catatan.'</span>'
			),	
			array(
				'label'=>'Waktu Dilihat',
				'value'=>Helper::getCreatedTime($model->waktu_dilihat)
			),
			array(
				'label'=>'Waktu Input',
				'value'=>Helper::getCreatedTime($model->waktu_dibuat)
			)
		),
)); ?>

<?php if($model->dari == Yii::app()->user->id) { ?>
<div>&nbsp;</div>
<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Sunting Disposisi',
		'icon'=>'pencil',
		'url'=>array('disposisi/update','id'=>$model->id),
		'htmlOptions'=>array('style'=>'width:100%;margin-bottom:10px')
)); ?>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'danger',
		'label'=>'Hapus Disposisi',
		'icon'=>'trash',
		'url'=>array('disposisi/directDelete','id'=>$model->id),
		'htmlOptions'=>array(
			'style'=>'width:100%',
			'onclick'=>'return confirm("Yakin akan menghapus disposisi?")'
		)
)); ?>



<?php } ?>

<div>&nbsp;</div>

<h2>Detail Surat</h2>

<?php $surat = $model->findSurat(); ?>

<?php $this->widget('booster.widgets.TbDetailView',array(
		'data'=>$surat,
		'type'=>'striped bordered',
		'attributes'=>array(
			'nomor_agenda',
			'asal_surat',
			'tanggal_surat',
			'nomor_surat',
			'perihal',
			'ringkasan',
			'pengolah',
			array(
				'label'=>'Waktu Dilihat',
				'value'=>Helper::getCreatedTime($surat->waktu_dilihat)
			),
			array(
				'label'=>'Waktu Input',
				'value'=>Helper::getCreatedTime($surat->waktu_dibuat)
			)
		),
)); ?>

<div>&nbsp;</div>

<?php if(!User::isAdmin()) { ?>
<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Disposisi',
		'icon'=>'share-alt',
		'url'=>array('disposisi/create','id_surat'=>$surat->id),
		'htmlOptions'=>array('style'=>'width:100%')
)); ?>

<div>&nbsp;</div>
<?php } ?>

<?php $this->widget('booster.widgets.TbTabs',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array(
                'label' => 'Lampiran',
                'content' => $this->renderPartial('//surat/_lampiran',array('model'=>$surat),true),
                'active' => true
            ),
            array(
                'label' => 'Riwayat Disposisi',
                'content' => $this->renderPartial('//surat/_riwayat_disposisi',array('model'=>$surat),true),
            ),
        ),
    )
); ?>

<div>&nbsp;</div>