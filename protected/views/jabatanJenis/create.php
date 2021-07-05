<?php
$this->breadcrumbs=array(
	'Jabatan Jenises'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JabatanJenis','url'=>array('index')),
array('label'=>'Manage JabatanJenis','url'=>array('admin')),
);
?>

<h1>Create JabatanJenis</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>