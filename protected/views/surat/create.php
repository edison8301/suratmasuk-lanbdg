<?php
$this->breadcrumbs=array(
	'Surats'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Surat','url'=>array('index')),
array('label'=>'Manage Surat','url'=>array('admin')),
);
?>

<h1>Tambah Surat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>