<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function control()
    {
        return $this->belongsTo(Control::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
