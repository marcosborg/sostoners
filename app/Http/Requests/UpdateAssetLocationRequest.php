<?php

namespace App\Http\Requests;

use App\Models\AssetLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_location_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
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
        ];
    }
}
