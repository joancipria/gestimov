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
      Auth::checkNoStudentAuthentication();
      if (Session::get("user_account_type") >= 7) {
        Auth::checkAdminAuthentication();
        $this->View->render('dashboard/students', array(
                'users' => UserModel::getPublicProfilesOfMyStudentsConsorcium()),'sidenavbar','dashboardfooter'
        );
      }
      if (Session::get("user_account_type") == 2){
        Auth::checkTeacherAuthentication();
        $this->View->render('dashboard/students', array(
                'users' => UserModel::getPublicProfilesOfMyStudents()),'sidenavbar','dashboardfooter'
        );
      }
    }

    public function users()
    {
        Auth::checkAdminAuthentication();
        $this->View->render('dashboard/users', array(
                'users' => UserModel::getPublicProfilesOfAllUsers(),'centers' => UserModel::getCentersOfMyConsorcium()),'sidenavbar','dashboardfooter'
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
      $this->View->render('dashboard/flows', array(
              'flows' => UserModel::getFlowsOfMyConsorcium(),'users' => UserModel::getMobilitiesOfMyStudentsConsorcium()),'sidenavbar','dashboardfooter'
      );    }

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
        $registration_successful = DocsModel::uploadFile(Request::post('document'));

        if ($registration_successful) {
            Redirect::to('dashboard/mydocuments');
        } else {
            Redirect::to('dashboard/mydocuments');
        }
    }

    public function viewDoc()
    {
      Auth::checkNoStudentAuthentication();
      $this->View->render('dashboard/viewDoc');
    }

    /**
     * Perform the account-type changing
     * POST-request
     */
    public function changeUserRole_action()
    {
        Auth::checkAdminAuthentication();
        if (Request::post('user_account_upgrade')) {
            // "2" is quick & dirty account type 2, something like "premium user" maybe. you got the idea :)
            UserRoleModel::changeUserRole(2,Request::post('user_id'));
        }

        if (Request::post('user_account_downgrade')) {
            // "1" is quick & dirty account type 1, something like "basic user" maybe.
            UserRoleModel::changeUserRole(1,Request::post('user_id'));
        }

        Redirect::to('dashboard/users');
    }

    public function register_center_action()
    {
      Auth::checkAdminAuthentication();
        $registration_successful = CentersModel::registerNewCenter();

        if ($registration_successful) {
            Redirect::to('dashboard/centers');
            Session::add('feedback_positive', 'Center Added');
        } else {
            Redirect::to('dashboard/centers');
            Session::add('feedback_negative', 'Error when adding');
        }
    }

    public function remove_center_action($codcenter)
    {
      Auth::checkAdminAuthentication();
        $registration_successful = CentersModel::removeCenter($codcenter);

        if ($registration_successful) {
            Redirect::to('dashboard/centers');
            Session::add('feedback_positive', 'Center Removed');
        } else {
            Redirect::to('dashboard/centers');
            Session::add('feedback_negative', 'Error when removing center');
        }
    }

    public function register_flow_action()
    {
      Auth::checkAdminAuthentication();
        $registration_successful = FlowsModel::registerNewFlow();

        if ($registration_successful) {
            Redirect::to('dashboard/flows');
            Session::add('feedback_positive', 'Flow Added');
        } else {
            Redirect::to('dashboard/flows');
            Session::add('feedback_negative', 'Error when adding flow');
        }
    }

    public function remove_flow_action($flowId)
    {
      Auth::checkAdminAuthentication();
        $registration_successful = FlowsModel::removeFlow($flowId);

        if ($registration_successful) {
            Redirect::to('dashboard/flows');
            Session::add('feedback_positive', 'Flow Removed');
        } else {
            Redirect::to('dashboard/flows');
            Session::add('feedback_negative', 'Error when removing');
        }
    }

    public function editProfile_action()
    {
      Auth::checkAdminAuthentication();
        $registration_successful = UserModel::updateProfile();

        if ($registration_successful) {
            Redirect::to('dashboard/editProfile');
            Session::add('feedback_positive', 'Profile updated');
        } else {
            Redirect::to('dashboard/editProfile');
            Session::add('feedback_negative', 'Error while updating profile');
        }
    }
}
