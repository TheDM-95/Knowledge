<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Model;
use App\Models\Objects\UserBaseModel;
use DB;
//
class AdminUserModel extends Model
{
	public $usersList;
    public function __construct() {
    	//
    }
    //
    public function init() {
    	$this->usersList = DB::table('users')->select('user_id', 'name', 'email', 'user_name', 'is_active', 'score', 'gender', 'created_at')->get();
    }
}
