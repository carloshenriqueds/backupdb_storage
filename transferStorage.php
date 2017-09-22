<?php
require_once 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

$files = glob('seu_diretorio'); // get all file names
$bucket_name = "bucket_name";
$storage = new StorageClient([
	'keyFilePath' => 'gcp_client_secret.json',
	'projectId' => 'gcp_project_id'
]);
$bucket = $storage->bucket($bucket_name);
foreach($files as $file){ // iterate files
  if(is_file($file)){
  	$bucket->upload(fopen($file, 'r'));
  	unlink($file); // delete file
  }
    
}
echo 'ok';
?>

