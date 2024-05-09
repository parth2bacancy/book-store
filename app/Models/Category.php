<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'description',
        'cover',
        'status',
    ];

    public function getRouteKey(){
        return $this->id;
    }

    protected function uuid(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => (string) str()->uuid(),
        );
    }

}
