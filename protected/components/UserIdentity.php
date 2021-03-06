<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$pegawai = Pegawai::model()->findByAttributes(array('username'=>$this->username));
		$user=User::model()->findByAttributes(array('username'=>$this->username));
		
		if($user !== null) {	
			if($this->password == $user->password)
			{
				$this->errorCode=self::ERROR_NONE;
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}	
		}
		if($pegawai !== null) {
			if(CPasswordHelper::verifyPassword($this->password,$pegawai->password)) {
				//$this->setState('nip',$model->nip);
				//Yii::app()->session['id']=$model->id;
				$this->errorCode=self::ERROR_NONE;
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		}
		return !$this->errorCode;
	}
}