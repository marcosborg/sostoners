@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.crmCustomer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.crm-customers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.crmCustomer.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.crmCustomer.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.crmCustomer.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}">
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat">{{ trans('cruds.crmCustomer.fields.vat') }}</label>
                <input class="form-control {{ $errors->has('vat') ? 'is-invalid' : '' }}" type="text" name="vat" id="vat" value="{{ old('vat', '') }}">
                @if($errors->has('vat'))
                    <span class="text-danger">{{ $errors->first('vat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.crmCustomer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.crmCustomer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_2">{{ trans('cruds.crmCustomer.fields.phone_2') }}</label>
                <input class="form-control {{ $errors->has('phone_2') ? 'is-invalid' : '' }}" type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', '') }}">
                @if($errors->has('phone_2'))
                    <span class="text-danger">{{ $errors->first('phone_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.phone_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.crmCustomer.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.crmCustomer.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.crmCustomer.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.crmCustomer.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.crmCustomer.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.crmCustomer.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.description_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.crm-customers.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $crmCustomer->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection