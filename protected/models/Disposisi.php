<?php

/**
 * This is the model class for table "disposisi".
 *
 * The followings are the available columns in table 'disposisi':
 * @property integer $id
 * @property integer $id_surat
 * @property string $tanggal
 * @property string $no_agenda
 * @property string $perihal
 * @property integer $id_disposisi_asal
 * @property integer $id_disposisi_tujuan
 * @property integer $id_disposisi_sifat
 * @property integer $id_disposisi_tindakan
 * @property string $catatan
 * @property string $dari
 * @property string $ke
 * @property string $waktu_dilihat
 * @property string $waktu_dibuat
 */
class Disposisi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $disposisi_nama;

	public function tableName()
	{
		return 'disposisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_surat, id_disposisi_asal, id_disposisi_tujuan, id_disposisi_sifat', 'numerical', 'integerOnly'=>true),
			array('no_agenda, perihal, dari, ke', 'length', 'max'=>255),
			array('id_disposisi_tindakan, tanggal, catatan, waktu_dilihat, waktu_dibuat', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_surat, tanggal, no_agenda, perihal, id_disposisi_asal, id_disposisi_tujuan, id_disposisi_sifat, id_disposisi_tindakan, catatan, dari, ke, waktu_dilihat, waktu_dibuat', 'safe', 'on'=>'search'),
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
			'disposisi_sifat'=>array(self::BELONGS_TO,'DisposisiSifat','id_disposisi_sifat'),
			//'disposisi_tindakan'=>array(self::BELONGS_TO,'DisposisiTindakan','id_disposisi_tindakan'),
			'surat'=>array(self::BELONGS_TO,'Surat','id_surat')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_surat' => 'Id Surat',
			'tanggal' => 'Tanggal',
			'no_agenda' => 'No Agenda',
			'perihal' => 'Perihal',
			'id_disposisi_asal' => 'Id Disposisi Asal',
			'id_disposisi_tujuan' => 'Id Disposisi Tujuan',
			'id_disposisi_sifat' => 'Sifat',
			'id_disposisi_tindakan' => 'Tindakan',
			'catatan' => 'Catatan',
			'dari' => 'Dari',
			'ke' => 'Ke',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_surat',$this->id_surat);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('no_agenda',$this->no_agenda,true);
		$criteria->compare('perihal',$this->perihal,true);
		$criteria->compare('id_disposisi_asal',$this->id_disposisi_asal);
		$criteria->compare('id_disposisi_tujuan',$this->id_disposisi_tujuan);
		$criteria->compare('id_disposisi_sifat',$this->id_disposisi_sifat);
		$criteria->compare('id_disposisi_tindakan',$this->id_disposisi_tindakan);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('dari',$this->dari,true);
		$criteria->compare('ke',$this->ke,true);
		$criteria->compare('waktu_dilihat',$this->waktu_dilihat,true);
		$criteria->compare('waktu_dibuat',$this->waktu_dibuat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Disposisi the static model class
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

	public function getDisposisiNama()
	{
		/*
		$output = '';
		$i=1;

		
		foreach(Disposisi::model()->findAllByAttributes(array('id_surat'=>$this->id_surat,'id_disposisi_asal'=>1)) as $disposisi)
		{
			if($i!=1) $output .= ' - ';

			if($this->ke!=null)
				$output .= Pegawai::getNamaByUsername($disposisi->ke);

			$i++;
		}

		return $output;
		*/

		if($this->ke!=null)
			return Pegawai::getNamaByUsername($this->ke);
		else
			return null;
	}

	public function getDisposisiEmail()
	{
		if($this->ke!=null)
			return Pegawai::getEmailByUsername($this->ke);
		else
			return null;
	}

	public function getAsalDisposisi()
	{
		return Pegawai::getNamaByUsername($this->dari).' ('.Jabatan::getNamaJabatanById($this->id_disposisi_asal).')';
	}

	public function getTujuanDisposisi()
	{
		return Pegawai::getNamaByUsername($this->ke).' ('.Jabatan::getNamaJabatanById($this->id_disposisi_tujuan).')';
	}

	public function findSurat()
	{
		return Surat::model()->findByAttributes(array('id'=>$this->id_surat));
	}

	public function getTindakan()
	{
		$output = '';
		$tindakan = json_decode($this->id_disposisi_tindakan);
		if(is_array($tindakan))
		{
			foreach($tindakan as $value)
			{
				$output .= DisposisiTindakan::getNamaById($value).', ';
			}
		}
		return $output;
	}

	public function emailCreation()
	{
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$to = str_replace('/',',',$this->getDisposisiEmail());
		// Additional headers
		$headers .= 'To: '.$this->getDisposisiNama().' <'.$this->getDisposisiEmail().'>' . "\r\n";
		$headers .= 'From: Surat Masuk PKP2A I LAN <suratmasuk@bandung.lan.go.id>' . "\r\n";
		//$headers .= 'Cc: p2ipk@lan.go.id, p2ipk.inovasi@gmail.com' . "\r\n";
		//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
		
		$subject = 'Disposisi Surat Masuk #'.$this->no_agenda;
	
		$message = '';
		$message .= 'Kepada Yth. <br>';
		$message .= $this->getDisposisiNama().'<br>';
		$message .= 'di tempat <br>';
		$message .= '<br>';
		$message .= 'Dengan hormat, <br>';
		$message .= '<br>';
		$message .= 'Melalui surat elektronik ini kami informasikan bahwa Saudara/i mendapatkan disposisi surat masuk sebagai berikut: ';
		$message .= 'Tanggal: '.$this->tanggal.'<br>';
		$message .= 'No Agenda: '.$this->no_agenda.'<br>';
		$message .= 'Perihal: '.$this->perihal.'<br>';
		$message .= 'Asal Disposisi: '.$this->getAsalDisposisi().'<br>';
		$message .= 'Sifat: '.$this->getRelationField('disposisi_sifat','nama').'<br>';
		$message .= 'Tindakan: '.$this->getTindakan().'<br>';
		$message .= 'Catatan: '.$this->catatan.'<br>';
		$message .= 'Waktu Disposisi: '.$this->waktu_dibuat.'<br>';
		$message .= '<br>';
		$message .= 'Silahkan periksa akun surat masuk Saudara/i untuk data yang lebih detil melalui website http://bandung.lan.go.id <br>';
		$message .= '<br>';
		$message .= '<br>';
		$message .= 'Keterangan: <br>';
		$message .= 'Email ini dikirim secara otomatis oleh aplikasi Surat Masuk PKP2A I LAN.';

		Helper::sendMail($to,$subject,$message);

		return true;
	}
	
	public function emailCreationSmtp()
	{
/*		$mail = new YiiMailer();		
			
		$smtp_server = 'gli.websitewelcome.com';
		$smtp_port = '465';
		$email = 'noreply@suratmasuk.bandung.lan.go.id';
		$password = 'suralan123';

		$mail->setSmtp($smtp_server, $smtp_port, 'ssl', true, $email,$password);
			
		$mail->setSubject("Disposisi Surat Masuk #".$this->no_agenda);
		$mail->setFrom($email,'Surat Masuk PKP2A I LAN <suratmasuk@bandung.lan.go.id>');
		
		$mail->MsgHTML('	
			<html>
		        <head>
		        </head>
		        <body>
		            Kepada Yth. <br>
		            '.$this->getDisposisiNama().'<br>
					di tempat <br>
					<br>
					Dengan hormat, <br>
					<br>
					Melalui surat elektronik ini kami informasikan bahwa Saudara/i mendapatkan disposisi surat masuk sebagai berikut: 
					Tanggal: '.$this->tanggal.'<br>
					No Agenda: '.$this->no_agenda.'<br>
					Perihal: '.$this->perihal.'<br>
					Asal Disposisi: '.$this->getAsalDisposisi().'<br>
					Sifat: '.$this->getRelationField('disposisi_sifat','nama').'<br>
					Tindakan: '.$this->getTindakan().'<br>
					Catatan: '.$this->catatan.'<br>
					Waktu Disposisi: '.$this->waktu_dibuat.'<br>
					<br>
					Silahkan periksa akun surat masuk Saudara/i untuk data yang lebih detil melalui website http://bandung.lan.go.id <br>
					<br>
					<br>
					Keterangan: <br>
					Email ini dikirim secara otomatis oleh aplikasi Surat Masuk PKP2A I LAN.
		        </body>
	       </html>

       ');

		Helper::sendMail($to,$subject,$message);

		$mail->setTo(str_replace('/',',',$this->getDisposisiEmail()));
		return $mail->send();*/

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$to = str_replace('/',',',$this->getDisposisiEmail());
		// Additional headers
		$headers .= 'To: '.$this->getDisposisiNama().' <'.$this->getDisposisiEmail().'>' . "\r\n";
		$headers .= 'From: Surat Masuk PKP2A I LAN <suratmasuk@bandung.lan.go.id>' . "\r\n";
		//$headers .= 'Cc: p2ipk@lan.go.id, p2ipk.inovasi@gmail.com' . "\r\n";
		//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
		
		$subject = 'Disposisi Surat Masuk #'.$this->no_agenda;
	
		$message = '';
		$message .= 'Kepada Yth. <br>';
		$message .= $this->getDisposisiNama().'<br>';
		$message .= 'di tempat <br>';
		$message .= '<br>';
		$message .= 'Dengan hormat, <br>';
		$message .= '<br>';
		$message .= 'Melalui surat elektronik ini kami informasikan bahwa Saudara/i mendapatkan disposisi surat masuk sebagai berikut: ';
		$message .= 'Tanggal: '.$this->tanggal.'<br>';
		$message .= 'No Agenda: '.$this->no_agenda.'<br>';
		$message .= 'Perihal: '.$this->perihal.'<br>';
		$message .= 'Asal Disposisi: '.$this->getAsalDisposisi().'<br>';
		$message .= 'Sifat: '.$this->getRelationField('disposisi_sifat','nama').'<br>';
		$message .= 'Tindakan: '.$this->getTindakan().'<br>';
		$message .= 'Catatan: '.$this->catatan.'<br>';
		$message .= 'Waktu Disposisi: '.$this->waktu_dibuat.'<br>';
		$message .= '<br>';
		$message .= 'Silahkan periksa akun surat masuk Saudara/i untuk data yang lebih detil melalui website http://bandung.lan.go.id <br>';
		$message .= '<br>';
		$message .= '<br>';
		$message .= 'Keterangan: <br>';
		$message .= 'Email ini dikirim secara otomatis oleh aplikasi Surat Masuk PKP2A I LAN.';

		return Helper::sendMail($to,$subject,$message);
	}
	
	
}
