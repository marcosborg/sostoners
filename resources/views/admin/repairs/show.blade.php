@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.repair.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.repairs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.id') }}
                        </th>
                        <td>
                            {{ $repair->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.user') }}
                        </th>
                        <td>
                            {{ $repair->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.crm_customer') }}
                        </th>
                        <td>
                            {{ $repair->crm_customer->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.start_datetime') }}
                        </th>
                        <td>
                            {{ $repair->start_datetime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.end_datetime') }}
                        </th>
                        <td>
                            {{ $repair->end_datetime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.description') }}
                        </th>
                        <td>
                            {!! $repair->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.type') }}
                        </th>
                        <td>
                            {{ $repair->type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.brand') }}
                        </th>
                        <td>
                            {{ $repair->brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.model') }}
                        </th>
                        <td>
                            {{ $repair->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.description_to_customer') }}
                        </th>
                        <td>
                            {!! $repair->description_to_customer !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.internal_description') }}
                        </th>
                        <td>
                            {!! $repair->internal_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.status') }}
                        </th>
                        <td>
                            {{ $repair->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.accessories') }}
                        </th>
                        <td>
                            {!! $repair->accessories !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.photos') }}
                        </th>
                        <td>
                            @foreach($repair->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.product') }}
                        </th>
                        <td>
                            @foreach($repair->products as $key => $product)
                                <span class="label label-info">{{ $product->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.repairs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection