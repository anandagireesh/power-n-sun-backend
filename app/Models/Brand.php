<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Brand extends Model
{
    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }
}
