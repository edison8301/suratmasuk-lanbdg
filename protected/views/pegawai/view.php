<?php
$this->breadcrumbs=array(
	'Pegawais'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Pegawai','url'=>array('index')),
array('label'=>'Create Pegawai','url'=>array('create')),
array('label'=>'Update Pegawai','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Pegawai','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Pegawai','url'=>array('admin')),
);
?>

<h1>View Pegawai #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nama',
		'nip',
		'username',
		'password',
		'id_golongan',
		'tmt_golongan',
		'mkg_diangkat',
		'mkg_diangkat_bulan',
		'mkg_diangkat_hari',
		'id_ruang',
		'id_pangkat',
		'id_jenis_kelamin',
		'tmt_pangkat',
		'jabatan',
		'id_jabatan',
		'id_unit_kerja',
		'tempat_lahir',
		'tmt_jabatan',
		'tanggal_lahir',
		'id_agama',
		'tmt_cpns',
		'tmt_pns',
		'masa_kerja',
		'id_pendidikan',
		'jurusan',
		'alamat_rumah',
		'telepon_rumah',
		'hp',
		'email',
		'token',
		'id_status',
		'jumlah_anak',
		'nama_pasangan',
		'tanggal_lahir_pasangan',
		'pekerjaan_pasangan',
		'ket_pasangan',
		'tanggal_nikah',
		'no_ktp',
		'no_npwp',
		'no_rek_bank_bjb',
		'source',
		'foto',
		'work_no',
		'id_status_kepegawaian',
		'login_terakhir',
),
)); ?>
