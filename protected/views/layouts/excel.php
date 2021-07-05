<?php 

$file="laporan-surat-masuk.xls";
header('Content-Type: text/html');
$table = $_POST['tablehidden'];//i get this from another php file.It is HTML table
header("Content-type: application/x-msexcel"); //tried adding  charset='utf-8' into header
header("Content-Disposition: attachment; filename=$file");

?>

<?php print $content; ?>