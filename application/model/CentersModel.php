<?php


class CentersModel
{


  public static function registerNewCenter()
  {
      Auth::checkAdminAuthentication();
      $centerCod = Request::post('cod_center');
      $centerName = Request::post('name_center');
      $centerAdress = Request::post('adress_center');
      $centerCity = Request::post('city_center');
      $centerPc = Request::post('pc_center');
      $centerProvince = Request::post('province_center');
      $centerCountry = Request::post('country_center');
      $centerTel = Request::post('tel_center');
      $centerFax = Request::post('fax_center');
      $codCons = RegistrationModel::getCodConsorcium();


      $database = DatabaseFactory::getFactory()->getConnection();

      $query = $database->prepare("INSERT INTO centros VALUES (:cod, :name, :adress, :city,:cp,:province,:country,:tel,:fax);");
      $status2 = $query->execute(array(
        ':cod' => $centerCod,
        ':name' => $centerName,
        ':adress' => $centerAdress,
        ':city' => $centerCity,
        ':cp' => $centerPc,
        ':province' => $centerProvince,
        ':country' => $centerCountry,
        ':tel' => $centerTel,
        ':fax' => $centerFax
      ));

      $query = $database->prepare("INSERT INTO centros_consorcios (cod_cent, cod_cons) VALUES (:codcent,:codcons)");
      $status = $query->execute(array(
        ':codcent' => $centerCod,
        ':codcons' => $codCons
      ));

      if ($status && $status2) {
        return true;
      } else {
        return false;
      }
  }

  public static function removeCenter($centerCod)
  {
      Auth::checkAdminAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();

      $query = $database->prepare("DELETE FROM centros_consorcios WHERE cod_cent=:codcent;");
      $status = $query->execute(array(':codcent' => $centerCod));

      $query = $database->prepare("DELETE FROM centros WHERE cod=:codcent;");
      $status2 = $query->execute(array(':codcent' => $centerCod));

      if ($status && $status2) {
        return true;
      } else {
        return false;
      }

  }
}
