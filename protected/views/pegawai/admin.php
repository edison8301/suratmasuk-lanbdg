<?php
$this->breadcrumbs=array(
	'Pegawais'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Pegawai','url'=>array('index')),
array('label'=>'Create Pegawai','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('pegawai-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Kelola Pegawai</h1>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Sinkronisasi Pegawai',
		'icon'=>'sort',
		'url'=>'#'
)); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
		'id'=>'pegawai-grid',
		'type'=>'striped bordered',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'nama',
			'nip',
			'username',
			'email',
			array(
				'class'=>'CDataColumn',
				'name'=>'id_jabatan',
				'header'=>'Jabatan',
				'value'=>'$data->getRelationField("jabatan","nama_jabatan")',
				'filter'=>CHtml::listData(Jabatan::model()->findAll(),'id','nama_jabatan')
			),
			array(
				'class'=>'CDataColumn',
				'name'=>'id',
				'header'=>'Set Email',
				'type'=>'raw',
				'value'=>'CHtml::link("<i class=\"glyphicon glyphicon-envelope\"></i>",array("pegawai/update","id"=>$data->id))',
				'filter'=>'',
				'htmlOptions'=>array('style'=>'text-align:center')
			)
		),
)); ?>
