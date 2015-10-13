<?php

namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;


class UserBaseModel extends Model
{
    public $user_id;
    public $name;
    public $email;
    public $user_name;
    public $password;
    public $is_active;
    public $score;
    public $gender;
    public $avatar;
    public $remember_token;
    public $created_at;
    public $updated_at;
    //
    public function init($id, $name, $email, $user_name, $password, $is_active, $score, $gender, $avatar) {
    	$this->user_id = $id;
    	$this->name = $name;
    	$this->email = $email;
        $this->user_name = $user_name;
    	$this->password = $password;
        $this->is_active = $is_active;
        $this->score = $score;
        $this->gender = $gender;
        $this->avatar = $avatar;
    }
}
