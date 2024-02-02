<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'manager_id',
    ];

    public function manager(): HasOne
    {
        return $this->hasOne(Manager::class);
    }
}