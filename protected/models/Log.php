<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $id
 * @property string $username
 * @property string $ip
 * @property string $controller
 * @property string $action
 * @property string $uri
 * @property string $waktu
 */
class Log extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, ip, controller, action, uri', 'length', 'max'=>255),
			array('waktu', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, ip, controller, action, uri, waktu', 'safe', 'on'=>'search'),
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
			'ip' => 'Ip',
			'controller' => 'Controller',
			'action' => 'Action',
			'uri' => 'Uri',
			'waktu' => 'Waktu',
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
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('uri',$this->uri,true);
		$criteria->compare('waktu',$this->waktu,true);

		$criteria->order = 'waktu DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function create()
	{
		if(!Yii::app()->user->isGuest)
		{
			$model = new Log;
			$model->username = Yii::app()->user->id;
			$model->ip = $_SERVER['REMOTE_ADDR'];
			$model->controller = Yii::app()->controller->id;
			$model->action = Yii::app()->controller->action->id;
			$model->uri = Yii::app()->request->requestUri;

			date_default_timezone_set('Asia/Jakarta');
			$model->waktu = date('Y-m-d H:i:s');
			$model->save();
		}

		return true;
	}
}
