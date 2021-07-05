<?php
$this->breadcrumbs=array(
	'Disposisis'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Disposisi','url'=>array('index')),
array('label'=>'Create Disposisi','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('disposisi-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Kelola Disposisi</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
		'id'=>'disposisi-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'type'=>'striped bordered',
		'columns'=>array(
			'tanggal',
			'no_agenda',
			'perihal',
			'id_disposisi_asal',
			'ke',
		/*
		'id_disposisi_tujuan',
		'id_disposisi_sifat',
		'id_disposisi_tindakan',
		'catatan',
		'dari',
		'ke',
		'waktu_dilihat',
		'waktu_dibuat',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
