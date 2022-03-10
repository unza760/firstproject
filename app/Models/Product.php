<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'image', 'category_id']; 
      public function task() {
      return $this->belongsTo(Task::class,'category_id'); 
    }
}
