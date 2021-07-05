<?php
$this->breadcrumbs=array(
	'Disposisi Tindakans'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DisposisiTindakan','url'=>array('index')),
array('label'=>'Create DisposisiTindakan','url'=>array('create')),
array('label'=>'Update DisposisiTindakan','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DisposisiTindakan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DisposisiTindakan','url'=>array('admin')),
);
?>

<h1>View DisposisiTindakan #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nama',
),
)); ?>
