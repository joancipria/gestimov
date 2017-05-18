<?php


class FlowsModel
{


  public static function registerNewFlow()
  {
      Auth::checkAdminAuthentication();
      $flowLeaveDate = Request::post('leave_date');
      $flowArriveDate = Request::post('arrive_date');
      $flowCountry = Request::post('country');
      $flowCity = Request::post('city');
      $codCons = RegistrationModel::getCodConsorcium();


      $database = DatabaseFactory::getFactory()->getConnection();

      $query = $database->prepare("INSERT INTO flujo (FechaSalida, FechaLlegada, PaisDestino, CiudadDestino,cod_consorcio) VALUES (:fechasalida,:fechallegada,:pais,:ciudad,:codcons);");
      $status = $query->execute(array(
        ':fechasalida' => $flowLeaveDate,
        ':fechallegada' => $flowArriveDate,
        ':pais' => $flowCountry,
        ':ciudad' => $flowCity,
        ':codcons' => $codCons
      ));

      if ($status) {
        return true;
      } else {
        return false;
      }
  }

  public static function removeFlow($flowId)
  {
      Auth::checkAdminAuthentication();
      $database = DatabaseFactory::getFactory()->getConnection();

      $query = $database->prepare("DELETE FROM flujo WHERE flujo.id=:flowid;");
      $status = $query->execute(array(':flowid' => $flowId)) or die(print_r($query->errorInfo(), true));

      if ($status) {
        return true;
      } else {
        return false;
      }
  }
}
