<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use App\Http\Requests\StoreSalesRepresentativeRequest;
use Domain\SalesRepresentatives\Models\SalesRepresentative;
use Domain\SalesRepresentatives\Actions\CreateSalesRepresentativeAction;
use Domain\SalesRepresentatives\Actions\DeleteSalesRepresentativeAction;
use Domain\SalesRepresentatives\Actions\UpdateSalesRepresentativeAction;

class SalesRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $salesRepresentatives = SalesRepresentative::all();

        return view('sales-representatives.index', compact('salesRepresentatives'));
    }

    /**
     * Create Sales Representative.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('sales-representatives.create', [
            'routes' => SalesRepresentative::ROUTES,
        ]);
    }

    /**
     * Stores Sales Representative.
     *
     * @param StoreSalesRepresentativeRequest $request
     * @param CreateSalesRepresentativeAction $createSalesRepresentativeAction
     * @return RedirectResponse
     */
    public function store(
        StoreSalesRepresentativeRequest $request,
        CreateSalesRepresentativeAction $createSalesRepresentativeAction
    ) {
        $createSalesRepresentativeAction->execute($request->toSalesRepresentativeData());

        return $this->redirectToIndex();
    }

    /**
     * Show Sales Representative.
     *
     * @param SalesRepresentative $salesRepresentative
     * @return Application|Factory|View
     */
    public function show(SalesRepresentative $salesRepresentative): Application|Factory|View
    {
        $route = SalesRepresentative::ROUTES[$salesRepresentative->route];

        return view('sales-representatives.show', compact('salesRepresentative', 'route'));
    }

    /**
     * Edit Sales Representative.
     *
     * @param SalesRepresentative $salesRepresentative
     * @return Application|Factory|View
     */
    public function edit(SalesRepresentative $salesRepresentative): Application|Factory|View
    {
        //TODO To be implemented
    }

    /**
     * Updates Sales Representative.
     *
     * @param SalesRepresentative $salesRepresentative
     * @param StoreSalesRepresentativeRequest $request
     * @param UpdateSalesRepresentativeAction $updateSalesRepresentativeAction
     * @return RedirectResponse
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

        return $this->redirectToIndex();
    }

    /**
     * Remove Sales Representative.
     *
     * @param SalesRepresentative $salesRepresentative
     * @param DeleteSalesRepresentativeAction $deleteSalesRepresentativeAction
     * @return RedirectResponse
     */
    public function destroy(
        SalesRepresentative $salesRepresentative,
        DeleteSalesRepresentativeAction $deleteSalesRepresentativeAction
    ) {
        $deleteSalesRepresentativeAction->execute($salesRepresentative);

        return $this->redirectToIndex();
    }

    protected function redirectToIndex(): RedirectResponse
    {
        return redirect()->route('sales-representatives.index');
    }
}
