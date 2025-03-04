<?php

/**
 * UserModel
 * Handles all the PUBLIC profile stuff. This is not for getting data of the logged in user, it's more for handling
 * data of all the other users. Useful for display profile information, creating user lists etc.
 */
class UserModel
{
  public static function getPublicProfilesOfMyStudents()
  {
    Auth::checkTeacherAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();
      $codcent = RegistrationModel::getCodCent();
      $myself = Session::get('user_name');

      $sql = "SELECT users.user_id,personas.nom AS nom, personas.ape AS ape,personas.dni AS dni, centros.nom AS nomcent,users.user_email AS email,personas.telefono AS telefono,personas.direccion AS direccion, personas.poblacion AS poblacion, personas.cp AS cp, personas.provincia AS provincia, personas.pais AS pais, personas.fechanac AS fechanac FROM users, personas,centros WHERE users.user_account_type = 1 AND users.user_name = personas.dni AND personas.codcent = centros.cod AND centros.cod = :codcent AND users.user_name <> :myself";
      $query = $database->prepare($sql);
      $query->execute(array(':codcent' => $codcent, ':myself' => $myself));


      $all_users_profiles = array();

      foreach ($query->fetchAll() as $user) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($user, 'Filter::XSSFilter');

          $all_users_profiles[$user->user_id] = new stdClass();
          $all_users_profiles[$user->user_id]->user_id = $user->user_id;
          $all_users_profiles[$user->user_id]->nom = $user->nom;
          $all_users_profiles[$user->user_id]->ape = $user->ape;
          $all_users_profiles[$user->user_id]->nomcent = $user->nomcent;
          $all_users_profiles[$user->user_id]->dni = $user->dni;
          $all_users_profiles[$user->user_id]->email = $user->email;
          $all_users_profiles[$user->user_id]->telefono = $user->telefono;
          $all_users_profiles[$user->user_id]->direccion = $user->direccion;
          $all_users_profiles[$user->user_id]->poblacion = $user->poblacion;
          $all_users_profiles[$user->user_id]->cp = $user->cp;
          $all_users_profiles[$user->user_id]->provincia = $user->provincia;
          $all_users_profiles[$user->user_id]->pais = $user->pais;
          $all_users_profiles[$user->user_id]->fechanac = $user->fechanac;





      }

