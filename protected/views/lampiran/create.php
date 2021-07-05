<?php
$this->breadcrumbs=array(
	'Lampirans'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Lampiran','url'=>array('index')),
array('label'=>'Manage Lampiran','url'=>array('admin')),
);
?>

<h1>Create Lampiran</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>