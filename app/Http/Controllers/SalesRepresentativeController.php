<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRepresentativeRequest;
use Domain\SalesRepresentatives\Models\SalesRepresentative;
use Domain\SalesRepresentatives\Actions\CreateSalesRepresentativeAction;
use Domain\SalesRepresentatives\Actions\DeleteSalesRepresentativeAction;
use Domain\SalesRepresentatives\Actions\UpdateSalesRepresentativeAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class SalesRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('sales-representatives.index');
    }

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
