<?php

namespace Domain\SalesRepresentatives\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\SalesRepresentativeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\SalesRepresentatives\QueryBuilders\SalesRepresentativeBuilder;

class SalesRepresentative extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const ROUTES = [
      'barnes_place' => 'Barnes Place',
      'rosmid_place' => 'Rosmid Place',
      'cambridge_place' => 'Cambridge Place',
      'gregory_road' => 'Gregory Road',
    ];

    protected static function newFactory(): SalesRepresentativeFactory
    {
        return SalesRepresentativeFactory::new();
    }

    public function newEloquentBuilder($query): SalesRepresentativeBuilder
    {
        return new SalesRepresentativeBuilder($query);
    }
}
