<?php

namespace App\Http\Requests;

use App\Models\Repair;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRepairRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('repair_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'crm_customer_id' => [
                'required',
                'integer',
            ],
            'start_datetime' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_datetime' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'type_id' => [
                'required',
                'integer',
            ],
            'brand_id' => [
                'required',
                'integer',
            ],
            'model' => [
                'string',
                'max:255',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'photos' => [
                'array',
            ],
            'products.*' => [
                'integer',
            ],
            'products' => [
                'array',
            ],
        ];
    }
}
