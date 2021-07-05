<?php

/**
 * This is the model class for table "jabatan".
 *
 * The followings are the available columns in table 'jabatan':
 * @property integer $id
 * @property integer $id_atasan
 * @property string $nama_jabatan
 * @property string $pemangku
 * @property string $nama_pemangku
 * @property integer $id_jabatan_jenis
 */
class Jabatan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jabatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_atasan, id_jabatan_jenis', 'numerical', 'integerOnly'=>true),
			array('nama_jabatan, pemangku, nama_pemangku', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_atasan, nama_jabatan, pemangku, nama_pemangku, id_jabatan_jenis', 'safe', 'on'=>'search'),
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
			'id_atasan' => 'Id Atasan',
			'nama_jabatan' => 'Nama Jabatan',
			'pemangku' => 'Pemangku',
			'nama_pemangku' => 'Nama Pemangku',
			'id_jabatan_jenis' => 'Id Jabatan Jenis',
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
		$criteria->compare('id_atasan',$this->id_atasan);
		$criteria->compare('nama_jabatan',$this->nama_jabatan,true);
		$criteria->compare('pemangku',$this->pemangku,true);
		$criteria->compare('nama_pemangku',$this->nama_pemangku,true);
		$criteria->compare('id_jabatan_jenis',$this->id_jabatan_jenis);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jabatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findAllSubjabatan()
	{
		$model = Jabatan::model()->findAllByAttributes(array('id_atasan'=>$this->id));
		if($model!==null)
			return $model;
		else
			return false;

	}

	public static function getNamaJabatanById($id)
	{
		$model = Jabatan::model()->findByPk($id);
		if(!empty($model->nama_jabatan))
			return $model->nama_jabatan;
		else
			return null;
	}
}
