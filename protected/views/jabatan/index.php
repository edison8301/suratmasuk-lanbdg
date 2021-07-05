<?php
$this->breadcrumbs=array(
	'Jabatans',
);

$this->menu=array(
array('label'=>'Create Jabatan','url'=>array('create')),
array('label'=>'Manage Jabatan','url'=>array('admin')),
);
?>

<h1>Kelola Jabatan</h1>

<?php $this->widget('booster.widgets.TbButton',array(
		'buttonType'=>'link',
		'context'=>'primary',
		'label'=>'Sinkronisasi Jabatan',
		'icon'=>'sort',
		'url'=>'#'
)); ?>

<div>&nbsp;</div>

<table class="table table-hover">
<tr>
	<th width="5%">No</th>
	<th width="55%">Jabatan</th>
	<th width="40%">Pemangku</th>
</tr>
<tr>
	<td colspan="3">Struktural</td>
</tr>
<?php $i=1; foreach(Jabatan::model()->findAllByAttributes(array('id_atasan'=>1,'id_jabatan_jenis'=>1)) as $jabatan) { ?>
<tr>
	<td><?php print $i; ?></td>
	<td><?php print $jabatan->nama_jabatan; ?></td>
	<td><?php print Pegawai::getNamaByIdJabatan($jabatan->id); ?></td>
</tr>
<?php foreach($jabatan->findAllSubjabatan() as $subjabatan) { ?>
<tr>
	<td>&nbsp;</td>
	<td style="padding-left:40px"><?php print $subjabatan->nama_jabatan; ?></td>
	<td><?php print Pegawai::getNamaByIdJabatan($subjabatan->id); ?></td>
</tr>
<?php } ?>
<?php $i++; } ?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3">Fungsional</td>
</tr>
<?php $i=1; foreach(Jabatan::model()->findAllByAttributes(array('id_jabatan_jenis'=>2)) as $jabatan) { ?>
<tr>
	<td><?php print $i; ?></td>
	<td><?php print $jabatan->nama_jabatan; ?></td>
	<td>
		<?php foreach(Pegawai::model()->findAllByAttributes(array('id_jabatan'=>$jabatan->id)) as $pegawai) { print $pegawai->nama."<br>"; } ?>
	</td>
</tr>
<?php $i++; } ?>
</table>

<div>&nbsp;</div>
