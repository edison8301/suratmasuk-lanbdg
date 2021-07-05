<?php
$this->breadcrumbs=array(
	'Disposisi Sifats'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DisposisiSifat','url'=>array('index')),
array('label'=>'Create DisposisiSifat','url'=>array('create')),
array('label'=>'Update DisposisiSifat','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete DisposisiSifat','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DisposisiSifat','url'=>array('admin')),
);
?>

<h1>View DisposisiSifat #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nama',
),
)); ?>
