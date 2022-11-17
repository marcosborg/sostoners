@extends('layouts.admin')
@section('content')
@can('repair_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.repairs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.repair.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Repair', 'route' => 'admin.repairs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.repair.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Repair">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.crm_customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.company') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.vat') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.start_datetime') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.end_datetime') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.brand') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.model') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.photos') }}
                    </th>
                    <th>
                        {{ trans('cruds.repair.fields.product') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('repair_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.repairs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.repairs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_name', name: 'user.name' },
{ data: 'crm_customer_first_name', name: 'crm_customer.first_name' },
{ data: 'crm_customer.last_name', name: 'crm_customer.last_name' },
{ data: 'crm_customer.email', name: 'crm_customer.email' },
{ data: 'crm_customer.phone', name: 'crm_customer.phone' },
{ data: 'crm_customer.company', name: 'crm_customer.company' },
{ data: 'crm_customer.vat', name: 'crm_customer.vat' },
{ data: 'start_datetime', name: 'start_datetime' },
{ data: 'end_datetime', name: 'end_datetime' },
{ data: 'type_name', name: 'type.name' },
{ data: 'brand_name', name: 'brand.name' },
{ data: 'model', name: 'model' },
{ data: 'status_name', name: 'status.name' },
{ data: 'photos', name: 'photos', sortable: false, searchable: false },
{ data: 'product', name: 'products.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Repair').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection