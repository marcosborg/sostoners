<div class="m-3">
    @can('repair_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.repairs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.repair.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.repair.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-userRepairs">
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
                    <tbody>
                        @foreach($repairs as $key => $repair)
                            <tr data-entry-id="{{ $repair->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $repair->id ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->crm_customer->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->crm_customer->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->crm_customer->email ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->crm_customer->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->crm_customer->company ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->crm_customer->vat ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->start_datetime ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->end_datetime ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->brand->name ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->model ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->status->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($repair->photos as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($repair->products as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('repair_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.repairs.show', $repair->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('repair_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.repairs.edit', $repair->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('repair_delete')
                                        <form action="{{ route('admin.repairs.destroy', $repair->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

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
@can('repair_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.repairs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-userRepairs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection