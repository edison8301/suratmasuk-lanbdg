<h2>Riwayat Disposisi</h2>

<table class="table table-hover">
<thead>
<tr>
	<th>No</th>
	<th>Tanggal</th>
	<th>Perihal</th>
	<th>Dari - Ke</th>
	<th>Waktu Dibuat</th>
	<th>Waktu Dilihat</th>
	<th>&nbsp;</th>
</tr>
</thead>
<?php $i=1; foreach($model->findAllDisposisi() as $disposisi) { ?>
<tr>
	<td><?php print $i; ?></td>
	<td><?php print $disposisi->tanggal; ?></td>
	<td><?php print $disposisi->perihal; ?></td>
	<td>
		<?php print $disposisi->getAsalDisposisi(); ?><br>
		<i class="glyphicon glyphicon-arrow-right"></i> <?php print $disposisi->getTujuanDisposisi(); ?>
	</td>
	<td><?php print $disposisi->waktu_dibuat; ?></td>
	<td><?php print $disposisi->waktu_dilihat; ?></td>
	<td><?php print CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>',array('disposisi/view','id'=>$disposisi->id)); ?></td>
</tr>
<?php $i++; } ?>

</table>

