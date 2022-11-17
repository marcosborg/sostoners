<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRepairRequest;
use App\Http\Requests\StoreRepairRequest;
use App\Http\Requests\UpdateRepairRequest;
use App\Models\Brand;
use App\Models\CrmCustomer;
use App\Models\Product;
use App\Models\Repair;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RepairController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('repair_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Repair::with(['user', 'crm_customer', 'type', 'brand', 'status', 'products'])->select(sprintf('%s.*', (new Repair())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'repair_show';
                $editGate = 'repair_edit';
                $deleteGate = 'repair_delete';
                $crudRoutePart = 'repairs';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('crm_customer_first_name', function ($row) {
                return $row->crm_customer ? $row->crm_customer->first_name : '';
            });

            $table->editColumn('crm_customer.last_name', function ($row) {
                return $row->crm_customer ? (is_string($row->crm_customer) ? $row->crm_customer : $row->crm_customer->last_name) : '';
            });
            $table->editColumn('crm_customer.email', function ($row) {
                return $row->crm_customer ? (is_string($row->crm_customer) ? $row->crm_customer : $row->crm_customer->email) : '';
            });
            $table->editColumn('crm_customer.phone', function ($row) {
                return $row->crm_customer ? (is_string($row->crm_customer) ? $row->crm_customer : $row->crm_customer->phone) : '';
            });
            $table->editColumn('crm_customer.company', function ($row) {
                return $row->crm_customer ? (is_string($row->crm_customer) ? $row->crm_customer : $row->crm_customer->company) : '';
            });
            $table->editColumn('crm_customer.vat', function ($row) {
                return $row->crm_customer ? (is_string($row->crm_customer) ? $row->crm_customer : $row->crm_customer->vat) : '';
            });

            $table->addColumn('type_name', function ($row) {
                return $row->type ? $row->type->name : '';
            });

            $table->addColumn('brand_name', function ($row) {
                return $row->brand ? $row->brand->name : '';
            });

            $table->editColumn('model', function ($row) {
                return $row->model ? $row->model : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->editColumn('photos', function ($row) {
                if (!$row->photos) {
                    return '';
                }
                $links = [];
                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('product', function ($row) {
                $labels = [];
                foreach ($row->products as $product) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $product->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'crm_customer', 'type', 'brand', 'status', 'photos', 'product']);

            return $table->make(true);
        }

        return view('admin.repairs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('repair_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crm_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = Brand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id');

        return view('admin.repairs.create', compact('brands', 'crm_customers', 'products', 'statuses', 'types', 'users'));
    }

    public function store(StoreRepairRequest $request)
    {
        $repair = Repair::create($request->all());
        $repair->products()->sync($request->input('products', []));
        foreach ($request->input('photos', []) as $file) {
            $repair->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $repair->id]);
        }

        return redirect()->route('admin.repairs.index');
    }

    public function edit(Repair $repair)
    {
        abort_if(Gate::denies('repair_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crm_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = Brand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id');

        $repair->load('user', 'crm_customer', 'type', 'brand', 'status', 'products');

        return view('admin.repairs.edit', compact('brands', 'crm_customers', 'products', 'repair', 'statuses', 'types', 'users'));
    }

    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        $repair->update($request->all());
        $repair->products()->sync($request->input('products', []));
        if (count($repair->photos) > 0) {
            foreach ($repair->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $repair->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $repair->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.repairs.index');
    }

    public function show(Repair $repair)
    {
        abort_if(Gate::denies('repair_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $repair->load('user', 'crm_customer', 'type', 'brand', 'status', 'products');

        return view('admin.repairs.show', compact('repair'));
    }

    public function destroy(Repair $repair)
    {
        abort_if(Gate::denies('repair_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $repair->delete();

        return back();
    }

    public function massDestroy(MassDestroyRepairRequest $request)
    {
        Repair::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('repair_create') && Gate::denies('repair_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Repair();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
