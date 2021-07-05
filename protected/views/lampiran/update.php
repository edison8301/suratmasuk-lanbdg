<?php
$this->breadcrumbs=array(
	'Lampirans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Lampiran','url'=>array('index')),
	array('label'=>'Create Lampiran','url'=>array('create')),
	array('label'=>'View Lampiran','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Lampiran','url'=>array('admin')),
	);
	?>

	<h1>Update Lampiran <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>