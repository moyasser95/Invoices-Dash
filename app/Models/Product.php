<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
   protected  $fillable = [ 'Product_name', 'section_id','description'];

    public function section() {
        return $this->hasMany(Section::class,'id', 'section_id');
    }
}
