<?php
$this->breadcrumbs=array(
	'Disposisi Sifats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DisposisiSifat','url'=>array('index')),
	array('label'=>'Create DisposisiSifat','url'=>array('create')),
	array('label'=>'View DisposisiSifat','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DisposisiSifat','url'=>array('admin')),
	);
	?>

	<h1>Update DisposisiSifat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>