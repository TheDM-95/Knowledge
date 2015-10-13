<?php

namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class CategoryBaseModel extends Model
{
    //
    public $cat_id;
    public $cat_name;
    public $created_at;
    public $updated_at;
    //
    public function __construct() {
        //
    }
    //
    public function init($cat_id, $cate_name) {
        $this->cat_id = $cat_id;
        $this->cat_name = $cat_name;
    }
}
