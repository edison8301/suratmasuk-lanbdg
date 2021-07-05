<?php
$this->breadcrumbs=array(
	'Disposisi Tindakans'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List DisposisiTindakan','url'=>array('index')),
array('label'=>'Create DisposisiTindakan','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('disposisi-tindakan-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Kelola Tindakan Disposisi</h1>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'success',
		'label'=>'Tambah Surat',
		'icon'=>'plus',
		'url'=>array('create')
)); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
		'id'=>'disposisi-tindakan-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'type'=>'striped bordered',
		'columns'=>array(
			'nama',
			array(
				'class'=>'booster.widgets.TbButtonColumn',
			),
		),
)); ?>
