<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<?php $this->beginWidget('booster.widgets.TbPanel',array(
        'title' => 'Login Aplikasi Surat Masuk',
        'headerIcon' => 'lock',
		'context'=>'primary',
    	'padContent' => false,
        'htmlOptions' => array('class' => 'bootstrap-widget-table','style'=>'margin-bottom:0px;height:290px;')
));?>

<div id="site-login" style="margin:0px;">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'htmlOptions'=>array('class'=>'well'),
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
)); ?>
			
		<?php echo $form->textFieldGroup($model,'username'); ?>

		<?php echo $form->passwordFieldGroup($model,'password'); ?>
		
		<div class="rememberMe">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
		
		<div class="rememberMe">
			<?php print CHtml::link('Lupa Password ?', array('site/lupapassword')) ?>
		</div>
		<div>&nbsp;</div>
		<div class="buttons">
			<?php $this->widget('booster.widgets.TbButton', array(
					'buttonType'=>'submit',
					'context'=>'primary',
					'label'=>'Login',
					'icon'=>'lock white',
			)); ?>
		</div>

<?php $this->endWidget(); ?>

</div>

<?php $this->endWidget(); ?>