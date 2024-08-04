<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $table = 'blog';
    
    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.id_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(30);
    }
}
