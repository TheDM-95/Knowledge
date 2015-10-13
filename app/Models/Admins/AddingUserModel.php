<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Model;
use App\Models\Objects\UserBaseModel;
use DB;

class AddingUserModel extends Model
{
    //
    public $addingUser;
    //
    public function __construct() {
    	$this->addingUser = new UserBaseModel();
    	//
    }
    //
    public function init($tmpUser) {
    	$this->addingUser = $tmpUser;
    	$result = DB::table('users')->where('user_id', DB::raw("(select max(`user_id`) from users)"))->select('user_id')->get();
		$maxId = intval($result[0]->user_id);
		if(count($result) > 0)
		{
			$this->addingUser->user_id = $maxId + 1;
		}
		else{
			$this->addingUser->user_id = 1;
		}
    }
    //
    public function update2Db() {
    	$timeFomat = "Y/m/d";
		$time = time();
		$date = date($timeFomat, $time);
		$this->addingUser->created_at = $date;
		$newUser = array(
				'user_id' => $this->addingUser->user_id,
				'name' => $this->addingUser->name,
				'email' => $this->addingUser->email,
				'user_name' => $this->addingUser->user_name,
				'password' => $this->addingUser->password,
				'created_at' => $this->addingUser->created_at,
				'updated_at'=> $this->addingUser->updated_at,
				'is_active' =>$this->addingUser->is_active,
				'score' => $this->addingUser->score,
				'gender' => $this->addingUser->gender,
				'avatar' => $this->addingUser->avatar,
				'remember_token' => $this->addingUser->remember_token
		);
		//
		DB::table('users')->insert($newUser);
		return 1;
    }
}
