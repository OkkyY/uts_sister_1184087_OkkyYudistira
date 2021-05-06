<h1>UTS Sistem Tersebar Okky Yudistira 1184087</h1>
<p>
<h3>Upload Zip </h3>
<form method='post' action='' name='main' enctype='multipart/form-data'>
 <input type='file' name='zip' value='Select File'><br/>
 <input type='submit' name='upload' value='upload' />
</form>

<?php

if ($_FILES) {
    $fileName = $_FILES['zip']['tmp_name'];
    $name = $_FILES['zip']['name'];
    $zp = new ZipArchive();
    if ($zp->open($fileName)) {
        echo "<h2> Nama: " . $name . "<h2>";
        echo '<h3>File size: ' . filesize($fileName) . '</h3>';
        echo '<h3>Total files: ' . $zp->numFiles . '</h3>';
        echo "<h3>Isi Dalam File: </h3>";
        for ($i = 0; $i < $zp->numFiles; $i++) {
            $stat = $zp->statIndex($i);
            echo basename($stat['name']) . "<br>";
        }
        echo "<p>";
        echo 'File <b>'. $name .'</b> Berhasil Tersimpan, Silahkan Upload Kembali :) <a href=""> Reload</a>';
        $zp->close();
    } 
}
?>

<?php
class AsyncOperation extends Thread {

    public function __construct($arg) {
        $this->arg = $arg;
    }

    public function run() {
        if ($this->arg) {
            $sleep = mt_rand(1, 10);
            printf('%s: %s  -start -sleeps %d' . "\n", date("g:i:sa"), $this->arg, $sleep);
            sleep($sleep);
            printf('%s: %s  -finish' . "\n", date("g:i:sa"), $this->arg);
        }
    }
}

// Create a array
$stack = array();

//Initiate Multiple Thread
foreach ( range($fileName) as $i ) {
    $stack[] = new AsyncOperation($i);
}

// Start The Threads
foreach ( $stack as $t ) {
    $t->start();
}

?>