<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'firstName',
        'lastName'
    ];

    protected $appends = [
        'fullName'
    ];

    public function getFullNameAttribute(): ?string
    {

        $fullName = [];

        if ($this->firstName) {
            $fullName[] = $this->firstName;
        }

        if ($this->lastName) {
            $fullName[] = $this->lastName;
        }

        return $fullName ? implode(', ', $fullName) : null;

    }

}