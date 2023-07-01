<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasking extends Model
{
    use HasFactory;

    protected $table = 'taskings';

    protected $primaryKey = 'tasking_id';

    protected $fillable = [
        'tasking_id',
        'tasking',
        'date',
        'status',
    ];

    public $timestamps = true;
}
