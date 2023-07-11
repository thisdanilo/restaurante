<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados do Produto
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            @if ($show ?? false)
                @if (auth()->user()->role->id == 1)
                    {{-- Usuário --}}
                    <div class="col-sm-5 mb-2">
                        <label class="form-label">Usuário</label>
                        <input class="form-control" value="{{ $product->user->name }}" readonly>
                    </div>
                @endif

                {{-- Imagem --}}
                <div class="col-sm-1 mb-3">
                    <label class="form-label">Imagem</label>
                    <img src="{{ asset('storage/' . $product->image) }}" width="80">
                </div>

                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome</label>
                    <input class="form-control" value="{{ $product->name }}" readonly>
                </div>

                {{-- Preço --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Preço</label>
                    <input class="form-control" value="{{ $product->formatted_price }}" readonly>
                </div>

                {{-- Categoria --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Categoria</label>
                    <input class="form-control" value="{{ $product->category->name }}" readonly>
                </div>

                {{-- Descrição --}}
                <div class="col-sm-6 mb-2">
                    <label class="form-label">Descrição</label>
                    <input class="form-control" value="{{ $product->description }}" readonly>
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo</label>
                    <input class="form-control" value="{{ $product->formatted_active }}" readonly>
                </div>
            @elseif (isset($product))
                @if (auth()->user()->role->id == 1)

                    {{-- Usuário --}}
                    <div class="col-sm-3 mb-2">
                        <label class="form-label">Usuário <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id" required>
                            <option value="{{ $product->user->id }}" selected>{{ $product->user->name }}</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                {{-- Imagem --}}

                <div class="col-sm-1 mb-3">
                    <label class="form-label">Imagem<span class="text-danger">*</span></label>
                    <img src="{{ asset('storage/' . $product->image) }}" width="80">
                </div>
                <div class="col-sm-2 mb-2 mt-4">
                    <input type="file" name="image" class="form-control mt-2" accept=".jpeg, .jpg, .png">
                </div>


                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
                </div>

                {{-- Preço --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Preço<span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control money" required value="{{ $product->formatted_price }}">
                </div>

                {{-- Categoria --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Categoria <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_id" required>
                        <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Descrição --}}
                <div class="col-sm-6 mb-2">
                    <label class="form-label">Descrição<span class="text-danger">*</span></label>
                    <input type="text" name="description" class="form-control" required value="{{ $product->description }}">
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo<span class="text-danger">*</span></label>
                    <select class="form-control" name="active" required>
                        <option value="0" @if ($product->active == 0) selected @endif>Não</option>
                        <option value="1" @if ($product->active == 1) selected @endif>Sim</option>
                    </select>
                </div>
            @else
                @if (auth()->user()->role->id == 1)

                    {{-- Usuário --}}
                    <div class="col-sm-3 mb-2">
                        <label class="form-label">Usuário <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id" required>
                            <option value="">Selecione</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                {{-- Imagem --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Imagem<span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" accept=".jpeg, .jpg, .png" required>
                </div>

                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                {{-- Preço --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Preço<span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control money" required>
                </div>

                {{-- Categoria --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Categoria <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_id" required>
                        <option value="">Selecione</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Descrição --}}
                <div class="col-sm-6 mb-2">
                    <label class="form-label">Descrição<span class="text-danger">*</span></label>
                    <input type="text" name="description" class="form-control" required>
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo <span class="text-danger">*</span></label>
                    <select class="form-control" name="active" required>
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1" selected>Sim</option>
                    </select>
                </div>
            @endif

        </div>
    </div>

    <div class="card-footer"></div>

</div>
