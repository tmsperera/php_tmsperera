<?php

namespace Domain\SalesRepresentatives\Actions;

use Illuminate\Database\Eloquent\Model;
use Domain\SalesRepresentatives\Models\SalesRepresentative;
use Domain\SalesRepresentatives\DataTransferObjects\SalesRepresentativeData;

class CreateSalesRepresentativeAction
{
    public function execute(SalesRepresentativeData $salesRepresentativeData): SalesRepresentative|Model
    {
        return SalesRepresentative::query()->create([
            'full_name' => $salesRepresentativeData->fullName,
            'email' => $salesRepresentativeData->email,
            'telephone' => $salesRepresentativeData->telephone,
            'joined_date' => $salesRepresentativeData->joinedDate,
            'route' => $salesRepresentativeData->route,
            'comments' => $salesRepresentativeData->comments,
        ]);
    }
}
