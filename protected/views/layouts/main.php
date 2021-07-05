<?php /* @var $this Controller */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="language" content="en" />



	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />
	<link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/images/logo-lan.png" type="image/gif" sizes="16x22">

	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>



<body>

<?php
	if(Yii::app()->request->hostInfo!='http://suratmasuk.bandung.lan.go.id') {
		$appUrl = 'http://192.185.144.108/~bandungl/index.php?r=application/index';
		$logoutUrl = 'http://192.185.144.108/~bandungl/index.php?r=site/logout';	
	} else {
		$appUrl = 'http://bandung.lan.go.id/index.php?r=application/index';
        $logoutUrl = 'http://bandung.lan.go.id/index.php?r=site/logout';
	}

    $logoutUrl = ['/site/logout'];

?>

<?php $this->widget('booster.widgets.TbNavbar',array(
			'brand' => '',
			'fixed' => false,
			'fluid' => true,
			'items' => array(
				array(
					'class' => 'booster.widgets.TbMenu',
					'type' => 'navbar',
					'items' => array(
						//array('label' => 'Aplikasi','icon'=>'th-list', 'url' => $appUrl),
						array('label' => 'Tutorial','icon'=>'book', 'url' => 'https://www.youtube.com/watch?v=8r_3M3X2w7s','linkOptions'=>array('target'=>'_blank')),
						array('label' => 'Logout ('.Yii::app()->user->id.')','icon'=>'off','url'=>$logoutUrl,'visible'=>!Yii::app()->user->isGuest)
					)
				)
			)
)); ?>

	

<div class="containers" id="page" style="display:block">



		<?php echo $content; ?>





	



</div><!-- page -->
<div id="footer" style="margin-top:30px;text-align:center;padding:10px;margin-top:20px">

		<?php /*Copyright &copy; <?php print date('Y'); ?> PKP2A I LAN */ ?>

	</div><!-- footer -->



</body>

</html>

