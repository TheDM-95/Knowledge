<?php

namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class PaswordResetBaseModel extends Model
{
    //
   public $email;
   public $token;
   public $created_at;
    //
    public function __construct() {
       //
    }
    //
    public function init($email, $token) {
    	$this->email = $email;
        $this->token = $token;
    }
}
