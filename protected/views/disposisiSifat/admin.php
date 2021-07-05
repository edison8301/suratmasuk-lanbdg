<?php
$this->breadcrumbs=array(
	'Disposisi Sifats'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List DisposisiSifat','url'=>array('index')),
array('label'=>'Create DisposisiSifat','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('disposisi-sifat-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Kelola Sifat Disposisi</h1>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'success',
		'label'=>'Tambah Surat',
		'icon'=>'plus',
		'url'=>array('create')
)); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
		'id'=>'disposisi-sifat-grid',
		'dataProvider'=>$model->search(),
		'type'=>'striped bordered',
		'filter'=>$model,
		'columns'=>array(
			'nama',
			array(
				'class'=>'booster.widgets.TbButtonColumn',
			),
		),
)); ?>
