<?php

namespace Domain\SalesRepresentatives\DataTransferObjects;

use Illuminate\Support\Carbon;

class SalesRepresentativeData
{
    public function __construct(
        readonly string $fullName,
        readonly string $email,
        readonly string $telephone,
        readonly Carbon $joinedDate,
        readonly string $route,
        readonly string|null $comments = null,
    ) {
    }
}
