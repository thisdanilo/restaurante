<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class TenantController extends Controller
{
    public function __construct(
        protected Tenant $tenant,
    ) {
    }

    /** Tela inicial */
    public function index(): View
    {
        return view('admin.tenant.index');
    }

    /**
     * Dados da tela inicial
     *
     * @codeCoverageIgnore
     */
    public function datatable(): JsonResponse
    {
        $model = $this->tenant->query();

        return DataTables::of($model)
            ->filterColumn(
                'active',
                function ($q, $keyword) {
                    $formatted_active = strtolower(str_replace(['ã', 'Ã'], ['a', 'A'], $keyword));

                    $q->when($formatted_active == 'sim', function ($q) {
                        $q->where('active', 1);
                    })
                        ->when($formatted_active == 'não', function ($q) {
                            $q->where('active', 0);
                        });
                }
            )
            ->editColumn(
                'active',
                function ($tenant) {
                    return $tenant->present()->getActive;
                }
            )
            ->addColumn('action', function ($model) {
                return view('admin.tenant.partials._action', compact('model'))->render();
            })
            ->rawColumns([
                'active',
                'action',
            ])
            ->make();
    }
}
