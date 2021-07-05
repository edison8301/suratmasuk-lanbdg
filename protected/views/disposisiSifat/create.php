<?php
$this->breadcrumbs=array(
	'Disposisi Sifats'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DisposisiSifat','url'=>array('index')),
array('label'=>'Manage DisposisiSifat','url'=>array('admin')),
);
?>

<h1>Create DisposisiSifat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>