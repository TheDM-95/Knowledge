<?php

namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class QuestionBaseModel extends Model
{
    //
    public $question_id;
    public $content;
    public $cat_id;
    public $is_active;
    public $level;
    public $image;
    public $created_at;
    public $updated_at;
    public $answer_list;
    //
    public function __construct() {
        $this->answer_list = array();
    }
    //
    public function init($id, $content, $cat_id, $is_active, $level, $image) {
    	$this->question_id = $id;
    	$this->content = $content;
    	$this->cat_id = $cat_id;
        $this->is_active = $is_active;
    	$this->level = $level;
        $this->image = $image;
    }
}
