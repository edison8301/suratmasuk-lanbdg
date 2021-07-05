<?php

class Helper {

	public static function backupDb($filepath, $tables = '*') 
	{
		if ($tables == '*') {
			$tables = array();
			$tables = Yii::app()->db->schema->getTableNames();
		} else {
			$tables = is_array($tables) ? $tables : explode(',', $tables);
		}
		$return = '';

		foreach ($tables as $table) {
			$result = Yii::app()->db->createCommand('SELECT * FROM ' . $table)->query();
			$return.= 'DROP TABLE IF EXISTS ' . $table . ';';
			$row2 = Yii::app()->db->createCommand('SHOW CREATE TABLE ' . $table)->queryRow();
			$return.= "\n\n" . $row2['Create Table'] . ";\n\n";
			foreach ($result as $row) {
				$return.= 'INSERT INTO ' . $table . ' VALUES(';
				foreach ($row as $data) {
					$data = addslashes($data);

					// Updated to preg_replace to suit PHP5.3 +
					$data = preg_replace("/\n/", "\\n", $data);
					if ($data!=null) {
						$return.= '"' . $data . '"';
					} if($data==null) {
						$return.= 'NULL';
					} else {
						$return.= '""';
					}
					$return.= ',';
				}
				$return = substr($return, 0, strlen($return) - 1);
				$return.= ");\n";
			}
			$return.="\n\n\n";
		}
		//save file for temporary in data/backup
		$handle = fopen($filepath, 'w+');
		fwrite($handle, $return);
		fclose($handle);
		
		//get file from temporary directory in data/backup
		header("Content-Disposition: attachment; filename=".basename($filepath));
		header("Content-type:application/x-sql");
		readfile($filepath);
		unlink($filepath);
		exit;
	}
	
