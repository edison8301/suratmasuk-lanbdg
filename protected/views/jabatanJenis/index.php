<?php
$this->breadcrumbs=array(
	'Jabatan Jenises',
);

$this->menu=array(
array('label'=>'Create JabatanJenis','url'=>array('create')),
array('label'=>'Manage JabatanJenis','url'=>array('admin')),
);
?>

<h1>Jabatan Jenises</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
