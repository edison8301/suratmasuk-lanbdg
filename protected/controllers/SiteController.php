<?php

class SiteController extends CController
{
    
    public $breadcrumbs=array();
    
    public $layout='//layouts/column2';
    
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		/*
		if(isset($_COOKIE['login']) AND $_COOKIE['login']==1)
		{
			$username = $_COOKIE['username'];
			$userIdentity = new UserIdentity($username,'bandunglan');		
			Yii::app()->user->login($userIdentity,3600*24*30);		
		}
		*/

		if(isset($_GET['user']) AND isset($_GET['token']))
		{
			date_default_timezone_set('Asia/Jakarta');
			$waktu = date('YmdH');
			$user = $_GET['user'];
			$token = $_GET['token'];

			//$crypt = crypt($waktu.$user.$waktu,'$2a$09$adfserw34534gdfsdfwer4');
			$crypt = crypt($waktu.$user.$waktu,$token);

			if($crypt==$token)
			{
				$userIdentity = new UserIdentity($user,'bandunglan');		
				Yii::app()->user->login($userIdentity,3600*24*30);	
			}
		}

		if(Yii::app()->user->isGuest)
		{
			if(Yii::app()->request->hostInfo!='http://suratmasuk.bandung.lan.go.id') {
				//$this->redirect('http://192.185.144.108/~bandungl/index.php?p=login-failed');	
				$this->redirect('http://bandung.lan.go.id/index.php?p=login-failed');
			} else {
				$this->redirect('http://bandung.lan.go.id/index.php?p=login-failed');
			}
		}

		$criteria = new CDbCriteria;
		$criteria->order = 'waktu_dibuat DESC';
		
		if(!User::isAdmin() AND !User::isKepalaPusat())
		{
			$criteria->condition = 'id IN (SELECT id_surat FROM disposisi WHERE ke = :ke)';
			$criteria->params = array(':ke'=>Yii::app()->user->id);
		}

		$dataProvider=new CActiveDataProvider('Surat',array(
			'criteria'=>$criteria
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '//layouts/login';

		$model=new LoginForm;

		
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			
			if($model->validate() && $model->login())
			{
				$this->redirect(array('site/index'));
			}
		}
		
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('site/login'));
		//$this->redirect(Yii::app()->homeUrl);
	}

	public function actionSendMail()
	{

		$subject = 'Disposisi Surat Masuk';
	
		$message = '';
		$message .= 'Kepada Yth. <br>';
		$message .= 'di tempat <br>';
		$message .= '<br>';
		$message .= 'Dengan hormat, <br>';
		$message .= '<br>';
		$message .= 'Melalui surat elektronik ini kami informasikan bahwa Saudara/i mendapatkan disposisi surat masuk sebagai berikut: ';
		$message .= '<br>';
		$message .= 'Silahkan periksa akun surat masuk Saudara/i untuk data yang lebih detil melalui website http://bandung.lan.go.id <br>';
		$message .= '<br>';
		$message .= '<br>';
		$message .= 'Keterangan: <br>';
		$message .= 'Email ini dikirim secara otomatis oleh aplikasi Surat Masuk PKP2A I LAN.';

		$to = 'dadansatria7@gmail.com';
		$subject = 'wuri.indri@gmail.com';
		return Helper::sendMail($to,$subject,$message);


	}
	
}