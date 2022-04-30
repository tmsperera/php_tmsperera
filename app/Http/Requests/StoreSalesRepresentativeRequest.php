<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Domain\SalesRepresentatives\Models\SalesRepresentative;
use Domain\SalesRepresentatives\DataTransferObjects\SalesRepresentativeData;

class StoreSalesRepresentativeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => ['required', 'unique:sales_representatives,full_name'],
            'email' => ['required', 'email'],
            'telephone' => ['required'],
            'joined_date' => ['required', 'date'],
            'route' => [
                'required',
                Rule::in(array_keys(SalesRepresentative::ROUTES)),
            ],
            'comments' => ['nullable'],
        ];
    }

    public function toSalesRepresentativeData(): SalesRepresentativeData
    {
        return new SalesRepresentativeData(
            fullName: $this->input('full_name'),
            email: $this->input('email'),
            telephone: $this->input('telephone'),
            joinedDate: Carbon::parse($this->input('joined_date')),
            route: $this->input('route'),
            comments: $this->input('comments'),
        );
    }
}
