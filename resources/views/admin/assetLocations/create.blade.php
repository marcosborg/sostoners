@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assetLocation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asset-locations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.assetLocation.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetLocation.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.assetLocation.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetLocation.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.assetLocation.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetLocation.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.assetLocation.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetLocation.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.assetLocation.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetLocation.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.assetLocation.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetLocation.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection