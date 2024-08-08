<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brands";

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function menus()
    {
        return $this->hasMany(BrandMenu::class);
    }
}
