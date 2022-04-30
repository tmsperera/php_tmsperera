<?php

namespace Tests\Feature\SalesManager;

use Tests\TestCase;
use Illuminate\Support\Arr;
use Domain\SalesRepresentatives\Models\SalesRepresentative;

class UpdateSalesRepresentativeTest extends TestCase
{
    protected array $validRequestData;

    protected SalesRepresentative $salesRepresentative;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validRequestData = [
            'full_name' => 'Mahesh Perera',
            'email' => 'tmsperera@gmail.com',
            'telephone' => '0771793633',
            'joined_date' => '2022-04-30',
            'route' => SalesRepresentative::ROUTES['barnes_place'],
            'comments' => 'Test Comment',
        ];

        $this->salesRepresentative = SalesRepresentative::factory()->create();
    }

    /** @test */
    public function when_valid_data_provided()
    {
        $response = $this->put(
            route('sales-representatives.update', $this->salesRepresentative),
            $this->validRequestData
        );

        $response->assertOk();
        $this->assertDatabaseHas('sales_representatives', $this->validRequestData);
    }

    /** @test */
    public function when_name_not_provided()
    {
        $this->assertAbsenceThrowsValidationErrors('full_name');
    }

    /** @test */
    public function when_email_not_provided()
    {
        $this->assertAbsenceThrowsValidationErrors('email');
    }

    /** @test */
    public function when_invalid_email_provided()
    {
        $this->assertInvalidDataThrowsValidationErrors('email', 'invalid_email');
    }

    /** @test */
    public function when_telephone_not_provided()
    {
        $this->assertAbsenceThrowsValidationErrors('telephone');
    }

    /** @test */
    public function when_joined_date_not_provided()
    {
        $this->assertAbsenceThrowsValidationErrors('joined_date');
    }

    /** @test */
    public function when_invalid_joined_date_provided()
    {
        $this->assertInvalidDataThrowsValidationErrors('joined_date', 'invalid_date');
    }

    /** @test */
    public function when_route_not_provided()
    {
        $this->assertAbsenceThrowsValidationErrors('route');
    }

    /** @test */
    public function when_invalid_route_provided()
    {
        $this->assertInvalidDataThrowsValidationErrors('route', 'invalid_route_key');
    }

    protected function assertAbsenceThrowsValidationErrors(string $absenceValueKey)
    {
        $response = $this->put(
            route('sales-representatives.update', $this->salesRepresentative),
            Arr::except($this->validRequestData, $absenceValueKey)
        );

        $response->assertSessionHasErrors($absenceValueKey);
        $this->assertDatabaseCount('sales_representatives', 1);
        $this->assertNotUpdated($this->salesRepresentative);
    }

    protected function assertInvalidDataThrowsValidationErrors(string $field, mixed $value)
    {
        $response = $this->put(
            route('sales-representatives.update', $this->salesRepresentative),
            [
                ...$this->validRequestData,
                $field => $value,
            ]
        );

        $response->assertSessionHasErrors($field);
        $this->assertDatabaseCount('sales_representatives', 1);
        $this->assertNotUpdated($this->salesRepresentative);
    }

    protected function assertNotUpdated(SalesRepresentative $salesRepresentative)
    {
        $this->assertDatabaseHas('sales_representatives', $salesRepresentative->toArray());
    }
}
