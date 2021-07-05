<?php
$this->breadcrumbs=array(
	'Lampirans',
);

$this->menu=array(
array('label'=>'Create Lampiran','url'=>array('create')),
array('label'=>'Manage Lampiran','url'=>array('admin')),
);
?>

<h1>Lampirans</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
