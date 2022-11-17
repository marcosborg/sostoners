<div class="m-3">

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.assetsHistory.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-locationAssetsHistories">
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
                    <tbody>
                        @foreach($assetsHistories as $key => $assetsHistory)
                            <tr data-entry-id="{{ $assetsHistory->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $assetsHistory->id ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->asset->name ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->asset->serial_number ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->asset->monthly_value ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->status->name ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->location->name ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->location->address ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->location->zip ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->location->location ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->location->country ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->assigned_user->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->assigned_user->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->assigned_user->email ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->assigned_user->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->assigned_user->company ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->assigned_user->vat ?? '' }}
                                </td>
                                <td>
                                    {{ $assetsHistory->created_at ?? '' }}
                                </td>
                                <td>



                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-locationAssetsHistories:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection