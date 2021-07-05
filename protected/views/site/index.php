<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Selamat Datang di Aplikasi Surat Masuk</h1>

<?php $this->widget('booster.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_item-surat',
		'ajaxUpdate'=>false
)); ?>