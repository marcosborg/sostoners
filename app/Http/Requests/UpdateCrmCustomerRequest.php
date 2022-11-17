<?php

namespace App\Http\Requests;

use App\Models\CrmCustomer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCrmCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_customer_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'company' => [
                'string',
                'max:255',
                'nullable',
            ],
            'vat' => [
                'string',
                'max:255',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'phone_2' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'max:255',
                'nullable',
            ],
            'location' => [
                'string',
                'max:255',
                'nullable',
            ],
            'country' => [
                'string',
                'max:255',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
        ];
    }
}
