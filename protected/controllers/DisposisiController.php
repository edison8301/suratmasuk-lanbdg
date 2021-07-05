<?php

class DisposisiController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','perawatan'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','detail','directDelete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
	public function actionView($id)
	{
		$model = $this->loadModel($id);

		if($model->waktu_dilihat==null AND trim($model->ke) == trim(Yii::app()->user->id))
		{
			date_default_timezone_set('Asia/Jakarta');
			$model->waktu_dilihat = date('Y-m-d H:i:s');
			$model->save();
		}
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/*
	public function actionPerawatan()
	{
		print date_default_timezone_get();
		print "<br>";
		
		foreach(Disposisi::model()->findAll() as $data) {
			if($data->waktu_dilihat != null)
			{
				print $data->id." - ".$data->waktu_dilihat." - ";
				$waktu_awal = strtotime($data->waktu_dilihat);
				$lama = 1*60*60;
				$waktu_akhir = intval($waktu_awal) - intval($lama);
				$waktu_baru =  date("Y-m-d H:i:s",$waktu_akhir);
				$data->waktu_dilihat = $waktu_baru;
				print $data->waktu_dilihat;
				print "<br>";
				$data->waktu_dilihat = $waktu_baru;
				$data->save();
			}
		}


	} */

	public function actionDetail($id)
	{
		$this->render('detail',array(
			'model'=>$this->loadModel($id),
		));
	}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
	public function actionCreate()
	{
		$model=new Disposisi;

		$id_surat = $_GET['id_surat'];
		$model->id_surat = $_GET['id_surat'];
		$model->perihal = $model->getRelationField("surat","perihal");
		$model->no_agenda = $model->getRelationField("surat","nomor_agenda");
		$model->tanggal = date('Y-m-d');

		if(isset($_POST['Disposisi']))
		{
			if(empty($_POST['Disposisi']['id_disposisi_tindakan']))
			{
				Yii::app()->user->setFlash('danger','Disposisi Gagal: Kolom Tindakan Harus Dipilih');
				$this->redirect(array('disposisi/create','id_surat'=>$id_surat));	
			}

			$disposisi = array();

			if($_POST['Disposisi']['disposisi_nama']!=null)
			{

				$listDisposisi = $_POST['Disposisi']['disposisi_nama'];
				$disposisi = explode(';',$listDisposisi);
				foreach($disposisi as $nama_pegawai) 
				{
					$model = new Disposisi;
					$model->attributes=$_POST['Disposisi'];
					$model->id_disposisi_tindakan = json_encode($_POST['Disposisi']['id_disposisi_tindakan']);

					date_default_timezone_set('Asia/Jakarta');
					$model->waktu_dibuat = date('Y-m-d H:i:s');

					$model->id_disposisi_asal = Pegawai::getIdJabatanByUsername(Yii::app()->user->id);
					$model->dari = Yii::app()->user->id;

					$model->id_disposisi_tujuan = Pegawai::getIdJabatanByNama($nama_pegawai);
					$model->ke = Pegawai::getUsernameByNama($nama_pegawai);

					$model->save();
					//$model->emailCreation();
					$model->emailCreationSmtp();
					
				}
			}

			if(isset($_POST['id_disposisi_tujuan'])) {
			foreach($_POST['id_disposisi_tujuan'] as $key => $values)
			{
				if(!in_array(Pegawai::getNamaByIdJabatan($key),$disposisi))
				{
					$model = new Disposisi;
					$model->attributes=$_POST['Disposisi'];
					$model->id_disposisi_tindakan = json_encode($_POST['Disposisi']['id_disposisi_tindakan']);
				
					$model->id_disposisi_tujuan = $key;

					date_default_timezone_set('Asia/Jakarta');
					$model->waktu_dibuat = date('Y-m-d H:i:s');

					$model->id_disposisi_asal = Pegawai::getIdJabatanByUsername(Yii::app()->user->id);
					$model->dari = Yii::app()->user->id;
				
					$model->id_disposisi_tujuan = $key;
					$model->ke = Pegawai::getUsernameByIdJabatan($key);

					$model->save();
					$model->emailCreation();
				}
			} }

			if(empty($_POST['Disposisi']['disposisi_nama']) AND empty($_POST['id_disposisi_tujuan']))
			{
				Yii::app()->user->setFlash('danger','Disposisi Gagal: Tujuan Disposisi Tidak Boleh Kosong');
			} else {
				Yii::app()->user->setFlash('success','Surat Berhasil Didisposisi');
				$this->redirect(array('surat/view','id'=>$id_surat));	
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$model->id_disposisi_tindakan = json_decode($model->id_disposisi_tindakan);

		if(isset($_POST['Disposisi']))
		{
			$model->attributes=$_POST['Disposisi'];
			$model->id_disposisi_tindakan = json_encode($_POST['Disposisi']['id_disposisi_tindakan']);

			if($_POST['disposisi_nama']!=null)
			{
				$model->ke = Pegawai::getUsernameByNama($_POST['disposisi_nama']);
				$model->id_disposisi_tujuan = Pegawai::getIdJabatanByNama($_POST['disposisi_nama']);
			} else {
				$model->ke = Pegawai::getUsernameByIdJabatan($model->id_disposisi_tujuan);
			}

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDirectDelete($id)
	{
		$model = $this->loadModel($id);
		
		$id_surat = $model->id_surat;
		
		if($model->delete())
		{
			Yii::app()->user->setFlash('success','Data berhasil dihapus');
			$this->redirect(array('surat/view','id'=>$id_surat));
		}
	}

/**
* Lists all models.
*/
public function actionIndex()
{

}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Disposisi('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Disposisi']))
$model->attributes=$_GET['Disposisi'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Disposisi::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='disposisi-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
