<?php


class DocsModel
{
  public static function uploadFile()
  {
    // check avatar folder writing rights, check if upload fits all rules
    if (self::isDocsFolderWritable()  AND self::validateImageFile()) {

        // create a jpg file in the avatar folder, write marker to database
        $target_file_path = Config::get('PATH_DOCS') . Session::get('user_name');
        self::resizeAvatarImage($_FILES['fileToUpload']['tmp_name'], $target_file_path, Config::get('AVATAR_SIZE'), Config::get('AVATAR_SIZE'));
  //      self::writeAvatarToDatabase(Session::get('user_id'));
  //      Session::set('user_avatar_file', self::getPublicUserAvatarFilePathByUserId(Session::get('user_id')));
        Session::add('feedback_positive', Text::get('FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL'));
    }
  }

  public static function resizeAvatarImage($source_image, $destination, $final_width = 44, $final_height = 44)
  {
      $imageData = getimagesize($source_image);
      $width = $imageData[0];
      $height = $imageData[1];
      $mimeType = $imageData['mime'];

      if (!$width || !$height) {
          return false;
      }

      switch ($mimeType) {
          case 'image/jpeg': $myImage = imagecreatefromjpeg($source_image); break;
          case 'image/png': $myImage = imagecreatefrompng($source_image); break;
          case 'image/gif': $myImage = imagecreatefromgif($source_image); break;
          default: return false;
      }

      // calculating the part of the image to use for thumbnail
      if ($width > $height) {
          $verticalCoordinateOfSource = 0;
          $horizontalCoordinateOfSource = ($width - $height) / 2;
          $smallestSide = $height;
      } else {
          $horizontalCoordinateOfSource = 0;
          $verticalCoordinateOfSource = ($height - $width) / 2;
          $smallestSide = $width;
      }

      // copying the part into thumbnail, maybe edit this for square avatars
      $thumb = imagecreatetruecolor($final_width, $final_height);
      imagecopyresampled($thumb, $myImage, 0, 0, $horizontalCoordinateOfSource, $verticalCoordinateOfSource, $final_width, $final_height, $smallestSide, $smallestSide);

      // add '.jpg' to file path, save it as a .jpg file with our $destination_filename parameter
      imagejpeg($thumb, $destination . '.jpg', Config::get('AVATAR_JPEG_QUALITY'));
      imagedestroy($thumb);

      if (file_exists($destination)) {
          return true;
      }
      return false;
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
