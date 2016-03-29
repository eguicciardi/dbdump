<?php

    include_once('Mysqldump.php');

    $db_host = 'localhost';
    $db_name = '';
    $db_username = '';
    $db_password = '';

    $cartella_file = 'work';
    $formato_nome_file = $cartella_file.'/'.date(Ymd).'-dump';

    $dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host='.$db_host.';dbname='.$db_name, $db_username, $db_password);
    $dump->start($formato_nome_file.'.sql');

    $zip = new ZipArchive();
    $filename = $formato_nome_file.'.zip';

    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {

        exit("Error Opening File  <$filename>\n");

    }

    $zip->addFile($formato_nome_file.'.sql');
    $zip->close();
