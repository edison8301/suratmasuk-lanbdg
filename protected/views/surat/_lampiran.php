<?php

$baseUrlLokal = Yii::app()->request->baseUrl;
$baseUrlRemote = "http://suratmasuk.bandung.lan.go.id/v2";
$basePath = Yii::app()->basePath.'/../uploads/surat/';

?>

<?php if($model->lampiran_1 != null) { ?>

<h2>Lampiran 1</h2>

<?php if(substr($model->lampiran_1,-3)=='pdf' OR substr($model->lampiran_1,-3)=='PDF') {

    $baseUrlEfektif = $baseUrlRemote;
    if(file_exists($basePath.$model->lampiran_1)) {
        $baseUrlEfektif = $baseUrlLokal;
    }

	print '<iframe frameborder="0" width="100%" height="500px" src='.$baseUrlEfektif.'/uploads/surat/'.$model->lampiran_1.'></iframe>';

} else {

    $baseUrlEfektif = $baseUrlRemote;
    if(file_exists($basePath.$model->lampiran_1)) {
        $baseUrlEfektif = $baseUrlLokal;
    }

	print CHtml::image($baseUrlEfektif."/uploads/surat/".$model->lampiran_1,'',array('class'=>'img-responsive'));
} ?>

<div style="margin-top:5px">
	<?php print CHtml::link('<i class="glyphicon glyphicon-trash"></i> Hapus Lampiran 1',array('surat/hapusLampiran','id'=>$model->id,'lampiran'=>1),array('onclick'=>'return confirm("Yakin akan menghapus lampiran 1?")')); ?>
</div>

<div>&nbsp;</div>

<?php } ?>

<?php if($model->lampiran_2 != null) { ?>

<h2>Lampiran 2</h2>

<?php if(substr($model->lampiran_2,-3)=='pdf' OR substr($model->lampiran_2,-3)=='PDF') {

    $baseUrlEfektif = $baseUrlRemote;
    if(file_exists($basePath.$model->lampiran_2)) {
        $baseUrlEfektif = $baseUrlLokal;
    }

	print '<iframe frameborder="0" width="100%" height="600px" src='.$baseUrlEfektif.'/uploads/surat/'.$model->lampiran_2.'></iframe>';

} else {

    $baseUrlEfektif = $baseUrlRemote;
    if(file_exists($basePath.$model->lampiran_2)) {
        $baseUrlEfektif = $baseUrlLokal;
    }

	print CHtml::image($baseUrlEfektif."/uploads/surat/".$model->lampiran_2,'',array('class'=>'img-responsive'));
} ?>

<div style="margin-top:5px">
	<?php print CHtml::link('<i class="glyphicon glyphicon-trash"></i> Hapus Lampiran 2',array('surat/hapusLampiran','id'=>$model->id,'lampiran'=>2),array('onclick'=>'return confirm("Yakin akan menghapus lampiran 2?")')); ?>
</div>
<div>&nbsp;</div>

<?php } ?>

<?php if($model->lampiran_3 != null) { ?>

<h2>Lampiran 3</h2>

<?php if(substr($model->lampiran_3,-3)=='pdf') {

    $baseUrlEfektif = $baseUrlRemote;
    if(file_exists($basePath.$model->lampiran_3)) {
        $baseUrlEfektif = $baseUrlLokal;
    }

	print '<iframe frameborder="0" width="100%" height="500px" src='.$baseUrlEfektif.'/uploads/surat/'.$model->lampiran_3.'></iframe>';

} else {

    $baseUrlEfektif = $baseUrlRemote;
    if(file_exists($basePath.$model->lampiran_3)) {
        $baseUrlEfektif = $baseUrlLokal;
    }

	print  CHtml::image($baseUrlEfektif."/uploads/surat/".$model->lampiran_3,'',array('class'=>'img-responsive'));
} ?>

<div style="margin-top:5px">
	<?php print CHtml::link('<i class="glyphicon glyphicon-trash"></i> Hapus Lampiran 3',array('surat/hapusLampiran','id'=>$model->id,'lampiran'=>3),array('onclick'=>'return confirm("Yakin akan menghapus lampiran 3?")')); ?>
</div>
<div>&nbsp;</div>

<?php } ?>

