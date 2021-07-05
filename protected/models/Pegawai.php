g<?php

/**
 * This is the model class for table "pegawai".
 *
 * The followings are the available columns in table 'pegawai':
 * @property integer $id
 * @property string $nama
 * @property string $nip
 * @property string $username
 * @property string $password
 * @property integer $id_golongan
 * @property string $tmt_golongan
 * @property integer $mkg_diangkat
 * @property integer $mkg_diangkat_bulan
 * @property integer $mkg_diangkat_hari
 * @property integer $id_ruang
 * @property integer $id_pangkat
 * @property integer $id_jenis_kelamin
 * @property string $tmt_pangkat
 * @property string $jabatan
 * @property integer $id_jabatan
 * @property integer $id_unit_kerja
 * @property string $tempat_lahir
 * @property string $tmt_jabatan
 * @property string $tanggal_lahir
 * @property integer $id_agama
 * @property string $tmt_cpns
 * @property string $tmt_pns
 * @property string $masa_kerja
 * @property integer $id_pendidikan
 * @property string $jurusan
 * @property string $alamat_rumah
 * @property string $telepon_rumah
 * @property string $hp
 * @property string $email
 * @property string $token
 * @property integer $id_status
 * @property integer $jumlah_anak
 * @property string $nama_pasangan
 * @property string $tanggal_lahir_pasangan
 * @property string $pekerjaan_pasangan
 * @property string $ket_pasangan
 * @property string $tanggal_nikah
 * @property string $no_ktp
 * @property string $no_npwp
 * @property string $no_rek_bank_bjb
 * @property string $source
 * @property string $foto
 * @property string $work_no
 * @property integer $id_status_kepegawaian
 * @property string $login_terakhir
 */
class Pegawai extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_jenis_kelamin, source, foto', 'safe'),
			array('id_golongan, mkg_diangkat, mkg_diangkat_bulan, mkg_diangkat_hari, id_ruang, id_pangkat, id_jenis_kelamin, id_jabatan, id_unit_kerja, id_agama, id_pendidikan, id_status, jumlah_anak, id_status_kepegawaian', 'numerical', 'integerOnly'=>true),
			array('nama, jurusan, email, nama_pasangan', 'length', 'max'=>128),
			array('nip, token', 'length', 'max'=>25),
			array('username, password, tempat_lahir, pekerjaan_pasangan, ket_pasangan, source, foto', 'length', 'max'=>255),
			array('masa_kerja, no_ktp, no_npwp, no_rek_bank_bjb', 'length', 'max'=>100),
			array('telepon_rumah, hp, work_no', 'length', 'max'=>20),
			array('tmt_golongan, tmt_pangkat, tmt_jabatan, tanggal_lahir, tmt_cpns, tmt_pns, alamat_rumah, tanggal_lahir_pasangan, tanggal_nikah, login_terakhir', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, nip, username, password, id_golongan, tmt_golongan, mkg_diangkat, mkg_diangkat_bulan, mkg_diangkat_hari, id_ruang, id_pangkat, id_jenis_kelamin', 'safe', 'on'=>'search'),
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
			'jabatan'=>array(self::BELONGS_TO,'Jabatan','id_jabatan')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'nip' => 'NIP',
			'username' => 'Username',
			'password' => 'Password',
			'id_golongan' => 'Id Golongan',
			'tmt_golongan' => 'Tmt Golongan',
			'mkg_diangkat' => 'Mkg Diangkat',
			'mkg_diangkat_bulan' => 'Mkg Diangkat Bulan',
			'mkg_diangkat_hari' => 'Mkg Diangkat Hari',
			'id_ruang' => 'Id Ruang',


	
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('id_pangkat',$this->id_pangkat);
		$criteria->compare('id_jenis_kelamin',$this->id_jenis_kelamin);
		$criteria->compare('tmt_pangkat',$this->tmt_pangkat,true);
		$criteria->compare('id_jabatan',$this->id_jabatan);
		$criteria->compare('id_unit_kerja',$this->id_unit_kerja);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tmt_jabatan',$this->tmt_jabatan,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('id_agama',$this->id_agama);

		$criteria->compare('id_status_kepegawaian',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getRelationField($relation,$field)
	{
		if(!empty($this->$relation->$field))
			return $this->$relation->$field;
		else
			return null;
		
	}

	public static function getListAutoComplete()
	{
		$list = array();

		foreach(Pegawai::model()->findAllByAttributes(array('id_status_kepegawaian'=>1)) as $data) {
			$list[]=$data->nama;
		}

		return $list;
	}

	public static function getIdJabatanByUsername($username)
	{
		$model = Pegawai::model()->findByAttributes(array('username'=>$username));
		if(!empty($model->id_jabatan))
			return $model->id_jabatan;
		else
			return null;
	}

	public static function getIdJabatanByNama($nama)
	{
		$model = Pegawai::model()->findByAttributes(array('nama'=>$nama));
		if(!empty($model->id_jabatan))
			return $model->id_jabatan;
		else
			return null;
	}

	public static function getUsernameByIdJabatan($id_jabatan)
	{
		$model = Pegawai::model()->findByAttributes(array('id_jabatan'=>$id_jabatan));
		if(!empty($model->username))
			return $model->username;
		else
			return null;
	}

	public static function getUsernameByNama($nama)
	{
		$model = Pegawai::model()->findByAttributes(array('nama'=>$nama));
		if(!empty($model->username))
			return $model->username;
		else
			return null;
	}

	public static function getNamaByUsername($username)
	{
		if($username!=null)
		{
			$model = Pegawai::model()->findByAttributes(array('username'=>$username));
			if(!empty($model->nama))
				return $model->nama;
			else
				return $username;
		} else
			return null;

	}

	public static function getEmailByUsername($username)
	{
		if($username!=null)
		{
			$model = Pegawai::model()->findByAttributes(array('username'=>$username));
			if(!empty($model->email))
				return $model->email;
			else
				return $username;
		} else
			return null;

	}

	public static function getNamaByIdJabatan($id_jabatan)
	{
		
		$model = Pegawai::model()->findByAttributes(array('id_jabatan'=>$id_jabatan));
			if(!empty($model->nama))
				return $model->nama;
			else
				return null;
	}


}
