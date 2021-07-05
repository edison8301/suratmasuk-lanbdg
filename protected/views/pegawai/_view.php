<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip')); ?>:</b>
	<?php echo CHtml::encode($data->nip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_golongan')); ?>:</b>
	<?php echo CHtml::encode($data->id_golongan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmt_golongan')); ?>:</b>
	<?php echo CHtml::encode($data->tmt_golongan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mkg_diangkat')); ?>:</b>
	<?php echo CHtml::encode($data->mkg_diangkat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mkg_diangkat_bulan')); ?>:</b>
	<?php echo CHtml::encode($data->mkg_diangkat_bulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mkg_diangkat_hari')); ?>:</b>
	<?php echo CHtml::encode($data->mkg_diangkat_hari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ruang')); ?>:</b>
	<?php echo CHtml::encode($data->id_ruang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pangkat')); ?>:</b>
	<?php echo CHtml::encode($data->id_pangkat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->id_jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmt_pangkat')); ?>:</b>
	<?php echo CHtml::encode($data->tmt_pangkat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->id_jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unit_kerja')); ?>:</b>
	<?php echo CHtml::encode($data->id_unit_kerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmt_jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->tmt_jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_agama')); ?>:</b>
	<?php echo CHtml::encode($data->id_agama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmt_cpns')); ?>:</b>
	<?php echo CHtml::encode($data->tmt_cpns); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmt_pns')); ?>:</b>
	<?php echo CHtml::encode($data->tmt_pns); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('masa_kerja')); ?>:</b>
	<?php echo CHtml::encode($data->masa_kerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->id_pendidikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jurusan')); ?>:</b>
	<?php echo CHtml::encode($data->jurusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_rumah')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_rumah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telepon_rumah')); ?>:</b>
	<?php echo CHtml::encode($data->telepon_rumah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hp')); ?>:</b>
	<?php echo CHtml::encode($data->hp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('token')); ?>:</b>
	<?php echo CHtml::encode($data->token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_status')); ?>:</b>
	<?php echo CHtml::encode($data->id_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_anak')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_anak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pasangan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pasangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir_pasangan')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir_pasangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_pasangan')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_pasangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ket_pasangan')); ?>:</b>
	<?php echo CHtml::encode($data->ket_pasangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_nikah')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_nikah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_ktp')); ?>:</b>
	<?php echo CHtml::encode($data->no_ktp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_npwp')); ?>:</b>
	<?php echo CHtml::encode($data->no_npwp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_rek_bank_bjb')); ?>:</b>
	<?php echo CHtml::encode($data->no_rek_bank_bjb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source')); ?>:</b>
	<?php echo CHtml::encode($data->source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_no')); ?>:</b>
	<?php echo CHtml::encode($data->work_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_status_kepegawaian')); ?>:</b>
	<?php echo CHtml::encode($data->id_status_kepegawaian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->login_terakhir); ?>
	<br />

	*/ ?>

</div>