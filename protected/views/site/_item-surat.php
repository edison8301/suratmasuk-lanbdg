<?php $surat_class = null; if($data->waktu_dilihat == null) $surat_class = 'alert-success'; ?>

<div class="item">
	<ul class="media-list">
		<li class="media <?= $surat_class; ?>">
			<a class="pull-left" href="#">
				<img class="media-object" alt="" src="<?php print Yii::app()->baseUrl; ?>/images/envelope.png">
			</a>
			<div class="media-body">
				<h4 class="media-heading">
					<?php print CHtml::link($data->asal_surat,array('surat/view','id'=>$data->id)); ?>
				</h4>
				<span style="font-weight:bold">Perihal: </span><?php print $data->perihal; ?><br>
				<span style="font-weight:bold">Waktu Input: </span><?php print Helper::getCreatedTime($data->waktu_dibuat); ?>
				<?php foreach($data->findAllDisposisi() as $disposisi) { ?>
				<?php
					$disposisi_class = null;
					if($disposisi->waktu_dilihat == null)
					{
						if(trim($disposisi->dari)==trim(Yii::app()->user->id) OR User::isAdmin())
							$disposisi_class = "alert-danger";

						if(trim($disposisi->ke)==trim(Yii::app()->user->id))
							$disposisi_class = "alert-success";
					}
				?>
				<div class="media <?php print  $disposisi_class; ?>">
					<a class="pull-left" href="#">
						<img class="media-object" alt="" src="<?php print Yii::app()->baseUrl; ?>/images/share.png">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?php print $this->createUrl('disposisi/view',array('id'=>$disposisi->id)); ?>">
									<?php print $disposisi->getAsalDisposisi(); ?><br>
									<i class="glyphicon glyphicon-arrow-right"></i> <?php print $disposisi->getTujuanDisposisi(); ?> 
							</a>
						</h4>
						<span style="font-weight:bold">Sifat: </span><?php print $disposisi->getRelationField('disposisi_sifat','nama'); ?><br>
						<span style="font-weight:bold">Tindakan: </span><?php print $disposisi->getTindakan(); ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</li>
	</ul>
</div>