<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use Illuminate\Http\RedirectResponse;

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

    /** Tela de cadastro */
    public function create(): View
    {
        return view('admin.tenant.create');
    }

    /** Cria o registro */
    public function store(TenantRequest $request): RedirectResponse
    {
        $this->tenant->create($request->validated());

        notify()->success('Cadastro realizado com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('tenant.index');
    }

    /** Tela de visualização */
    public function show(Tenant $tenant): View
    {
        $tenant = $this->tenant->findOrFail($tenant->id);

        return view('admin.tenant.show', compact('tenant'));
    }

    /** Tela de edição */
    public function edit(Tenant $tenant): View
    {
        $tenant = $this->tenant->findOrFail($tenant->id);

        return view('admin.tenant.edit', compact('tenant'));
    }

    /** Atualiza o registro */
    public function update(TenantRequest $request, Tenant $tenant): RedirectResponse
    {
        $tenant->update($request->validated());

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('tenant.edit', $tenant->id);
    }

    /** Remove o registro */
    public function delete(Tenant $tenant): RedirectResponse
    {
        $this->tenant->delete($tenant);

        notify()->success('Exclusão realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('tenant.index');
    }
}
