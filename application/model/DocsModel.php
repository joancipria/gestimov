<?php


class DocsModel
{
  public static function uploadFile()
  {
    // check avatar folder writing rights, check if upload fits all rules
    if (self::isDocsFolderWritable()  AND self::validateImageFile()) {

      // check if user's folder exists
      $userFolder = Config::get('PATH_DOCS') . Session::get('user_real_name').'_'.Session::get('user_real_surname').'_'.Session::get('user_name');
      if (is_dir($userFolder) == false) {//create it if doesn't exist
         mkdir($userFolder,0755);
      }

        // create a jpg file in the avatar folder, write marker to database
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], Config::get('PATH_DOCS') . Session::get('user_real_name').'_'.Session::get('user_real_surname').'_'.Session::get('user_name').'/'.Session::get('user_real_name').'_'.Session::get('user_real_surname').'.jpg');

  //      self::writeAvatarToDatabase(Session::get('user_id'));
  //      Session::set('user_avatar_file', self::getPublicUserAvatarFilePathByUserId(Session::get('user_id')));
        Session::add('feedback_positive', umask());
    }
  }

  public static function isDocsFolderWritable()
  {
      if (is_dir(Config::get('PATH_DOCS')) AND is_writable(Config::get('PATH_DOCS'))) {
          return true;
      }

      Session::add('feedback_negative', Text::get('FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE'));
      return false;
  }

  public static function validateImageFile()
  {
      if (!isset($_FILES['fileToUpload'])) {
          Session::add('feedback_negative', Text::get('FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED'));
          return false;
      }

      // if input file too big (>5MB)
      if ($_FILES['fileToUpload']['size'] > 5000000) {
          Session::add('feedback_negative', Text::get('FEEDBACK_AVATAR_UPLOAD_TOO_BIG'));
          return false;
      }

      // get the image width, height and mime type
      $image_proportions = getimagesize($_FILES['fileToUpload']['tmp_name']);

      // if input file too small, [0] is the width, [1] is the height
      if ($image_proportions[0] < Config::get('AVATAR_SIZE') OR $image_proportions[1] < Config::get('AVATAR_SIZE')) {
          Session::add('feedback_negative', Text::get('FEEDBACK_AVATAR_UPLOAD_TOO_SMALL'));
          return false;
      }

      // if file type is not jpg, gif or png
      if (!in_array($image_proportions['mime'], array('image/jpeg', 'image/gif', 'image/png'))) {
          Session::add('feedback_negative', Text::get('FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE'));
          return false;
      }

      return true;
  }
}
