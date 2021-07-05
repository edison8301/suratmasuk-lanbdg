<?php
$this->breadcrumbs=array(
	'Surats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Surat','url'=>array('index')),
	array('label'=>'Create Surat','url'=>array('create')),
	array('label'=>'View Surat','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Surat','url'=>array('admin')),
	);
	?>

<h1>Sunting Surat</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>