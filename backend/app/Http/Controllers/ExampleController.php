<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;
use App\Model\Trees;

class ExampleController extends Controller
{/**
     * @var \Tymon\JWTAuth\JWTAuth
     */
  
  public function getDirectory_list($parent = 0, $tree_array = '')
    {
        $results = DB::select("SELECT `id`, `name`, `parent_id` FROM `trees` WHERE 1 AND `parent_id` = $parent ORDER BY id ASC");
     if (!is_array($tree_array))
      $tree_array = array();

      if (count($results) > 0) {
         $tree_array[] = "<ul>";
          foreach ($results as $result)
            {
              $tree_array[] = "<li>". $result->name."<a href='#' onclick='createNew($result->id)' data-toggle='modal' data-target='#exampleModal'> +</a></li>";
              $tree_array = $this->getDirectory_list($result->id, $tree_array);
            }
        $tree_array[] = "</ul>";
       }
       return $tree_array; 
    }


    public function addFile(Request $R)
    {
        $data = $R->all();
        $input['name'] = $data['name'];
        $input['parent_id'] = $data['parent_id'];
        $tree = Trees::create($input);
        return ['status'=>true,'message'=>'directory added'];
    }
}