      return $all_users_profiles;
  }

  public static function getPublicProfilesOfMyStudentsConsorcium()
  {
    Auth::checkAdminAuthentication();
    $database = DatabaseFactory::getFactory()->getConnection();
    $codcons = RegistrationModel::getCodConsorcium();

    $sql = "SELECT users.user_id,personas.nom AS nom, personas.ape AS ape,personas.dni AS dni, centros.nom AS nomcent, users.user_email AS email,personas.telefono AS telefono,personas.direccion AS direccion, personas.poblacion AS poblacion, personas.cp AS cp, personas.provincia AS provincia, personas.pais AS pais, personas.fechanac AS fechanac FROM users, personas,centros,centros_consorcios, consorcios WHERE users.user_account_type = 1 AND users.user_name = personas.dni AND personas.codcent = centros.cod AND centros.cod = centros_consorcios.cod_cent AND centros_consorcios.cod_cons = consorcios.cod AND consorcios.cod = :codcons";
    $query = $database->prepare($sql);
    $query->execute(array(':codcons' => $codcons));

    $all_users_profiles = array();

    foreach ($query->fetchAll() as $user) {

        // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
        // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
        // the user's values
        array_walk_recursive($user, 'Filter::XSSFilter');

        $all_users_profiles[$user->user_id] = new stdClass();
        $all_users_profiles[$user->user_id]->user_id = $user->user_id;
        $all_users_profiles[$user->user_id]->nom = $user->nom;
        $all_users_profiles[$user->user_id]->ape = $user->ape;
        $all_users_profiles[$user->user_id]->nomcent = $user->nomcent;
        $all_users_profiles[$user->user_id]->dni = $user->dni;
        $all_users_profiles[$user->user_id]->email = $user->email;
        $all_users_profiles[$user->user_id]->telefono = $user->telefono;
        $all_users_profiles[$user->user_id]->direccion = $user->direccion;
        $all_users_profiles[$user->user_id]->poblacion = $user->poblacion;
        $all_users_profiles[$user->user_id]->cp = $user->cp;
        $all_users_profiles[$user->user_id]->provincia = $user->provincia;
        $all_users_profiles[$user->user_id]->pais = $user->pais;
        $all_users_profiles[$user->user_id]->fechanac = $user->fechanac;
    }

    return $all_users_profiles;
  }





  public static function getDocumentsOfAllUsers()
  {
      Auth::checkAdminAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();

      $sql = "SELECT users.user_id,personas.nom AS nom, personas.ape AS ape, centros.nom AS nomcent, docs.doc_foto AS personalfoto, personas.dni AS dni FROM users, personas,centros,docs WHERE users.user_name = personas.dni AND personas.codcent = centros.cod AND docs.dni = personas.dni";
      $query = $database->prepare($sql);
      $query->execute();

      $all_users_profiles = array();

      foreach ($query->fetchAll() as $user) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($user, 'Filter::XSSFilter');

          $all_users_profiles[$user->user_id] = new stdClass();
          $all_users_profiles[$user->user_id]->user_id = $user->user_id;
          $all_users_profiles[$user->user_id]->nom = $user->nom;
          $all_users_profiles[$user->user_id]->ape = $user->ape;
          $all_users_profiles[$user->user_id]->nomcent = $user->nomcent;
          $all_users_profiles[$user->user_id]->personalfoto = $user->personalfoto;
          $all_users_profiles[$user->user_id]->dni = $user->dni;
      }

      return $all_users_profiles;
  }



  public static function getDocumentsOfMyStudents()
  {
      Auth::checkTeacherAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();
      $codcent = RegistrationModel::getCodCent();

      $sql = "SELECT users.user_id,personas.nom AS nom, personas.ape AS ape, centros.nom AS nomcent, docs.doc_foto AS personalfoto,docs.doc_dni AS personaldni, personas.dni AS dni FROM users, personas,centros,docs WHERE users.user_name = personas.dni AND personas.codcent = :codcent AND personas.codcent = centros.cod AND docs.dni = personas.dni";
      $query = $database->prepare($sql);
      $query->execute(array(':codcent' => $codcent));

      $all_users_profiles = array();

      foreach ($query->fetchAll() as $user) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($user, 'Filter::XSSFilter');

          $all_users_profiles[$user->user_id] = new stdClass();
          $all_users_profiles[$user->user_id]->user_id = $user->user_id;
          $all_users_profiles[$user->user_id]->nom = $user->nom;
          $all_users_profiles[$user->user_id]->ape = $user->ape;
          $all_users_profiles[$user->user_id]->nomcent = $user->nomcent;
          $all_users_profiles[$user->user_id]->personalfoto = $user->personalfoto;
          $all_users_profiles[$user->user_id]->personaldni = $user->personaldni;
          $all_users_profiles[$user->user_id]->dni = $user->dni;

      }

      return $all_users_profiles;
  }


  public static function getMobilitiesOfMyStudents()
  {
      Auth::checkTeacherAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();
      $codcent = RegistrationModel::getCodCent();

      $sql = "SELECT users.user_id,personas.nom AS nom, personas.ape AS ape,flujo_personas.fpdni AS dni,personas.pais AS pais, centros.nom AS nomcent, flujo_personas.fpid AS flujo, flujo.FechaSalida AS fechasalida, flujo.FechaLlegada AS fechallegada, flujo.PaisDestino AS dpais, flujo.CiudadDestino AS dciudad FROM users, personas,centros,flujo,flujo_personas WHERE users.user_name = personas.dni AND personas.codcent = :codcent AND personas.codcent = centros.cod  AND personas.dni = flujo_personas.fpdni AND flujo_personas.fpid = flujo.id";
      $query = $database->prepare($sql);
      $query->execute(array(':codcent' => $codcent));

      $all_users_profiles = array();

      foreach ($query->fetchAll() as $user) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($user, 'Filter::XSSFilter');

          $all_users_profiles[$user->user_id] = new stdClass();
          $all_users_profiles[$user->user_id]->user_id = $user->user_id;
          $all_users_profiles[$user->user_id]->nom = $user->nom;
          $all_users_profiles[$user->user_id]->ape = $user->ape;
          $all_users_profiles[$user->user_id]->dni = $user->dni;
          $all_users_profiles[$user->user_id]->pais = $user->pais;
          $all_users_profiles[$user->user_id]->flujo = $user->flujo;
          $all_users_profiles[$user->user_id]->fechasalida = $user->fechasalida;
          $all_users_profiles[$user->user_id]->fechallegada = $user->fechallegada;
          $all_users_profiles[$user->user_id]->dpais = $user->dpais;
          $all_users_profiles[$user->user_id]->dciudad = $user->dciudad;
          $all_users_profiles[$user->user_id]->nomcent = $user->nomcent;
      }

      return $all_users_profiles;
  }


  public static function getMobilitiesOfMyStudentsConsorcium()
  {
      Auth::checkAdminAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();
      $codcons = RegistrationModel::getCodConsorcium();

      $sql = "SELECT users.user_id,personas.nom AS nom, personas.ape AS ape,flujo_personas.fpdni AS dni,personas.pais AS pais, centros.nom AS nomcent, flujo_personas.fpid AS flujo, flujo.FechaSalida AS fechasalida, flujo.FechaLlegada AS fechallegada, flujo.PaisDestino AS dpais, flujo.CiudadDestino AS dciudad FROM users, personas,centros,flujo,flujo_personas,centros_consorcios, consorcios WHERE users.user_name = personas.dni AND personas.codcent = centros.cod AND personas.dni = flujo_personas.fpdni AND flujo_personas.fpid = flujo.id AND centros.cod = centros_consorcios.cod_cent AND centros_consorcios.cod_cons = consorcios.cod AND consorcios.cod = :codcons";
      $query = $database->prepare($sql);
      $query->execute(array(':codcons' => $codcons));

      $all_users_profiles = array();

      foreach ($query->fetchAll() as $user) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($user, 'Filter::XSSFilter');

          $all_users_profiles[$user->user_id] = new stdClass();
          $all_users_profiles[$user->user_id]->user_id = $user->user_id;
          $all_users_profiles[$user->user_id]->nom = $user->nom;
          $all_users_profiles[$user->user_id]->ape = $user->ape;
          $all_users_profiles[$user->user_id]->dni = $user->dni;
          $all_users_profiles[$user->user_id]->pais = $user->pais;
          $all_users_profiles[$user->user_id]->flujo = $user->flujo;
          $all_users_profiles[$user->user_id]->fechasalida = $user->fechasalida;
          $all_users_profiles[$user->user_id]->fechallegada = $user->fechallegada;
          $all_users_profiles[$user->user_id]->dpais = $user->dpais;
          $all_users_profiles[$user->user_id]->dciudad = $user->dciudad;
          $all_users_profiles[$user->user_id]->nomcent = $user->nomcent;
      }

      return $all_users_profiles;
  }


  public static function getCentersOfMyConsorcium()
  {
      $database = DatabaseFactory::getFactory()->getConnection();
      $codcons = RegistrationModel::getCodConsorcium();



      $sql = "SELECT centros.cod AS cod ,centros.nom AS nom,centros.tel AS tel, centros.fax AS fax, centros.poblacion AS poblacion, centros.cp AS cp,centros.provincia AS provincia,centros.pais AS pais FROM centros,centros_consorcios,consorcios WHERE centros.cod = centros_consorcios.cod_cent AND centros_consorcios.cod_cons = consorcios.cod";
      $query = $database->prepare($sql);
      $query->execute(array(':codcons' => $codcons));

      $all_users_profiles = array();

      foreach ($query->fetchAll() as $center) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($center, 'Filter::XSSFilter');

          $all_users_profiles[$center->cod] = new stdClass();
          $all_users_profiles[$center->cod]->cod = $center->cod;
          $all_users_profiles[$center->cod]->nom = $center->nom;
          $all_users_profiles[$center->cod]->tel = $center->tel;
          $all_users_profiles[$center->cod]->fax = $center->fax;
          $all_users_profiles[$center->cod]->poblacion = $center->poblacion;
          $all_users_profiles[$center->cod]->cp = $center->cp;
          $all_users_profiles[$center->cod]->provincia = $center->provincia;
          $all_users_profiles[$center->cod]->pais = $center->pais;




      }

      return $all_users_profiles;
  }

  public static function getFlowsOfMyConsorcium()
  {
      $database = DatabaseFactory::getFactory()->getConnection();
      $codcons = RegistrationModel::getCodConsorcium();



      $sql = "SELECT flujo.id AS codflujo, flujo.FechaSalida AS fechasalida, flujo.FechaLLegada AS fechallegada, flujo.PaisDestino AS pais, flujo.CiudadDestino AS ciudad FROM flujo WHERE flujo.cod_consorcio = :codcons";
      $query = $database->prepare($sql);
      $query->execute(array(':codcons' => $codcons));

      $all_users_profiles = array();

      foreach ($query->fetchAll() as $flow) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($flow, 'Filter::XSSFilter');

          $all_users_profiles[$flow->codflujo] = new stdClass();
          $all_users_profiles[$flow->codflujo]->codflujo = $flow->codflujo;
          $all_users_profiles[$flow->codflujo]->fechasalida = $flow->fechasalida;
          $all_users_profiles[$flow->codflujo]->fechallegada = $flow->fechallegada;
          $all_users_profiles[$flow->codflujo]->pais = $flow->pais;
          $all_users_profiles[$flow->codflujo]->ciudad = $flow->ciudad;

      }

      return $all_users_profiles;
  }



  public static function getDocumentsOfMyStudentsConsorcium()
  {
      Auth::checkAdminAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();
      $codcons = RegistrationModel::getCodConsorcium();


      $sql = "SELECT users.user_id,personas.nom AS nom, personas.ape AS ape, centros.nom AS nomcent, docs.doc_foto AS personalfoto,docs.doc_dni AS personaldni, personas.dni AS dni FROM users, personas,centros,docs,centros_consorcios,consorcios WHERE users.user_name = personas.dni AND personas.codcent = centros.cod AND docs.dni = personas.dni AND centros.cod = centros_consorcios.cod_cent AND centros_consorcios.cod_cons = consorcios.cod AND consorcios.cod = :codcons";
      $query = $database->prepare($sql);
      $query->execute(array(':codcons' => $codcons));

      $all_users_profiles = array();

      foreach ($query->fetchAll() as $user) {

          // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
          // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
          // the user's values
          array_walk_recursive($user, 'Filter::XSSFilter');

          $all_users_profiles[$user->user_id] = new stdClass();
          $all_users_profiles[$user->user_id]->user_id = $user->user_id;
          $all_users_profiles[$user->user_id]->nom = $user->nom;
          $all_users_profiles[$user->user_id]->ape = $user->ape;
          $all_users_profiles[$user->user_id]->nomcent = $user->nomcent;
          $all_users_profiles[$user->user_id]->personalfoto = $user->personalfoto;
          $all_users_profiles[$user->user_id]->personaldni = $user->personaldni;
          $all_users_profiles[$user->user_id]->dni = $user->dni;
      }

      return $all_users_profiles;
  }







    /**
     * Gets an array that contains all the users in the database. The array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * The avatar line is built using Ternary Operators, have a look here for more:
     * @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
     *
     * @return array The profiles of all users
     */
    public static function getPublicProfilesOfAllUsers()
    {
        Auth::checkAdminAuthentication();
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, user_email, user_active, user_has_avatar, user_deleted,user_account_type, nom, ape FROM users, personas WHERE users.user_name = personas.dni";
        $query = $database->prepare($sql);
        $query->execute();

        $all_users_profiles = array();

        foreach ($query->fetchAll() as $user) {

            // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
            // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
            // the user's values
            array_walk_recursive($user, 'Filter::XSSFilter');

            $all_users_profiles[$user->user_id] = new stdClass();
            $all_users_profiles[$user->user_id]->user_id = $user->user_id;
            $all_users_profiles[$user->user_id]->user_name = $user->user_name;
            $all_users_profiles[$user->user_id]->user_email = $user->user_email;
            $all_users_profiles[$user->user_id]->user_active = $user->user_active;
            $all_users_profiles[$user->user_id]->user_deleted = $user->user_deleted;
            $all_users_profiles[$user->user_id]->user_account_type = $user->user_account_type;
            $all_users_profiles[$user->user_id]->nom = $user->nom;
            $all_users_profiles[$user->user_id]->ape = $user->ape;
            $all_users_profiles[$user->user_id]->user_avatar_link = (Config::get('USE_GRAVATAR') ? AvatarModel::getGravatarLinkByEmail($user->user_email) : AvatarModel::getPublicAvatarFilePathOfUser($user->user_has_avatar, $user->user_id));
        }

        return $all_users_profiles;
    }

    /**
     * Gets a user's profile data, according to the given $user_id
     * @param int $user_id The user's id
     * @return mixed The selected user's profile
     */
    public static function getPublicProfileOfUser($user_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, user_email, user_active, user_has_avatar, user_deleted, nom, ape, fechanac, direccion, telefono, poblacion, cp, provincia, pais
                FROM users, personas WHERE user_id = :user_id AND users.user_name = personas.dni LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        $user = $query->fetch();

        if ($query->rowCount() == 1) {
            if (Config::get('USE_GRAVATAR')) {
                $user->user_avatar_link = AvatarModel::getGravatarLinkByEmail($user->user_email);
            } else {
                $user->user_avatar_link = AvatarModel::getPublicAvatarFilePathOfUser($user->user_has_avatar, $user->user_id);
            }
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_USER_DOES_NOT_EXIST'));
        }

        // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
        // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
        // the user's values
        array_walk_recursive($user, 'Filter::XSSFilter');

        return $user;
    }

    /**
     * @param $user_name_or_email
     *
     * @return mixed
     */
    public static function getUserDataByUserNameOrEmail($user_name_or_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id, user_name, user_email FROM users
                                     WHERE (user_name = :user_name_or_email OR user_email = :user_name_or_email)
                                           AND user_provider_type = :provider_type LIMIT 1");
        $query->execute(array(':user_name_or_email' => $user_name_or_email, ':provider_type' => 'DEFAULT'));

        return $query->fetch();
    }

    /**
     * Checks if a username is already taken
     *
     * @param $user_name string username
     *
     * @return bool
     */
    public static function doesUsernameAlreadyExist($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id FROM users WHERE user_name = :user_name LIMIT 1");
        $query->execute(array(':user_name' => $user_name));
        if ($query->rowCount() == 0) {
            return false;
        }
        return true;
    }

    /**
     * Checks if a email is already used
     *
     * @param $user_email string email
     *
     * @return bool
     */
    public static function doesEmailAlreadyExist($user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id FROM users WHERE user_email = :user_email LIMIT 1");
        $query->execute(array(':user_email' => $user_email));
        if ($query->rowCount() == 0) {
            return false;
        }
        return true;
    }

    /**
     * Writes new username to database
     *
     * @param $user_id int user id
     * @param $new_user_name string new username
     *
     * @return bool
     */
    public static function saveNewUserName($user_id, $new_user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_name = :user_name WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_name' => $new_user_name, ':user_id' => $user_id));
        if ($query->rowCount() == 1) {
            return true;
        }
        return false;
    }

    /**
     * Writes new email address to database
     *
     * @param $user_id int user id
     * @param $new_user_email string new email address
     *
     * @return bool
     */
    public static function saveNewEmailAddress($user_id, $new_user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_email = :user_email WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_email' => $new_user_email, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    /**
     * Edit the user's name, provided in the editing form
     *
     * @param $new_user_name string The new username
     *
     * @return bool success status
     */
    public static function editUserName($new_user_name)
    {
        // new username same as old one ?
        if ($new_user_name == Session::get('user_name')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_user_name)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        // clean the input, strip usernames longer than 64 chars (maybe fix this ?)
        $new_user_name = substr(strip_tags($new_user_name), 0, 64);

        // check if new username already exists
        if (self::doesUsernameAlreadyExist($new_user_name)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_ALREADY_TAKEN'));
            return false;
        }

        $status_of_action = self::saveNewUserName(Session::get('user_id'), $new_user_name);
        if ($status_of_action) {
            Session::set('user_name', $new_user_name);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }

    /**
     * Edit the user's email
     *
     * @param $new_user_email
     *
     * @return bool success status
     */
    public static function editUserEmail($new_user_email)
    {
        // email provided ?
        if (empty($new_user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_FIELD_EMPTY'));
            return false;
        }

        // check if new email is same like the old one
        if ($new_user_email == Session::get('user_email')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_SAME_AS_OLD_ONE'));
            return false;
        }

        // user's email must be in valid email format, also checks the length
        // @see http://stackoverflow.com/questions/21631366/php-filter-validate-email-max-length
        // @see http://stackoverflow.com/questions/386294/what-is-the-maximum-length-of-a-valid-email-address
        if (!filter_var($new_user_email, FILTER_VALIDATE_EMAIL)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        // strip tags, just to be sure
        $new_user_email = substr(strip_tags($new_user_email), 0, 254);

        // check if user's email already exists
        if (self::doesEmailAlreadyExist($new_user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USER_EMAIL_ALREADY_TAKEN'));
            return false;
        }

        // write to database, if successful ...
        // ... then write new email to session, Gravatar too (as this relies to the user's email address)
        if (self::saveNewEmailAddress(Session::get('user_id'), $new_user_email)) {
            Session::set('user_email', $new_user_email);
            Session::set('user_gravatar_image_url', AvatarModel::getGravatarLinkByEmail($new_user_email));
            Session::add('feedback_positive', Text::get('FEEDBACK_EMAIL_CHANGE_SUCCESSFUL'));
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
        return false;
    }

    /**
     * Gets the user's id
     *
     * @param $user_name
     *
     * @return mixed
     */
    public static function getUserIdByUsername($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id FROM users WHERE user_name = :user_name AND user_provider_type = :provider_type LIMIT 1";
        $query = $database->prepare($sql);

        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $query->execute(array(':user_name' => $user_name, ':provider_type' => 'DEFAULT'));

        // return one row (we only have one result or nothing)
        return $query->fetch()->user_id;
    }

    /**
     * Gets the user's data
     *
     * @param $user_name string User's name
     *
     * @return mixed Returns false if user does not exist, returns object with user's data when user exists
     */
    public static function getUserDataByUsername($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, user_email, user_password_hash, user_active,user_deleted, user_suspension_timestamp, user_account_type,
                       user_failed_logins, user_last_failed_login, personas.nom AS nom, personas.ape AS ape
                  FROM users,personas
                 WHERE (user_name = :user_name OR user_email = :user_name)
                       AND user_provider_type = :provider_type AND personas.dni = users.user_name
                 LIMIT 1";
        $query = $database->prepare($sql);

        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $query->execute(array(':user_name' => $user_name, ':provider_type' => 'DEFAULT'));

        // return one row (we only have one result or nothing)
        return $query->fetch();
    }

    /**
     * Gets the user's data by user's id and a token (used by login-via-cookie process)
     *
     * @param $user_id
     * @param $token
     *
     * @return mixed Returns false if user does not exist, returns object with user's data when user exists
     */
    public static function getUserDataByUserIdAndToken($user_id, $token)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        // get real token from database (and all other data)
        $query = $database->prepare("SELECT user_id, user_name, user_email, user_password_hash, user_active,
                                          user_account_type,  user_has_avatar, user_failed_logins, user_last_failed_login
                                     FROM users
                                     WHERE user_id = :user_id
                                       AND user_remember_me_token = :user_remember_me_token
                                       AND user_remember_me_token IS NOT NULL
                                       AND user_provider_type = :provider_type LIMIT 1");
        $query->execute(array(':user_id' => $user_id, ':user_remember_me_token' => $token, ':provider_type' => 'DEFAULT'));

        // return one row (we only have one result or nothing)
        return $query->fetch();
    }

    public static function updateProfile()
    {
      $userRealName = Request::post('real_name');
      $userRealSurName = Request::post('surname');
      $userTelephone = Request::post('telephone');
      $userAdress = Request::post('adress');
      $userCity = Request::post('city');
      $userPC = Request::post('pc');
      $userProvince = Request::post('province');
      $userCountry = Request::post('country');
      $userBirthDate = Request::post('birthday');
      $myself = Session::get('user_name');


      $database = DatabaseFactory::getFactory()->getConnection();

      $query = $database->prepare("UPDATE personas SET nom = :nom, ape = :ape, telefono = :telef,direccion = :direc, poblacion = :pobla, cp = :pc, provincia = :provi, pais = :pais, fechanac = :birth WHERE personas.dni = :userdni;");
      $status = $query->execute(array(
        ':userdni' => $myself,
        ':nom' => $userRealName,
        ':ape' => $userRealSurName,
        ':telef' => $userTelephone,
        ':direc' => $userAdress,
        ':pobla' => $userCity,
        ':pc' => $userPC,
        ':provi' => $userProvince,
        ':pais' => $userCountry,
        ':birth' => $userBirthDate
      ));

if ($status) {
  return true;
} else {
  return false;
}

    }
  }
