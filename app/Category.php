<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Category extends Model
{

    protected $fillable = [
        'title'
    ];

    public static $rules = array(
      'title' => 'required'
    );

    protected function validator(array $data)
    {
        return Validator::make($data, static::$rules);
    }
    public function saveCategory(array $data){
      if(!empty($data['title'])){
        $category = new Category();
        $category->title = $data['title'];
        $category->save();
      }
    }

}
