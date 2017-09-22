<?php
require_once 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

$files = glob('seu_diretorio'); // pega todos os arquivos de backup
$bucket_name = "mga-backup-db";
$storage = new StorageClient([
	'keyFilePath' => 'client_secret_json.json',
	'projectId' => 'GCP-project-ID'
]);
$bucket = $storage->bucket($bucket_name);
foreach($files as $file){ 
  if(is_file($file)){
  	$bucket->upload(fopen($file, 'r'));
  	unlink($file);
  }
}
echo 'ok';
?>

