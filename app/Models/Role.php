<?php

namespace App\Models;

use App\Traits\UseUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, UseUuidAsPrimaryKey;
}
