<?php

namespace Tests\Feature\SalesManager;

use Tests\TestCase;
use Illuminate\Support\Arr;
use Domain\SalesRepresentatives\Models\SalesRepresentative;

class DeleteSalesRepresentativeTest extends TestCase
{
    /** @test */
    public function when_deleting()
    {
        $salesRepresentative = SalesRepresentative::factory()->create();
        $this->assertDatabaseCount('sales_representatives', 1);

        $response = $this->delete(route('sales-representatives.destroy', $salesRepresentative));

        $response->assertRedirect(route('sales-representatives.index'));
        $this->assertDatabaseCount('sales_representatives', 0);
    }
}
