<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Objects\UserBaseModel;
use App\Models\Admins\AdminUserModel;
use App\Models\Admins\AddingUserModel;
use App\Http\Requests\AdminUserFormRequest;
class AdminUserController extends Controller
{
    public function __construct() {
    	//
    }
    //
    public function index() {
    	$adminUser = new AdminUserModel();
    	$adminUser->init();
    	$usersList = $adminUser->usersList;
        $stringList = json_encode($usersList);
        //return action('AdminUserController@index');
        echo $stringList;
    }
    //
    public function addUser(AdminUserFormRequest $request) {       
         $data = $request->input('newUser');
         echo $data;
        // $newUser = json_decode($data);
        // echo $newUser;
        // //get JSON data from view post method
        // //$userString = getInputData();
        // $userString = '';
        // $newUser = new AddingUserModel();
        // $newUser->init($tmpUser);
        // $newUser->update2Db();
        // return view('Admins/AddUserPopUp');
    }
}
