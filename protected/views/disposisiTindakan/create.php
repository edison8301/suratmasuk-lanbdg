<?php
$this->breadcrumbs=array(
	'Disposisi Tindakans'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DisposisiTindakan','url'=>array('index')),
array('label'=>'Manage DisposisiTindakan','url'=>array('admin')),
);
?>

<h1>Create DisposisiTindakan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>