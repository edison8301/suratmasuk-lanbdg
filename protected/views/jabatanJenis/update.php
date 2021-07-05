<?php
$this->breadcrumbs=array(
	'Jabatan Jenises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JabatanJenis','url'=>array('index')),
	array('label'=>'Create JabatanJenis','url'=>array('create')),
	array('label'=>'View JabatanJenis','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage JabatanJenis','url'=>array('admin')),
	);
	?>

	<h1>Update JabatanJenis <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>