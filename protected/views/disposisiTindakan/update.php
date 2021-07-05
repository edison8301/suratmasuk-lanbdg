<?php
$this->breadcrumbs=array(
	'Disposisi Tindakans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DisposisiTindakan','url'=>array('index')),
	array('label'=>'Create DisposisiTindakan','url'=>array('create')),
	array('label'=>'View DisposisiTindakan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DisposisiTindakan','url'=>array('admin')),
	);
	?>

	<h1>Update DisposisiTindakan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>