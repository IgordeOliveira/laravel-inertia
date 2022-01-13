<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;


        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'number',
        'customer_id',
        'status',
        'created_at',
    ];


    function customer() {
        return $this->belongsTo('Customer', 'id');
    }

}
