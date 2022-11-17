@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.assetsHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AssetsHistory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.asset') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.serial_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.monthly_value') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.location') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetLocation.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetLocation.fields.zip') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetLocation.fields.location') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetLocation.fields.country') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.assigned_user') }}
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
                        {{ trans('cruds.assetsHistory.fields.created_at') }}
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
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.assets-histories.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'asset_name', name: 'asset.name' },
{ data: 'asset.serial_number', name: 'asset.serial_number' },
{ data: 'asset.monthly_value', name: 'asset.monthly_value' },
{ data: 'status_name', name: 'status.name' },
{ data: 'location_name', name: 'location.name' },
{ data: 'location.address', name: 'location.address' },
{ data: 'location.zip', name: 'location.zip' },
{ data: 'location.location', name: 'location.location' },
{ data: 'location.country', name: 'location.country' },
{ data: 'assigned_user_first_name', name: 'assigned_user.first_name' },
{ data: 'assigned_user.last_name', name: 'assigned_user.last_name' },
{ data: 'assigned_user.email', name: 'assigned_user.email' },
{ data: 'assigned_user.phone', name: 'assigned_user.phone' },
{ data: 'assigned_user.company', name: 'assigned_user.company' },
{ data: 'assigned_user.vat', name: 'assigned_user.vat' },
{ data: 'created_at', name: 'created_at' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AssetsHistory').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection