<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRepresentativeRequest;
use Domain\SalesRepresentatives\Models\SalesRepresentative;
use Domain\SalesRepresentatives\Actions\CreateSalesRepresentativeAction;
use Domain\SalesRepresentatives\Actions\DeleteSalesRepresentativeAction;
use Domain\SalesRepresentatives\Actions\UpdateSalesRepresentativeAction;

class SalesRepresentativeController extends Controller
{
    /**
     * Stores Sales Representative.
     *
     * @param StoreSalesRepresentativeRequest $request
     * @param CreateSalesRepresentativeAction $createSalesRepresentativeAction
     */
    public function store(
        StoreSalesRepresentativeRequest $request,
        CreateSalesRepresentativeAction $createSalesRepresentativeAction
    ) {
        $createSalesRepresentativeAction->execute($request->toSalesRepresentativeData());
    }

    /**
     * Updates Sales Representative.
     *
     * @param SalesRepresentative $salesRepresentative
     * @param StoreSalesRepresentativeRequest $request
     * @param UpdateSalesRepresentativeAction $updateSalesRepresentativeAction
     */
    public function update(
        SalesRepresentative $salesRepresentative,
        StoreSalesRepresentativeRequest $request,
        UpdateSalesRepresentativeAction $updateSalesRepresentativeAction,
    ) {
        $updateSalesRepresentativeAction->execute(
            $salesRepresentative,
            $request->toSalesRepresentativeData()
        );
    }

    /**
     * Remove Sales Representative.
     *
     * @param SalesRepresentative $salesRepresentative
     * @param DeleteSalesRepresentativeAction $deleteSalesRepresentativeAction
     */
    public function destroy(
        SalesRepresentative $salesRepresentative,
        DeleteSalesRepresentativeAction $deleteSalesRepresentativeAction
    ) {
        $deleteSalesRepresentativeAction->execute($salesRepresentative);
    }
}
