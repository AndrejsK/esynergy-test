<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Auditable
{
    // using laravel-auditing library
    use \OwenIt\Auditing\Auditable;

    use HasFactory;

    protected $table = 'product';

    // Required for the seeder to use mass assignment
    protected $fillable = ['name', 'amount', 'price'];
}
