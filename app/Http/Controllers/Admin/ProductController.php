<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function __construct(
        protected Product $product,
        protected ProductService $product_service,
    ) {
    }

    /** Tela inicial */
    public function index(): View
    {
        return view('admin.product.index');
    }

    /**
     * Dados da tela inicial
     *
     * @codeCoverageIgnore
     */
    public function datatable(): JsonResponse
    {
        $model = $this->product->with('user.tenants');

        return DataTables::of($model)
            ->filterColumn(
                'price',
                function ($q, $keyword) {
                    $formatted_price = str_replace(',', '.', str_replace('.', '', $keyword));

                    $q->where('price', 'LIKE', '%'.$formatted_price.'%');
                }
            )
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
            ->editColumn('image', function ($product) {
                return $product->present()->getImage;
            })
            ->editColumn('price', function ($product) {
                return $product->formatted_price;
            })
            ->editColumn(
                'active',
                function ($product) {
                    return $product->present()->getActive;
                }
            )
            ->addColumn('action', function ($model) {
                return view('admin.product.partials._action', compact('model'))->render();
            })
            ->rawColumns([
                'image',
                'active',
                'action',
            ])
            ->make();
    }

    /** Tela de cadastro */
    public function create(): View
    {
        $users = User::where('active', 1)->notAdmin()->get();

        $categories = Category::where('active', 1)->get();

        return view('admin.product.create', compact('users', 'categories'));
    }

    /** Cria o registro */
    public function store(ProductRequest $request): RedirectResponse
    {
        $this->product_service->updateOrCreate($request->all());

        notify()->success('Cadastro realizado com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('product.index');
    }

    /** Tela de visualização */
    public function show(int $id): View
    {
        $product = $this->product->with([
            'user',
            'category',
        ])->findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /** Tela de edição */
    public function edit(int $id): View
    {
        $product = $this->product->with('user')->findOrFail($id);

        $users = User::where('users.id', '!=', $product->user->id)->notAdmin()->get();

        $categories = Category::where('categories.id', '!=', $product->category->id)->get();

        return view('admin.product.edit', compact('product', 'users', 'categories'));
    }

    /** Atualiza o registro */
    public function update(ProductRequest $request, int $id): RedirectResponse
    {
        $product = $this->product->findOrFail($id);

        $this->product_service->updateOrCreate($request->all(), $product->id);

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('product.edit', $product->id);
    }

    /** Remove o registro */
    public function delete(int $id): RedirectResponse
    {
        $product = $this->product->findOrFail($id);

        $this->product_service->delete($product);

        notify()->success('Exclusão realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('product.index');
    }
}
