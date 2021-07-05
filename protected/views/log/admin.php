<?php
$this->breadcrumbs=array(
	'Logs'=>array('index'),
	'Manage',
);

?>

<h1>Kelola Log</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
		'id'=>'log-grid',
		'type'=>'striped bordered condensed',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'username',
			'ip',
			'controller',
			'action',
			'uri',
			'waktu',
			array('class'=>'booster.widgets.TbButtonColumn')
		),
)); ?>
