<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAssetRequest;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;
use App\Models\AssetCategory;
use App\Models\AssetLocation;
use App\Models\AssetStatus;
use App\Models\CrmCustomer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssetController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Asset::with(['customer', 'category', 'status', 'location'])->select(sprintf('%s.*', (new Asset())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'asset_show';
                $editGate = 'asset_edit';
                $deleteGate = 'asset_delete';
                $crudRoutePart = 'assets';

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
            $table->addColumn('customer_first_name', function ($row) {
                return $row->customer ? $row->customer->first_name : '';
            });

            $table->editColumn('customer.last_name', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->last_name) : '';
            });
            $table->editColumn('customer.email', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->email) : '';
            });
            $table->editColumn('customer.phone', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->phone) : '';
            });
            $table->editColumn('customer.vat', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->vat) : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('serial_number', function ($row) {
                return $row->serial_number ? $row->serial_number : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('photos', function ($row) {
                if (!$row->photos) {
                    return '';
                }
                $links = [];
                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->addColumn('location_name', function ($row) {
                return $row->location ? $row->location->name : '';
            });

            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('monthly_value', function ($row) {
                return $row->monthly_value ? $row->monthly_value : '';
            });
            $table->editColumn('offers', function ($row) {
                return $row->offers ? $row->offers : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'customer', 'category', 'photos', 'status', 'location']);

            return $table->make(true);
        }

        return view('admin.assets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('asset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = AssetCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = AssetStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = AssetLocation::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.assets.create', compact('categories', 'customers', 'locations', 'statuses'));
    }

    public function store(StoreAssetRequest $request)
    {
        $asset = Asset::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $asset->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $asset->id]);
        }

        return redirect()->route('admin.assets.index');
    }

    public function edit(Asset $asset)
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = AssetCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = AssetStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = AssetLocation::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asset->load('customer', 'category', 'status', 'location');

        return view('admin.assets.edit', compact('asset', 'categories', 'customers', 'locations', 'statuses'));
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $asset->update($request->all());

        if (count($asset->photos) > 0) {
            foreach ($asset->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $asset->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $asset->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.assets.index');
    }

    public function show(Asset $asset)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset->load('customer', 'category', 'status', 'location', 'assetAssetsHistories');

        return view('admin.assets.show', compact('asset'));
    }

    public function destroy(Asset $asset)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetRequest $request)
    {
        Asset::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('asset_create') && Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Asset();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
