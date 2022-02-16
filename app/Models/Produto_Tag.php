<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto_Tag extends Model
{
    protected $table = 'produto_tag';
    
    protected $fillable = [
        'produto_id',
        'tag_id',
    ]; 
}
