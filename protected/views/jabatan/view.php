<?php
$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Jabatan','url'=>array('index')),
array('label'=>'Create Jabatan','url'=>array('create')),
array('label'=>'Update Jabatan','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Jabatan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Jabatan','url'=>array('admin')),
);
?>

<h1>View Jabatan #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_atasan',
		'nama_jabatan',
		'pemangku',
		'nama_pemangku',
		'id_jabatan_jenis',
),
)); ?>
