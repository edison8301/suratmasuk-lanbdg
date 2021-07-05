<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_agenda')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_agenda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asal_surat')); ?>:</b>
	<?php echo CHtml::encode($data->asal_surat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_surat')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_surat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_surat')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_surat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perihal')); ?>:</b>
	<?php echo CHtml::encode($data->perihal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ringkasan')); ?>:</b>
	<?php echo CHtml::encode($data->ringkasan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('catatan')); ?>:</b>
	<?php echo CHtml::encode($data->catatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pengolah')); ?>:</b>
	<?php echo CHtml::encode($data->pengolah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_dilihat')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_dilihat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_dibuat')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_dibuat); ?>
	<br />

	*/ ?>

</div>