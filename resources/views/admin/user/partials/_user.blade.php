<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados da Usuário
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            @if ($show ?? false)
                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome</label>
                    <input class="form-control" value="{{ $user->name }}" readonly>
                </div>

                {{-- Email --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Email</label>
                    <input class="form-control" value="{{ $user->email }}" readonly>
                </div>

                {{-- Restaurante --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Restaurante</label>
                    <input class="form-control" value="{{ $user->tenant->legal_name }}" readonly>
                </div>

                {{-- Função --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Função</label>
                    <input class="form-control" value="{{ $user->role->name }}" readonly>
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo</label>
                    <input class="form-control" value="{{ $user->formatted_active }}" readonly>
                </div>
            @elseif (isset($user))
                {{-- Nome --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
                </div>

                {{-- Email --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" required value="{{ $user->email }}">
                </div>

                {{-- Senha --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Senha<span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Deixe vazio se não for mudar">
                </div>

                {{-- Confirmar --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Confirmar Senha<span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar se for mudar">
                </div>

                @if (auth()->user()->role->id == 1)

                    {{-- Restaurante --}}
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Restaurante <span class="text-danger">*</span></label>
                        <select class="form-control" name="tenant_id" required>
                            <option value="{{ $user->tenant->id }}" selected>{{ $user->tenant->legal_name }}</option>

                            @foreach ($tenants as $tenant)
                                <option value="{{ $tenant->id }}">{{ $tenant->legal_name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                @if (auth()->user()->role->id == 1)

                    {{-- Função --}}
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Função <span class="text-danger">*</span></label>
                        <select class="form-control" name="role_id" required>
                            <option value="{{ $user->role->id }}" selected>{{ $user->role->name }}</option>

                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo<span class="text-danger">*</span></label>
                    <select class="form-control" name="active" required>
                        <option value="0" @if ($user->active == 0) selected @endif>Não</option>
                        <option value="1" @if ($user->active == 1) selected @endif>Sim</option>
                    </select>
                </div>
            @else
                {{-- Nome --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                {{-- Email --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                {{-- Senha --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Senha<span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                {{-- Confirmar --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Confirmar Senha<span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                @if (auth()->user()->role->id == 1)

                    {{-- Restaurante --}}
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Restaurante <span class="text-danger">*</span></label>
                        <select class="form-control" name="tenant_id" required>
                            <option value="">Selecione</option>

                            @foreach ($tenants as $tenant)
                                <option value="{{ $tenant->id }}">{{ $tenant->legal_name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                @if (auth()->user()->role->id == 1)

                    {{-- Função --}}
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Função <span class="text-danger">*</span></label>
                        <select class="form-control" name="role_id" required>
                            <option value="">Selecione</option>

                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                {{-- Ativo --}}
                <div class="col-sm-3 mb-3">
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
