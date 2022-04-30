<?php

namespace Domain\SalesRepresentatives\Actions;

use Illuminate\Database\Eloquent\Model;
use Domain\SalesRepresentatives\Models\SalesRepresentative;
use Domain\SalesRepresentatives\DataTransferObjects\SalesRepresentativeData;

class DeleteSalesRepresentativeAction
{
    public function execute(SalesRepresentative $salesRepresentative): bool
    {
        return $salesRepresentative->delete();
    }
}
