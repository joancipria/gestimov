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
      Auth::checkAdminAuthentication();
      $this->View->render('dashboard/documents', array(
              'users' => UserModel::getDocumentsOfAllUsers()),'sidenavbar','dashboardfooter'
      );
    }

    public function mydocuments()
    {
      $this->View->render('dashboard/mydocuments',null,'sidenavbar','dashboardfooter');
    }

    public function students()
    {
      $this->View->render('dashboard/students',null,'sidenavbar','dashboardfooter');
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
      Auth::checkAdminAuthentication();
      $this->View->render('dashboard/mobilities',null,'sidenavbar','dashboardfooter');
    }

    public function centers()
    {
      Auth::checkAdminAuthentication();
      $this->View->render('dashboard/centers',null,'sidenavbar','dashboardfooter');
    }

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
}
