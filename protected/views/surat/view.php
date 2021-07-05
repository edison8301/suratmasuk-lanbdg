<?php
$this->breadcrumbs=array(
	'Surats'=>array('index'),
	$model->id,
);

?>

<h1>Detail Surat</h1>

<?php if(User::isAdmin()) { ?>
<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Sunting',
		'icon'=>'pencil',
		'url'=>array('update','id'=>$model->id)
)); ?>&nbsp;
<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Tambah',
		'icon'=>'plus',
		'url'=>array('create')
)); ?>&nbsp;
<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Kelola',
		'icon'=>'th-list',
		'url'=>array('admin')
)); ?>&nbsp;
<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'danger',
		'label'=>'Delete',
		'icon'=>'trash',
		'url'=>array('create')
)); ?>

<div>&nbsp;</div>

<?php } ?>


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
			array(
				'label'=>'Pengolah',
				'value'=>Pegawai::getNamaByUsername($model->pengolah)
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

<div>&nbsp;</div>

<?php if(!User::isAdmin()) { ?>
<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Disposisi',
		'icon'=>'share-alt',
		'url'=>array('disposisi/create','id_surat'=>$model->id),
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
                'content' => $this->renderPartial('_lampiran',array('model'=>$model),true),
                'active' => true
            ),
            array(
                'label' => 'Riwayat Disposisi',
                'content' => $this->renderPartial('_riwayat_disposisi',array('model'=>$model),true),
            ),
        ),
    )
); ?>

</div>&nbsp;</div>