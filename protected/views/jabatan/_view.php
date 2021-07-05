<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_atasan')); ?>:</b>
	<?php echo CHtml::encode($data->id_atasan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pemangku')); ?>:</b>
	<?php echo CHtml::encode($data->pemangku); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pemangku')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pemangku); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jabatan_jenis')); ?>:</b>
	<?php echo CHtml::encode($data->id_jabatan_jenis); ?>
	<br />


</div>