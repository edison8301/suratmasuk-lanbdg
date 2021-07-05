<?php
	$criteria = new CDbCriteria;
	$criteria->condition = 'waktu_dibuat >= :waktu_awal AND waktu_dibuat <= :waktu_akhir';
	$criteria->params = array(':waktu_awal'=>$tanggal_awal.' 00:00:00',':waktu_akhir'=>$tanggal_akhir.'23:59:59');
	$criteria->order = 'waktu_dibuat ASC';
?>
<p>Laporan Surat Masuk</p>

<table border="1px">
<tr>
	<th>Nomor Agenda</th>
	<th>Pengirim</th>
	<th>Tanggal Surat</th>
	<th>Nomor Surat</th>
	<th>Perihal</th>
	<th>Waktu Input</th>
</tr>
<?php foreach(Surat::model()->findAll($criteria) as $data) { ?>
<tr>
	<td><?php print $data->nomor_agenda; ?></td>
	<td><?php print $data->asal_surat; ?></td>
	<td><?php print $data->tanggal_surat; ?></td>
	<td><?php print $data->nomor_surat; ?></td>
	<td><?php print $data->perihal; ?></td>
	<td><?php print $data->waktu_dibuat; ?></td>
</tr>
<?php } ?>