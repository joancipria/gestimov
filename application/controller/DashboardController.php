<?php

/**
 * This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
 */
class DashboardController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // this entire controller should only be visible/usable by logged in users, so we put authentication-check here
        Auth::checkAuthentication();
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    public function index()
    {
      $this->View->render('dashboard/index',null,'sidenavbar','dashboardfooter');
    }

    public function documents()
    {
      Auth::checkNoStudentAuthentication();
      if (Session::get("user_account_type") >= 7) {
        Auth::checkAdminAuthentication();
        $this->View->render('dashboard/documents', array(
                'users' => UserModel::getDocumentsOfMyStudentsConsorcium()),'sidenavbar','dashboardfooter'
        );
      }
      if (Session::get("user_account_type") == 2){
        Auth::checkTeacherAuthentication();
        $this->View->render('dashboard/documents', array(
                'users' => UserModel::getDocumentsOfMyStudents()),'sidenavbar','dashboardfooter'
        );
      }

    }

    public function mydocuments()
    {
      $this->View->render('dashboard/mydocuments',null,'sidenavbar','dashboardfooter');

    }

    public function students()
    {
      Auth::checkTeacherAuthentication();
      $this->View->render('dashboard/students', array(
              'users' => UserModel::getPublicProfilesOfMyStudents()),'sidenavbar','dashboardfooter'
      );
    }

    public function users()
    {
        Auth::checkAdminAuthentication();
        $this->View->render('dashboard/users', array(
                'users' => UserModel::getPublicProfilesOfAllUsers()),'sidenavbar','dashboardfooter'
        );
    }

    public function mobilities()
    {
      Auth::checkNoStudentAuthentication();
      if (Session::get("user_account_type") >= 7) {
        Auth::checkAdminAuthentication();
        $this->View->render('dashboard/mobilities', array(
                'users' => UserModel::getMobilitiesOfMyStudentsConsorcium()),'sidenavbar','dashboardfooter'
        );
      }
      if (Session::get("user_account_type") == 2){
        Auth::checkTeacherAuthentication();
        $this->View->render('dashboard/mobilities', array(
                'users' => UserModel::getMobilitiesOfMyStudents()),'sidenavbar','dashboardfooter'
        );
      }
    }

    public function centers()
    {
      Auth::checkNoStudentAuthentication();
      $this->View->render('dashboard/centers', array(
              'users' => UserModel::getCentersOfMyConsorcium()),'sidenavbar','dashboardfooter'
      );    }

    public function flows()
    {
      Auth::checkAdminAuthentication();
      $this->View->render('dashboard/flows',null,'sidenavbar','dashboardfooter');
    }

    public function showProfile($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('dashboard/showProfile', array(
                'user' => UserModel::getPublicProfileOfUser($user_id))
            ,'sidenavbar','dashboardfooter');
        } else {
            Redirect::home();
        }
    }

    public function editProfile()
    {
      $user_id = session::get('user_id');
      if (isset($user_id)) {
          $this->View->render('dashboard/editProfile',array(
              'user' => UserModel::getPublicProfileOfUser($user_id)),'sidenavbar','dashboardfooter');

      } else {
          Redirect::home();
      }
    }

    public function upload_action()
    {
        $registration_successful = DocsModel::uploadFile();

        if ($registration_successful) {
            Redirect::to('dashboard/mydocuments');
        } else {
            Redirect::to('dashboard/mydocuments');
        }
    }
}
