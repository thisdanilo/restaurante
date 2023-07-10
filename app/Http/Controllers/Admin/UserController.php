<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct(
        protected User $user,
        protected UserService $user_service,
    ) {
    }

    /** Tela inicial */
    public function index(): View
    {
        return view('admin.user.index');
    }

    /**
     * Dados da tela inicial
     *
     * @codeCoverageIgnore
     */
    public function datatable(): JsonResponse
    {
        $model = $this->user->notAdmin()
            ->notMe()
            ->with('role')
            ->addSelect('users.*')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id');

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
            ->addColumn(
                'tenant',
                function ($user) {
                    return $user->formatTenantName();
                }
            )
            ->editColumn(
                'active',
                function ($user) {
                    return $user->present()->getActive;
                }
            )
            ->addColumn('action', function ($model) {
                return view('admin.user.partials._action', compact('model'))->render();
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
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    /** Cria o registro */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->user_service->updateOrCreate($request->all());

        notify()->success('Cadastro realizado com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('user.index');
    }

    /** Tela de visualização */
    public function show(int $id): View
    {
        $user = $this->user->notAdmin()
            ->notMe()
            ->with('role')
            ->findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /** Tela de edição */
    public function edit(int $id): View
    {
        $user = $this->user->notAdmin()
            ->notMe()
            ->with('role')
            ->findOrFail($id);

        $roles = Role::where('roles.id', '!=', $user->role->id)->get();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /** Atualiza o registro */
    public function update(UserRequest $request, $id): RedirectResponse
    {
        $user = $this->user->notAdmin()->notMe()->findOrFail($id);

        $this->user_service->updateOrCreate($request->all(), $user->id);

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('user.edit', $user->id);
    }

    /** Remove o registro */
    public function delete(int $id): RedirectResponse
    {
        $user = $this->user->notAdmin()->notMe()->findOrFail($id);

        $this->user_service->delete($user);

        notify()->success('Exclusão realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('user.index');
    }
}
