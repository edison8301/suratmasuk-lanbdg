<?php
$this->breadcrumbs=array(
	'Disposisi Tindakans',
);

$this->menu=array(
array('label'=>'Create DisposisiTindakan','url'=>array('create')),
array('label'=>'Manage DisposisiTindakan','url'=>array('admin')),
);
?>

<h1>Disposisi Tindakans</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
