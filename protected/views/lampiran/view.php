<?php
$this->breadcrumbs=array(
	'Lampirans'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Lampiran','url'=>array('index')),
array('label'=>'Create Lampiran','url'=>array('create')),
array('label'=>'Update Lampiran','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Lampiran','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Lampiran','url'=>array('admin')),
);
?>

<h1>View Lampiran #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_surat',
		'judul',
		'file',
),
)); ?>
