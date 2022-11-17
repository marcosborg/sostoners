@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crmCustomer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.id') }}
                        </th>
                        <td>
                            {{ $crmCustomer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.first_name') }}
                        </th>
                        <td>
                            {{ $crmCustomer->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.last_name') }}
                        </th>
                        <td>
                            {{ $crmCustomer->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.company') }}
                        </th>
                        <td>
                            {{ $crmCustomer->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.vat') }}
                        </th>
                        <td>
                            {{ $crmCustomer->vat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.email') }}
                        </th>
                        <td>
                            {{ $crmCustomer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.phone') }}
                        </th>
                        <td>
                            {{ $crmCustomer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.phone_2') }}
                        </th>
                        <td>
                            {{ $crmCustomer->phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.address') }}
                        </th>
                        <td>
                            {{ $crmCustomer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.zip') }}
                        </th>
                        <td>
                            {{ $crmCustomer->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.location') }}
                        </th>
                        <td>
                            {{ $crmCustomer->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.country') }}
                        </th>
                        <td>
                            {{ $crmCustomer->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.website') }}
                        </th>
                        <td>
                            {{ $crmCustomer->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.description') }}
                        </th>
                        <td>
                            {!! $crmCustomer->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#assigned_user_assets_histories" role="tab" data-toggle="tab">
                {{ trans('cruds.assetsHistory.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_crm_notes" role="tab" data-toggle="tab">
                {{ trans('cruds.crmNote.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_crm_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.crmDocument.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#crm_customer_repairs" role="tab" data-toggle="tab">
                {{ trans('cruds.repair.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_assets" role="tab" data-toggle="tab">
                {{ trans('cruds.asset.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_asset_locations" role="tab" data-toggle="tab">
                {{ trans('cruds.assetLocation.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="assigned_user_assets_histories">
            @includeIf('admin.crmCustomers.relationships.assignedUserAssetsHistories', ['assetsHistories' => $crmCustomer->assignedUserAssetsHistories])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_crm_notes">
            @includeIf('admin.crmCustomers.relationships.customerCrmNotes', ['crmNotes' => $crmCustomer->customerCrmNotes])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_crm_documents">
            @includeIf('admin.crmCustomers.relationships.customerCrmDocuments', ['crmDocuments' => $crmCustomer->customerCrmDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="crm_customer_repairs">
            @includeIf('admin.crmCustomers.relationships.crmCustomerRepairs', ['repairs' => $crmCustomer->crmCustomerRepairs])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_assets">
            @includeIf('admin.crmCustomers.relationships.customerAssets', ['assets' => $crmCustomer->customerAssets])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_asset_locations">
            @includeIf('admin.crmCustomers.relationships.customerAssetLocations', ['assetLocations' => $crmCustomer->customerAssetLocations])
        </div>
    </div>
</div>

@endsection