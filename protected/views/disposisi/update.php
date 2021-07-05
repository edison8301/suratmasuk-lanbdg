<?php
$this->breadcrumbs=array(
	'Disposisis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Sunting Disposisi</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>