<?php
$this->breadcrumbs=array(
	'Disposisi Sifats',
);

$this->menu=array(
array('label'=>'Create DisposisiSifat','url'=>array('create')),
array('label'=>'Manage DisposisiSifat','url'=>array('admin')),
);
?>

<h1>Disposisi Sifats</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
