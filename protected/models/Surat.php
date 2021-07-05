<?php

/**
 * This is the model class for table "surat".
 *
 * The followings are the available columns in table 'surat':
 * @property integer $id
 * @property string $nomor_agenda
 * @property string $asal_surat
 * @property string $tanggal_surat
 * @property string $nomor_surat
 * @property string $perihal
 * @property string $ringkasan
 * @property string $catatan
 * @property string $pengolah
 * @property string $waktu_dilihat
 * @property string $waktu_dibuat
 */
class Surat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'surat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomor_agenda, asal_surat, lampiran_1, lampiran_2, lampiran_3, nomor_surat, perihal, pengolah', 'length', 'max'=>255),
			array('tanggal_surat, ringkasan, catatan, waktu_dilihat, waktu_dibuat', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nomor_agenda, asal_surat, tanggal_surat, nomor_surat, perihal, ringkasan, catatan, pengolah, waktu_dilihat, waktu_dibuat', 'safe', 'on'=>'search'),
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
			'nomor_agenda' => 'Nomor Agenda',
			'asal_surat' => 'Pengirim',
			'tanggal_surat' => 'Tanggal Surat',
			'nomor_surat' => 'Nomor Surat',
			'perihal' => 'Perihal',
			'ringkasan' => 'Ringkasan',
			'catatan' => 'Catatan',
			'pengolah' => 'Pengolah',
			'waktu_dilihat' => 'Waktu Dilihat',
			'waktu_dibuat' => 'Waktu Dibuat',
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

		if(!User::isAdmin())
		{
			$criteria->condition = 'id IN (SELECT id_surat FROM disposisi WHERE ke = :ke)';
			$criteria->params = array(':ke'=>Yii::app()->user->id);
		}

		//$criteria->compare('id',$this->id);
		$criteria->compare('nomor_agenda',$this->nomor_agenda,true);
		$criteria->compare('asal_surat',$this->asal_surat,true);
		$criteria->compare('tanggal_surat',$this->tanggal_surat,true);
		$criteria->compare('nomor_surat',$this->nomor_surat,true);
		$criteria->compare('perihal',$this->perihal,true);
		$criteria->compare('ringkasan',$this->ringkasan,true);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('pengolah',$this->pengolah,true);
		$criteria->compare('waktu_dilihat',$this->waktu_dilihat,true);
		$criteria->compare('waktu_dibuat',$this->waktu_dibuat,true);

		$criteria->order = 'waktu_dibuat DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Surat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findAllDisposisi() 
	{
		$model = Disposisi::model()->findAllByAttributes(array('id_surat'=>$this->id));
		if($model!==null)
			return $model;
		else
			return false;
	}

	public function findFirstDisposisi()
	{
		$model = Disposisi::model()->findByAttributes(array('id_surat'=>$this->id));
		if($model!==null)
			return $model;
		else
			return null;
		
	}

}
