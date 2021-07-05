<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_surat')); ?>:</b>
	<?php echo CHtml::encode($data->id_surat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_agenda')); ?>:</b>
	<?php echo CHtml::encode($data->no_agenda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perihal')); ?>:</b>
	<?php echo CHtml::encode($data->perihal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_disposisi_asal')); ?>:</b>
	<?php echo CHtml::encode($data->id_disposisi_asal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_disposisi_tujuan')); ?>:</b>
	<?php echo CHtml::encode($data->id_disposisi_tujuan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_disposisi_sifat')); ?>:</b>
	<?php echo CHtml::encode($data->id_disposisi_sifat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_disposisi_tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->id_disposisi_tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catatan')); ?>:</b>
	<?php echo CHtml::encode($data->catatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dari')); ?>:</b>
	<?php echo CHtml::encode($data->dari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ke')); ?>:</b>
	<?php echo CHtml::encode($data->ke); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_dilihat')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_dilihat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_dibuat')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_dibuat); ?>
	<br />

	*/ ?>

</div>