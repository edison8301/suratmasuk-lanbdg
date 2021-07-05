<?php
$this->breadcrumbs=array(
	'Surats',
);

$this->menu=array(
array('label'=>'Create Surat','url'=>array('create')),
array('label'=>'Manage Surat','url'=>array('admin')),
);
?>

<h1>Surats</h1>

<?php $this->widget('booster.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
)); ?>
