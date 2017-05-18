<?php


class DocsModel
{
  public static function uploadFile($document)
  {
    // Verify hidden inputs are not corrupted
    $hiddenInputsType = array("dni", "foto", "sanitaria", "cv","banco","carta","appform","salida");
    if (!in_array($document, $hiddenInputsType)) {
      return false;
    }

    $file = $_FILES['file']['name'];
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $userCompleteName = str_replace(" ","_",Session::get('user_real_name')).'_'.str_replace(" ","_",Session::get('user_real_surname')).'_'.Session::get('user_name');

    // check Docs folder writing rights, check if upload fits all rules
    if (self::isDocsFolderWritable() AND self::validateFile($document,$ext)) {
      // check if user's folder exists
      $userFolder = Config::get('PATH_DOCS') .$userCompleteName;
      if (is_dir($userFolder) == false) {//create it if doesn't exist
         mkdir($userFolder,0755);
      }

      $fileName = $userCompleteName.$document.'.'.strtolower($ext);

      if(file_exists($userFolder.'/'.$fileName)) {
        unlink($userFolder.'/'.$fileName);
      }

      // create a jpg file in the avatar folder, write marker to database
      move_uploaded_file($_FILES['file']['tmp_name'], Config::get('PATH_DOCS') .$userCompleteName.'/'.$fileName);
      self::writeFileToDatabase(Session::get('user_name'),$document);
      Session::add('feedback_positive', 'File upload succesful');
    }


  }

  public static function writeFileToDatabase($user_name,$document)
  {
      $database = DatabaseFactory::getFactory()->getConnection();
      if ($document == 'foto') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_foto) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_foto=TRUE");
      }elseif ($document == 'cv') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_cv) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_cv=TRUE");
      }elseif ($document == 'dni') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_dni) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_dni=TRUE");
      }elseif ($document == 'sanitaria') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_sanitaria) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_sanitaria=TRUE");
      }elseif ($document == 'banco') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_banco) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_banco=TRUE");
      }elseif ($document == 'carta') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_carta) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_carta=TRUE");
      }elseif ($document == 'appform') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_appform) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_appform=TRUE");
      }elseif ($document == 'salida') {
        $query = $database->prepare("INSERT INTO docs (dni,doc_salida) VALUES (:dni,TRUE) ON DUPLICATE KEY UPDATE doc_salida=TRUE");
      }else {
        Session::add('feedback_negative', 'Something went wrong with SQL');
        return false;
      }

      $query->execute(array(':dni' => $user_name)) or die(print_r($query->errorInfo(), true));
  }

  public static function validateFile($document,$ext)
  {
      if (!isset($_FILES['file'])) {
          Session::add('feedback_negative', Text::get('FEEDBACK_DOC_UPLOAD_FAILED'));
          return false;
      }


      // if input file too big (>5MB)
      if ($_FILES['file']['size'] > 5000000) {
          Session::add('feedback_negative', Text::get('FEEDBACK_DOC_UPLOAD_TOO_BIG'));
          return false;
      }

      if ($document == 'foto') {
        $allowedFiles = array('jpeg','jpg','JPG','JPEG');
      }else {
        $allowedFiles = array('pdf','PDF');
      }


      // if file type is not jpg, gif or png
      if (!in_array($ext, $allowedFiles)) {
          Session::add('feedback_negative', Text::get('FEEDBACK_DOC_UPLOAD_WRONG_TYPE'));
          return false;
      }

      return true;
  }

  public static function isDocsFolderWritable()
  {
      if (is_dir(Config::get('PATH_DOCS')) AND is_writable(Config::get('PATH_DOCS'))) {
          return true;
      }

      Session::add('feedback_negative', Text::get('FEEDBACK_DOCS_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE'));
      return false;
  }
}
