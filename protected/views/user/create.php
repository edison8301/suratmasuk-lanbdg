<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List User','url'=>array('index')),
array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>Tambah User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>