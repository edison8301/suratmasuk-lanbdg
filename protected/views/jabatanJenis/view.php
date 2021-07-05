<?php
$this->breadcrumbs=array(
	'Jabatan Jenises'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List JabatanJenis','url'=>array('index')),
array('label'=>'Create JabatanJenis','url'=>array('create')),
array('label'=>'Update JabatanJenis','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete JabatanJenis','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JabatanJenis','url'=>array('admin')),
);
?>

<h1>View JabatanJenis #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nama',
),
)); ?>
