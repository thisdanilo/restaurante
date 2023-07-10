<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados da Categoria
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            @if ($show ?? false)
                @if (auth()->user()->role->id == 1)
                    {{-- Usuário --}}
                    <div class="col-sm-3 mb-2">
                        <label class="form-label">Usuário</label>
                        <input class="form-control" value="{{ $category->user->name }}" readonly>
                    </div>
                @endif

                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome</label>
                    <input class="form-control" value="{{ $category->name }}" readonly>
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo</label>
                    <input class="form-control" value="{{ $category->formatted_active }}" readonly>
                </div>
            @elseif (isset($category))
                @if (auth()->user()->role->id == 1)

                    {{-- Usuário --}}
                    <div class="col-sm-3 mb-2">
                        <label class="form-label">Usuário <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id" required>
                            <option value="{{ $category->user->id }}" selected>{{ $category->user->name }}</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="{{ $category->name }}">
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo<span class="text-danger">*</span></label>
                    <select class="form-control" name="active" required>
                        <option value="0" @if ($category->active == 0) selected @endif>Não</option>
                        <option value="1" @if ($category->active == 1) selected @endif>Sim</option>
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

                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
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