	public static function ckEditorToolbar()
	{
		$ckeditor = 'js:[
		{ name: "document", items : ["Source" ] },
        { name: "clipboard", items : [ "Cut","Copy","Paste","PasteText","PasteFromWord","-","Undo","Redo" ] },
        { name: "editing", items : [ "Find","Replace","-","SelectAll","-","Scayt" ] },
        { name: "insert", items : [ "Image","Flash","Table","HorizontalRule","Smiley","SpecialChar","PageBreak","Iframe" ] },
			"/", //Line Break
		{ name: "styles", items : [ "Styles","Format" ] },
        { name: "basicstyles", items : [ "Bold","Italic","Strike","-","RemoveFormat" ] },
        { name: "paragraph", items : [ "NumberedList","BulletedList","-","Outdent","Indent","-","Blockquote", "-", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock", "-", "BidiLtr", "BidiRtl"  ] },
		{ name: "links", items : [ "Link","Unlink","Anchor" ] },
		{ name: "tools", items : [ "Maximize","-","About" ] }
		]';
		
		return $ckeditor;
	}
	
	public static function getLang()
	{
		if(!empty(Yii::app()->session['lang']))
			return Yii::app()->session['lang'];
		else
			return 'id';
	}
	
	public static function rp($jumlah=null)
	{
		return 'Rp '.number_format($jumlah,0,',','.');
	}
	
	public static function getMonth()
	{
		$month = date('Y-m');
		
		if(isset($_GET['month'])) $month = $_GET['month'];
		
		return $month;	
	}
	
	public static function getNextMonth()
	{
		return date('Y-m',strtotime(date('Y-m',strtotime(Bantu::getMonth())). " +1 month"));
	}
	
	public static function getPrevMonth()
	{
		return date('Y-m',strtotime(date('Y-m',strtotime(Bantu::getMonth())). " -1 month"));
	}
	
	public static function getHariSingkat($tanggal)
	{
		$hari = date('N',strtotime(date('Y-m-d',strtotime($tanggal))));
		
		if($hari == 1) return "Sen";
		if($hari == 2) return "Sel";
		if($hari == 3) return "Rab";
		if($hari == 4) return "Kam";
		if($hari == 5) return "Jum";
		if($hari == 6) return "Sab";
		if($hari == 7) return "Min";
		
	}
	
	public static function getDate()
	{
		date_default_timezone_set("Asia/Jakarta");
		return date("Y-m-d");
	}
	
	public static function getDateNextDay()
	{
		date_default_timezone_set("Asia/Jakarta");
		return date("Y-m-d", strtotime(date("Y-m-d") . " +1 day"));
	}
	
	public static function tgl($tgl=null)
	{	
		if(!empty($tgl))
		{
			$tgl=explode('-',$tgl);
			$tgl=$tgl['2']."-".$tgl['1']."-".$tgl['0'];
		}
		
		return $tgl;
	}
	
	public static function tanggal($tgl=null)
	{
		if($tgl == '0000-00-00' OR $tgl == null)
			return null;
		else
			return date('j',strtotime($tgl))." ".Helper::getBulan($tgl)." ".date('Y',strtotime($tgl));	
	}
	
	public static function lamaTinggal()
	{
		$awal = Yii::app()->session['checkInDate'];
		$akhir = Yii::app()->session['checkOutDate'];
		
		
		//explode the date by "-" and storing to array
		$date_parts1=explode("-", $awal);
		$date_parts2=explode("-", $akhir);
		//gregoriantojd() Converts a Gregorian date to Julian Day Count
		$start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
		$end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
   
		return $end_date - $start_date;

	}
	
	public static function getHari($tgl)
	{
		$hari=date('N',strtotime($tgl));
		switch($hari) 
		{
			case '1' :
			return 'Senin';
			break;
			
			case '2' :
			return 'Selasa';
			break;
			
			case '3' :
			return 'Rabu';
			break;
			
			case '4' :
			return 'Kamis';
			break;
			
			case '5' :
			return 'Jumat';
			break;
			
			case '6' :
			return 'Sabtu';
			break;
			
			case '7' :
			return 'Minggu';
			break;
			
		}
	}

	public static function hari($hari)
	{
		switch($hari) 
		{
			case '1' :
			return 'Senin';
			break;
			
			case '2' :
			return 'Selasa';
			break;
			
			case '3' :
			return 'Rabu';
			break;
			
			case '4' :
			return 'Kamis';
			break;
			
			case '5' :
			return 'Jumat';
			break;
			
			case '6' :
			return 'Sabtu';
			break;
			
			case '7' :
			return 'Minggu';
			break;
			
		}
	}	
	
	public static function getBulan($tgl)
	{
		$bulan=date('n',strtotime($tgl));
		
		if($bulan==1) return "Januari";
		if($bulan==2) return "Februari";
		if($bulan==3) return "Maret";
		if($bulan==4) return "April";
		if($bulan==5) return "Mei";
		if($bulan==6) return "Juni";
		if($bulan==7) return "Juli";
		if($bulan==8) return "Agustus";
		if($bulan==9) return "September";
		if($bulan==10) return "Oktober";
		if($bulan==11) return "November";
		if($bulan==12) return "Desember";
		
	}
	
	public static function getSetting($setting)
	{
		$model=Setting::model()->findByAttributes(array('nama'=>$setting));
		
		if(!empty($model->nilai))
		{
			return $model->nilai;
		} else {
			return "";
		}			
		
	}
	
	public static function getCreatedTime($waktu)
	{
		if($waktu == '')
			return null;
		else {
		$time = strtotime($waktu);
		
		$h = date('N',$time);
		
		if($h == '1') $hari = 'Senin';
		if($h == '2') $hari = 'Selasa';
		if($h == '3') $hari = 'Rabu';
		if($h == '4') $hari = 'Kamis';
		if($h == '5') $hari = 'Jumat';
		if($h == '6') $hari = 'Sabtu';
		if($h == '7') $hari = 'Minggu';
		
		
		$tgl = date('j',$time);
		
		$h = date('n',$time);
		
		if($h == '1') $bulan = 'Januari';
		if($h == '2') $bulan = 'Februari';
		if($h == '3') $bulan = 'Maret';
		if($h == '4') $bulan = 'April';
		if($h == '5') $bulan = 'Mei';
		if($h == '6') $bulan = 'Juni';
		if($h == '7') $bulan = 'Juli';
		if($h == '8') $bulan = 'Agustus';
		if($h == '9') $bulan = 'September';
		if($h == '10') $bulan = 'Oktober';
		if($h == '11') $bulan = 'November';
		if($h == '12') $bulan = 'Desember';
		
		$tahun  = date('Y',$time);
		
		$pukul = date('H:i:s',$time);
		
		$output = $hari.', '.$tgl.' '.$bulan.' '.$tahun.' | '.$pukul.' WIB';
		
		return $output;
		}
		
	}
	
	public static function getCreatedDate($waktu)
	{
		
		$time = strtotime($waktu);
		
		$h = date('N',$time);
		
		if($h == '1') $hari = 'Senin';
		if($h == '2') $hari = 'Selasa';
		if($h == '3') $hari = 'Rabu';
		if($h == '4') $hari = 'Kamis';
		if($h == '5') $hari = 'Jumat';
		if($h == '6') $hari = 'Sabtu';
		if($h == '7') $hari = 'Minggu';
		
		
		$tgl = date('j',$time);
		
		$h = date('n',$time);
		
		if($h == '1') $bulan = 'Januari';
		if($h == '2') $bulan = 'Februari';
		if($h == '3') $bulan = 'Maret';
		if($h == '4') $bulan = 'April';
		if($h == '5') $bulan = 'Mei';
		if($h == '6') $bulan = 'Juni';
		if($h == '7') $bulan = 'Juli';
		if($h == '8') $bulan = 'Agustus';
		if($h == '9') $bulan = 'September';
		if($h == '10') $bulan = 'Oktober';
		if($h == '11') $bulan = 'November';
		if($h == '12') $bulan = 'Desember';
		
		$tahun  = date('Y',$time);
		
		$pukul = date('h:i:s',$time);
		
		$output = $hari.', '.$tgl.' '.$bulan.' '.$tahun;
		
		return $output;
		
	}

    public static function sendMail($email,$subject,$msg) {
     $api_key="key-79ebb0bf8f5793926c92a2b538f29b97";/* Api Key got from https://mailgun.com/cp/my_account */
     $domain ="indomailer.net";/* Domain Name you given to Mailgun */
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
     curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
     curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      'from' => 'Surat Masuk PKP2A I LAN <mail@youriste.com>',
      'to' => $email,
      'subject' => $subject,
      'html' => $msg
     ));
     $result = curl_exec($ch);
     curl_close($ch);
     return $result;
    }   	
	
}


?>
