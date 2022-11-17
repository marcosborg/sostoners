<?php

namespace App\Http\Requests;

use App\Models\Asset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_edit');
    }

    public function rules()
    {
        return [
            'serial_number' => [
                'string',
                'max:255',
                'nullable',
            ],
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'photos' => [
                'array',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
            'offers' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }
}
