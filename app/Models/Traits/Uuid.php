<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid as RamseyUuid;

trait Uuid
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->id = RamseyUuid::uuid4()->toString();
        });
    }
}
