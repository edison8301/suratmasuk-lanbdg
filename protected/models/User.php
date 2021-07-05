<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $role
 * @property string $nama
 * @property integer $id_jabatan
 * @property string $nama_jabatan
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('id_jabatan', 'numerical', 'integerOnly'=>true),
			array('username, password, authKey, role, nama, nama_jabatan', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, authKey, role, nama, id_jabatan, nama_jabatan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'authKey' => 'Auth Key',
			'role' => 'Role',
			'nama' => 'Nama',
			'id_jabatan' => 'Id Jabatan',
			'nama_jabatan' => 'Nama Jabatan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('authKey',$this->authKey,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_jabatan',$this->id_jabatan);
		$criteria->compare('nama_jabatan',$this->nama_jabatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function isAdmin()
	{
		if(User::model()->countByAttributes(array('username'=>Yii::app()->user->id))>0)
			return true;
		else
			return false;
	}

	public static function isKepalaPusat()
	{
		if(Pegawai::model()->countByAttributes(array('username'=>Yii::app()->user->id,'id_jabatan'=>1))>0)
			return true;
		else
			return false;
	}
}
