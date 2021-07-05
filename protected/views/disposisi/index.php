<?php
$this->breadcrumbs=array(
	'Disposisis',
);

$this->menu=array(
array('label'=>'Create Disposisi','url'=>array('create')),
array('label'=>'Manage Disposisi','url'=>array('admin')),
);
?>

<h1>Disposisis</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
