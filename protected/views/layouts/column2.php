<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>



<div class="row-fluid">

	<div class="col-xs-2">

	<?php $this->widget('booster.widgets.TbMenu',array(

			'type'=>'inverse',

			'stacked'=>true,

			'items' => array(

				array('label'=>'Home','url'=>array('site/index'),'icon'=>'home'),

				array('label'=>'Surat', 'url'=>array('/surat/admin'),'icon'=>'envelope'),

				//array('label'=>'Disposisi', 'url'=>array('/disposisi/admin'),'icon'=>'signal','visible'=>User::isAdmin()),

				array('label'=>'Laporan', 'url'=>array('/surat/report'),'icon'=>'th-list','visible'=>User::isAdmin()),

				array('label'=>'User', 'url'=>array('/user/admin'),'icon'=>'user','visible'=>User::isAdmin()),

				array('label'=>'Jabatan', 'url'=>array('/jabatan/index'),'icon'=>'asterisk','visible'=>User::isAdmin()),

				array('label'=>'Pegawai', 'url'=>array('/pegawai/admin'),'icon'=>'user','visible'=>User::isAdmin()),
				
				array('label'=>'Log', 'url'=>array('/log/admin'),'icon'=>'list','visible'=>User::isAdmin()),

				array('label'=>'Setting', 'url'=>array('/historiGaji/index'),'icon'=>'wrench','items'=>array(

					array('label'=>'Sifat','url'=>array('disposisiSifat/admin')),

					array('label'=>'Tindakan','url'=>array('disposisiTindakan/admin')),

				),'visible'=>User::isAdmin()),

				array('label'=>'Logout ('.Yii::app()->user->id.')','url'=>'http://bandung.lan.go.id/index.php?r=site/logout','icon'=>'off','visible'=>!Yii::app()->user->isGuest),

			)

	)); ?>

	</div>



	<div class="col-xs-10">

		<div class="row">

			<div class="col-xs-12">

				<?php foreach(Yii::app()->user->getFlashes() as $key => $message) { ?>

					<div class="alert alert-<?php print $key; ?>"><?php print $message; ?></div>

				<?php } ?>

				<?php Yii::app()->clientScript->registerScript('hideAlert',

						'$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");',

						CClientScript::POS_READY

				); ?>

			</div>

		</div>

		<div class="row">

			<div class="col-xs-12">

				<?php echo $content; ?>

			</div>

		</div>

	</div><!-- content -->

</div>



<?php $this->endContent(); ?>