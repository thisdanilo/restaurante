<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function __construct(
        protected Category $category,
        protected CategoryService $category_service,
    ) {
    }

    /** Tela inicial */
    public function index(): View
    {
        return view('admin.category.index');
    }

    /**
     * Dados da tela inicial
     *
     * @codeCoverageIgnore
     */
    public function datatable(): JsonResponse
    {
        $model = $this->category->query();

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
                function ($category) {
                    return $category->present()->getActive;
                }
            )
            ->addColumn('action', function ($model) {
                return view('admin.category.partials._action', compact('model'))->render();
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
        $users = User::where('active', 1)->notAdmin()->get();

        return view('admin.category.create', compact('users'));
    }

    /** Cria o registro */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->category_service->updateOrCreate($request->all());

        notify()->success('Cadastro realizado com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('category.index');
    }

    /** Tela de visualização */
    public function show(int $id): View
    {
        $category = $this->category->with('user')->findOrFail($id);

        return view('admin.category.show', compact('category'));
    }

    /** Tela de edição */
    public function edit(int $id): View
    {
        $category = $this->category->with('user')->findOrFail($id);

        $users = User::where('users.id', '!=', $category->user->id)->notAdmin()->get();

        return view('admin.category.edit', compact('category', 'users'));
    }

    /** Atualiza o registro */
    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->updateOrCreate($request->all(), $category->id);

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('category.edit', $category->id);
    }

    /** Remove o registro */
    public function delete(int $id): RedirectResponse
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->delete($category);

        notify()->success('Exclusão realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('category.index');
    }
}
