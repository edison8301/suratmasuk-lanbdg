<?php
$this->breadcrumbs=array(
	'Disposisis'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Disposisi','url'=>array('index')),
array('label'=>'Manage Disposisi','url'=>array('admin')),
);
?>

<h1>Disposisi Surat</h1>

<?php echo $this->renderPartial('_create', array('model'=>$model)); ?>