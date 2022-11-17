@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.repair.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.repairs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.repair.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="crm_customer_id">{{ trans('cruds.repair.fields.crm_customer') }}</label>
                <select class="form-control select2 {{ $errors->has('crm_customer') ? 'is-invalid' : '' }}" name="crm_customer_id" id="crm_customer_id" required>
                    @foreach($crm_customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('crm_customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crm_customer'))
                    <span class="text-danger">{{ $errors->first('crm_customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.crm_customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_datetime">{{ trans('cruds.repair.fields.start_datetime') }}</label>
                <input class="form-control datetime {{ $errors->has('start_datetime') ? 'is-invalid' : '' }}" type="text" name="start_datetime" id="start_datetime" value="{{ old('start_datetime') }}" required>
                @if($errors->has('start_datetime'))
                    <span class="text-danger">{{ $errors->first('start_datetime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.start_datetime_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_datetime">{{ trans('cruds.repair.fields.end_datetime') }}</label>
                <input class="form-control datetime {{ $errors->has('end_datetime') ? 'is-invalid' : '' }}" type="text" name="end_datetime" id="end_datetime" value="{{ old('end_datetime') }}">
                @if($errors->has('end_datetime'))
                    <span class="text-danger">{{ $errors->first('end_datetime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.end_datetime_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.repair.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type_id">{{ trans('cruds.repair.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id" required>
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brand_id">{{ trans('cruds.repair.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id" required>
                    @foreach($brands as $id => $entry)
                        <option value="{{ $id }}" {{ old('brand_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <span class="text-danger">{{ $errors->first('brand') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="model">{{ trans('cruds.repair.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', '') }}" required>
                @if($errors->has('model'))
                    <span class="text-danger">{{ $errors->first('model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_to_customer">{{ trans('cruds.repair.fields.description_to_customer') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_to_customer') ? 'is-invalid' : '' }}" name="description_to_customer" id="description_to_customer">{!! old('description_to_customer') !!}</textarea>
                @if($errors->has('description_to_customer'))
                    <span class="text-danger">{{ $errors->first('description_to_customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.description_to_customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="internal_description">{{ trans('cruds.repair.fields.internal_description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('internal_description') ? 'is-invalid' : '' }}" name="internal_description" id="internal_description">{!! old('internal_description') !!}</textarea>
                @if($errors->has('internal_description'))
                    <span class="text-danger">{{ $errors->first('internal_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.internal_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.repair.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="accessories">{{ trans('cruds.repair.fields.accessories') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('accessories') ? 'is-invalid' : '' }}" name="accessories" id="accessories">{!! old('accessories') !!}</textarea>
                @if($errors->has('accessories'))
                    <span class="text-danger">{{ $errors->first('accessories') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.accessories_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photos">{{ trans('cruds.repair.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                    <span class="text-danger">{{ $errors->first('photos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="products">{{ trans('cruds.repair.fields.product') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <span class="text-danger">{{ $errors->first('products') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.product_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.repairs.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $repair->id ?? 0 }}');
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

<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.repairs.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1500,
      height: 1500
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($repair) && $repair->photos)
      var files = {!! json_encode($repair->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection