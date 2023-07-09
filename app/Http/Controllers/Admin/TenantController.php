<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class TenantController extends Controller
{
    public function __construct(
        protected Tenant $tenant,
        protected TenantService $tenant_service,
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

    /** Tela de cadastro */
    public function create(): View
    {
        return view('admin.tenant.create');
    }

    /** Cria o registro */
    public function store(TenantRequest $request): RedirectResponse
    {
        $this->tenant_service->updateOrCreate($request->all());

        notify()->success('Cadastro realizado com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('tenant.index');
    }

    /** Tela de visualização */
    public function show(int $id): View
    {
        $tenant = $this->tenant->findOrFail($id);

        return view('admin.tenant.show', compact('tenant'));
    }

    /** Tela de edição */
    public function edit(int $id): View
    {
        $tenant = $this->tenant->findOrFail($id);

        return view('admin.tenant.edit', compact('tenant'));
    }

    /** Atualiza o registro */
    public function update(TenantRequest $request, int $id): RedirectResponse
    {
        $tenant = $this->tenant->findOrFail($id);

        $this->tenant_service->updateOrCreate($request->all(), $tenant->id);

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('tenant.edit', $tenant->id);
    }

    /** Remove o registro */
    public function delete(int $id): RedirectResponse
    {
        $tenant = $this->tenant->findOrFail($id);

        $this->tenant_service->delete($tenant);

        notify()->success('Exclusão realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('tenant.index');
    }
}
