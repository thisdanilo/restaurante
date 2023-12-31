<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function __construct(
        protected Role $role,
        protected RoleService $role_service,
    ) {
    }

    /** Tela inicial */
    public function index(): View
    {
        return view('admin.role.index');
    }

    /**
     * Dados da tela inicial
     *
     * @codeCoverageIgnore
     */
    public function datatable(): JsonResponse
    {
        $model = $this->role->notAdmin()->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('admin.role.partials._action', compact('model'))->render();
            })
            ->rawColumns([
                'action',
            ])
            ->make();
    }

    /** Tela de cadastro */
    public function create(): View
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }

    /** Cria o registro */
    public function store(RoleRequest $request): RedirectResponse
    {
        $this->role_service->updateOrCreate($request->all());

        notify()->success('Cadastro realizado com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('role.index');
    }

    /** Tela de visualização */
    public function show(int $id): View
    {
        $role = $this->role->notAdmin()->with('permissions')->findOrFail($id);

        return view('admin.role.show', compact('role'));
    }

    /** Tela de edição */
    public function edit(int $id): View
    {
        $role = $this->role->notAdmin()->findOrFail($id);

        $permissions = Permission::whereNotIn('id', $role->permissions->pluck('id'))->get();

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /** Atualiza o registro */
    public function update(RoleRequest $request, $id): RedirectResponse
    {
        $role = $this->role->notAdmin()->findOrFail($id);

        $this->role_service->updateOrCreate($request->all(), $role->id);

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('role.edit', $role->id);
    }

    /** Remove o registro */
    public function delete(int $id): RedirectResponse
    {
        $role = $this->role->notAdmin()->findOrFail($id);

        $this->role_service->delete($role);

        notify()->success('Exclusão realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('role.index');
    }
}
