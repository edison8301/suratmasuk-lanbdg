<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List User','url'=>array('index')),
array('label'=>'Create User','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('user-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Kelola User</h1>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Tambah User',
		'icon'=>'plus',
		'url'=>array('create')
)); ?>


<?php $this->widget('booster.widgets.TbGridView',array(
		'id'=>'user-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'type'=>'striped bordered',
		'columns'=>array(
			'username',
			'role',
			array(
				'class'=>'booster.widgets.TbButtonColumn',
			),
		),
)); ?>
