<?php
$this->breadcrumbs=array(
	'Surats'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Surat','url'=>array('index')),
array('label'=>'Create Surat','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('surat-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Kelola Surat</h1>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Tambah Surat',
		'icon'=>'plus',
		'url'=>array('create'),
		'visible'=>User::isAdmin()
)); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
		'id'=>'surat-grid',
		'type'=>'striped bordered',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'nomor_agenda',
			'asal_surat',
			'tanggal_surat',
			'nomor_surat',
			'perihal',
			'waktu_dibuat',
			array(
				'class'=>'booster.widgets.TbButtonColumn',
				'visible'=>User::isAdmin()
			),
			array(
				'class'=>'booster.widgets.TbButtonColumn',
				'template'=>'{view}',
				'visible'=>!User::isAdmin()
			)
		),
)); ?>
