<?php

class SuratController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','detail','report','hapusLampiran',
					'reportProcess','exportExcel'),
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

		if($model->waktu_dilihat == null AND User::isKepalaPusat())
		{
			date_default_timezone_set('Asia/Jakarta');
			$model->waktu_dilihat = date('Y-m-d H:i:s');
			$model->save();
		}

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionDetail($id)
	{
		$this->render('detail',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionReport()
	{
		if(!empty($_POST['tanggal_awal']) AND !empty($_POST['tanggal_akhir']))
			$this->redirect(array(
				'surat/exportExcel',
				'tanggal_awal'=>$_POST['tanggal_awal'],
				'tanggal_akhir'=>$_POST['tanggal_akhir'],
			));

		$this->render('report');
	}

	public function actionReportProcess()
	{
		$this->layout = 'excel';
		$this->render('reportProcess',array(
			'tanggal_awal'=>$_GET['tanggal_awal'],
			'tanggal_akhir'=>$_GET['tanggal_akhir'],
		));
	}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
	public function actionCreate()
	{
		$model=new Surat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Surat']))
		{
			$model->attributes=$_POST['Surat'];

			date_default_timezone_set('Asia/Jakarta');
			$model->waktu_dibuat = date('Y-m-d H:i:s');
			$model->pengolah = Yii::app()->user->id;
		
			$lampiran_1 = CUploadedFile::getInstance($model,'lampiran_1');
			if($lampiran_1!==null)
				$model->lampiran_1 = str_replace(' ','-',time().'_'.$lampiran_1->name);

			$lampiran_2 = CUploadedFile::getInstance($model,'lampiran_2');			
			if($lampiran_2!==null)
				$model->lampiran_2 = str_replace(' ','-',time().'_'.$lampiran_2->name);

			$lampiran_3 = CUploadedFile::getInstance($model,'lampiran_3');
			if($lampiran_3!==null)
				$model->lampiran_3 = str_replace(' ','-',time().'_'.$lampiran_3->name);

			if($model->save())
			{
				$path = Yii::app()->basePath.'/../uploads/surat/';
				
				if($lampiran_1!==null)
					$lampiran_1->saveAs($path.$model->lampiran_1);

				if($lampiran_2!==null)
					$lampiran_2->saveAs($path.$model->lampiran_2);
				
				if($lampiran_3!==null)
					$lampiran_3->saveAs($path.$model->lampiran_3);

				$this->redirect(array('view','id'=>$model->id));
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

		$old_1 = $model->lampiran_1;
		$old_2 = $model->lampiran_2;
		$old_3 = $model->lampiran_3;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Surat']))
		{
			$model->attributes=$_POST['Surat'];
			

			$lampiran_1 = CUploadedFile::getInstance($model,'lampiran_1');
			if($lampiran_1!==null)
				$model->lampiran_1 = str_replace(' ','-',time().'_'.$lampiran_1->name);
			else
				$model->lampiran_1 = $old_1;

			$lampiran_2 = CUploadedFile::getInstance($model,'lampiran_2');
			if($lampiran_2!==null)
				$model->lampiran_2 = str_replace(' ','-',time().'_'.$lampiran_2->name);
			else
				$model->lampiran_2 = $old_2;

			$lampiran_3 = CUploadedFile::getInstance($model,'lampiran_3');
			if($lampiran_3!==null)
				$model->lampiran_3 = str_replace(' ','-',time().'_'.$lampiran_3->name);
			else
				$model->lampiran_3 = $old_3;


			if($model->save())
			{
				$path = Yii::app()->basePath.'/../uploads/surat/';
				
				if($lampiran_1!==null)
				{
					$lampiran_1->saveAs($path.$model->lampiran_1);

					if($old_1!='' AND file_exists($path.$old_1))
						unlink($path.$old_1);
				}

				if($lampiran_2!==null)
				{
					$lampiran_2->saveAs($path.$model->lampiran_2);

					if($old_2!='' AND file_exists($path.$old_2))
						unlink($path.$old_2);
				}

				if($lampiran_3!==null)
				{
					$lampiran_3->saveAs($path.$model->lampiran_3);

					if($old_3!='' AND file_exists($path.$old_3))
						unlink($path.$old_3);
				}

				$this->redirect(array('view','id'=>$model->id));
			}
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
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
	public function actionIndex()
	{

	}

	public function actionHapusLampiran($id,$lampiran)
	{
		$model = $this->loadModel($id);

		$path = Yii::app()->basePath.'/../uploads/surat/';

		if($lampiran==1)
		{
			if($model->lampiran_1 != null AND file_exists($path.$model->lampiran_1))
				unlink($path.$model->lampiran_1);

			$model->lampiran_1 = '';
		}

		if($lampiran==2)
		{
			if($model->lampiran_2 != null AND file_exists($path.$model->lampiran_2))
				unlink($path.$model->lampiran_2);

			$model->lampiran_2 = '';
		}

		if($lampiran==3)
		{
			if($model->lampiran_3 != null AND file_exists($path.$model->lampiran_3))
				unlink($path.$model->lampiran_3);

			$model->lampiran_3 = '';
		}

		$model->save();

		$this->redirect(array('surat/view','id'=>$id));

	}

	public function actionExportExcel($tanggal_awal, $tanggal_akhir)
	{
		

		spl_autoload_unregister(array('YiiBase','autoload'));
		
		Yii::import('application.vendors.PHPExcel',true);
		
		spl_autoload_register(array('YiiBase', 'autoload'));

		$PHPExcel = new PHPExcel();
			

		//style font
		$PHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setSize(16);
		$PHPExcel->getActiveSheet()->getStyle("A1:G2")->getFont()->getColor()->setRGB('FFFFFF');
		$PHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$PHPExcel->getActiveSheet()->getStyle('A3:K3')->getFont()->setBold(true);
			
		//$PHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//merge and center
		
		
		$PHPExcel->getActiveSheet()->setCellValue('A1', 'LAPORAN SURAT MASUK');
		$PHPExcel->getActiveSheet()->getStyle('A3:K3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('EF0983');//background color header surat
		$PHPExcel->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$PHPExcel->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

		//header surat
		$PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
		$PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
		$PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
		$PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
		$PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
		$PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
		$PHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
		

		$PHPExcel->getActiveSheet()->getStyle('A3:K3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);//border header surat	
		

		$PHPExcel->getActiveSheet()->setCellValue('A3', 'No');
		$PHPExcel->getActiveSheet()->setCellValue('B3', 'Nomor Agenda');
		$PHPExcel->getActiveSheet()->setCellValue('C3', 'Tgl. Terima');
		$PHPExcel->getActiveSheet()->setCellValue('D3', 'Asal Surat');
		$PHPExcel->getActiveSheet()->setCellValue('E3', 'Tgl. Surat');
		$PHPExcel->getActiveSheet()->setCellValue('F3', 'Nomor Surat');
		$PHPExcel->getActiveSheet()->setCellValue('G3', 'Perihal');
		$PHPExcel->getActiveSheet()->setCellValue('H3', 'Ringkasan Surat');
		$PHPExcel->getActiveSheet()->setCellValue('I3', 'Disposisi Kepada Bapak/Ibu');
		$PHPExcel->getActiveSheet()->setCellValue('J3', 'Tindak Lanjut');
		$PHPExcel->getActiveSheet()->setCellValue('K3', 'Catatan Pimpinan');

		$criteria = new CDbCriteria;
		$criteria->condition = 'waktu_dibuat >= :waktu_awal AND waktu_dibuat <= :waktu_akhir';
		$criteria->params = array(':waktu_awal'=>$tanggal_awal.' 00:00:00',':waktu_akhir'=>$tanggal_akhir.'23:59:59');
		$criteria->order = 'waktu_dibuat ASC';

		$i = 1;
		$kolom = 4;
			//value nya
		foreach(Surat::model()->findAll($criteria) as $data)
		{
			$PHPExcel->getActiveSheet()->setCellValue('A'.$kolom, $i);
			$PHPExcel->getActiveSheet()->setCellValue('B'.$kolom, $data->nomor_agenda);
			$PHPExcel->getActiveSheet()->setCellValue('C'.$kolom, Helper::tanggal($data->waktu_dibuat));

			$PHPExcel->getActiveSheet()->setCellValue('D'.$kolom, $data->asal_surat);
			$PHPExcel->getActiveSheet()->setCellValue('E'.$kolom, Helper::tanggal($data->tanggal_surat));
			
			$PHPExcel->getActiveSheet()->setCellValue('F'.$kolom, $data->nomor_surat);
			$PHPExcel->getActiveSheet()->setCellValue('G'.$kolom, $data->perihal);
			$PHPExcel->getActiveSheet()->setCellValue('H'.$kolom, $data->ringkasan);

			$disposisi = $data->findFirstDisposisi();
			if($disposisi!==null)
			{
				$PHPExcel->getActiveSheet()->setCellValue('I'.$kolom, $disposisi->getDisposisiNama());
				$PHPExcel->getActiveSheet()->setCellValue('J'.$kolom, $disposisi->getTindakan());
				$PHPExcel->getActiveSheet()->setCellValue('K'.$kolom, $disposisi->catatan);
			}
			
			$PHPExcel->getActiveSheet()->getStyle('A'.$kolom.':K'.$kolom)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
												
			$i++; $kolom++;
		}

		$PHPExcel->getActiveSheet()->getStyle('A3:K'.$kolom)->getAlignment()->setWrapText(true);
		$PHPExcel->getActiveSheet()->getStyle('A3:K'.$kolom)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

	
		$filename = time().'_Surat.xlsx';

		$path = Yii::app()->basePath.'/../uploads/export/';
		$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
		$objWriter->save($path.$filename);	
		$this->redirect(Yii::app()->request->baseUrl.'/uploads/export/'.$filename);

	}

/**
* Manages all models.
*/
	public function actionAdmin()
	{
		$model=new Surat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Surat']))
			$model->attributes=$_GET['Surat'];

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
$model=Surat::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='surat-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
