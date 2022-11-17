<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetsHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssetsHistoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('assets_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AssetsHistory::with(['asset', 'status', 'location', 'assigned_user'])->select(sprintf('%s.*', (new AssetsHistory())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'assets_history_show';
                $editGate = 'assets_history_edit';
                $deleteGate = 'assets_history_delete';
                $crudRoutePart = 'assets-histories';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('asset_name', function ($row) {
                return $row->asset ? $row->asset->name : '';
            });

            $table->editColumn('asset.serial_number', function ($row) {
                return $row->asset ? (is_string($row->asset) ? $row->asset : $row->asset->serial_number) : '';
            });
            $table->editColumn('asset.monthly_value', function ($row) {
                return $row->asset ? (is_string($row->asset) ? $row->asset : $row->asset->monthly_value) : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->addColumn('location_name', function ($row) {
                return $row->location ? $row->location->name : '';
            });

            $table->editColumn('location.address', function ($row) {
                return $row->location ? (is_string($row->location) ? $row->location : $row->location->address) : '';
            });
            $table->editColumn('location.zip', function ($row) {
                return $row->location ? (is_string($row->location) ? $row->location : $row->location->zip) : '';
            });
            $table->editColumn('location.location', function ($row) {
                return $row->location ? (is_string($row->location) ? $row->location : $row->location->location) : '';
            });
            $table->editColumn('location.country', function ($row) {
                return $row->location ? (is_string($row->location) ? $row->location : $row->location->country) : '';
            });
            $table->addColumn('assigned_user_first_name', function ($row) {
                return $row->assigned_user ? $row->assigned_user->first_name : '';
            });

            $table->editColumn('assigned_user.last_name', function ($row) {
                return $row->assigned_user ? (is_string($row->assigned_user) ? $row->assigned_user : $row->assigned_user->last_name) : '';
            });
            $table->editColumn('assigned_user.email', function ($row) {
                return $row->assigned_user ? (is_string($row->assigned_user) ? $row->assigned_user : $row->assigned_user->email) : '';
            });
            $table->editColumn('assigned_user.phone', function ($row) {
                return $row->assigned_user ? (is_string($row->assigned_user) ? $row->assigned_user : $row->assigned_user->phone) : '';
            });
            $table->editColumn('assigned_user.company', function ($row) {
                return $row->assigned_user ? (is_string($row->assigned_user) ? $row->assigned_user : $row->assigned_user->company) : '';
            });
            $table->editColumn('assigned_user.vat', function ($row) {
                return $row->assigned_user ? (is_string($row->assigned_user) ? $row->assigned_user : $row->assigned_user->vat) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'asset', 'status', 'location', 'assigned_user']);

            return $table->make(true);
        }

        return view('admin.assetsHistories.index');
    }
}
