<?php
Auth::checkNoStudentAuthentication();
function returnFile( $filename ) {
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $mimeType = finfo_file($finfo, $filename);
    // Check if file exists, if it is not here return false:
    if ( !file_exists( $filename )) return false;
    header('Content-Description: File Transfer');
    header('Content-Type: $$mimeType');    // Suggest better filename for browser to use when saving file:
    //header('Content-Disposition: attachment; filename='.basename($filename));
    //header('Content-Transfer-Encoding: binary');
    // Caching headers:
    //header('Expires: 0');
  //  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    // This should be set:
    header('Content-Length: ' . filesize($filename));
    // Clean output buffer without sending it, alternatively you can do ob_end_clean(); to also turn off buffering.
    ob_clean();
    // And flush buffers, don't know actually why but php manual seems recommending it:
    flush();
    // Read file and output it's contents:
    readfile( $filename );

    // You need to exit after that or at least make sure that anything other is not echoed out:
    exit;
}

// Added to download.php
if (isset($_GET['file'])) {
    $folder = basename($_GET['folder']);
    $file = basename($_GET['file']);
    $filename = '/var/www/html/myproject/docs/'.$folder.'/'.$file;
    returnFile( $filename );
}

 ?>
