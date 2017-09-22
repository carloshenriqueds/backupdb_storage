# backupdp_storage
Repositório que faz backup de todos databases da máquina e envia para o Google Cloud Storage

## Getting Started
Como instalar e configurar.

### Instalando dependências

##### Old style
```
cd /path/backupdb_storage
composer install
```

### Configurando projeto
Acesse o arquivo backupDB.sh e insira os seus dados abaixo:

##### Old style
```
backup_parent_dir="seu_diretorio"
mysql_user="seu_user"
mysql_password="sua_senha"
```

No arquivo transferStorage.php, você deve adicionar:

##### Old style
```
$files = glob('seu_diretorio'); // get all file names
$bucket_name = "bucket_name";
$storage = new StorageClient([
	'keyFilePath' => 'gcp_client_secret.json',
	'projectId' => 'gcp_project_id'
]);
```

### Execução
Basta adicionar o script backupDB.sh na sua crontab, configuranto o time de execução. :)