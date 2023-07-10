<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados da Empresa
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            @if ($show ?? false)

                @if (auth()->user()->role->id == 1)
                    {{-- Usuário --}}
                    <div class="col-sm-3 mb-2">
                        <label class="form-label">Usuário</label>
                        <input class="form-control" value="{{ $tenant->user->name }}" readonly>
                    </div>
                @endif

                {{-- CNPJ --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">CNPJ</label>
                    <input class="form-control" value="{{ $tenant->cnpj }}" readonly>
                </div>

                {{-- Razão Social --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Razão Social</label>
                    <input class="form-control" value="{{ $tenant->legal_name }}" readonly>
                </div>

                {{-- Nome Fantasia --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome Fantasia</label>
                    <input class="form-control" value="{{ $tenant->trade_name }}" readonly>
                </div>

                {{-- Inscrição Municipal --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Inscrição Municipal</label>
                    <input class="form-control" value="{{ $tenant->im }}" readonly>
                </div>

                {{-- Inscrição Estadual --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Inscrição Estadual</label>
                    <input class="form-control" value="{{ $tenant->ie }}" readonly>
                </div>

                {{-- Email --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Email</label>
                    <input class="form-control" value="{{ $tenant->email }}" readonly>
                </div>

                {{-- Telefone --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Telefone</label>
                    <input class="form-control" value="{{ $tenant->phone }}" readonly>
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo</label>
                    <input class="form-control" value="{{ $tenant->formatted_active }}" readonly>
                </div>
            @elseif (isset($tenant))
                @if (auth()->user()->role->id == 1)

                    {{-- Usuário --}}
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Usuário <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id" required>
                            <option value="{{ $tenant->user->id }}" selected>{{ $tenant->user->name }}</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif
                {{-- CNPJ --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">CNPJ<span class="text-danger">*</span></label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control" required value="{{ $tenant->cnpj }}">
                </div>

                {{-- Razão Social --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Razão Social<span class="text-danger">*</span></label>
                    <input type="text" name="legal_name" id="legal-name" class="form-control" required value="{{ $tenant->legal_name }}">
                </div>

                {{-- Nome Fantasia --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Nome Fantasia<span class="text-danger">*</span></label>
                    <input type="text" name="trade_name" id="trade-name" class="form-control" required value="{{ $tenant->trade_name }}">
                </div>

                {{-- Inscrição Municipal --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Inscrição Municipal<span class="text-danger">*</span></label>
                    <input type="text" name="im" id="im" class="form-control" required value="{{ $tenant->im }}">
                </div>

                {{-- Inscrição Estadual --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Inscrição Estadual<span class="text-danger">*</span></label>
                    <input type="text" name="ie" id="ie" class="form-control" required value="{{ $tenant->ie }}">
                </div>

                {{-- Email --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" required value="{{ $tenant->email }}">
                </div>

                {{-- Telefone --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Telefone<span class="text-danger">*</span></label>
                    <input type="text" name="phone" id="phone" class="form-control" required value="{{ $tenant->phone }}">
                </div>

                {{-- Ativo --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Ativo<span class="text-danger">*</span></label>
                    <select class="form-control" name="active" required>
                        <option value="0" @if ($tenant->active == 0) selected @endif>Não</option>
                        <option value="1" @if ($tenant->active == 1) selected @endif>Sim</option>
                    </select>
                </div>
            @else
                @if (auth()->user()->role->id == 1)

                    {{-- Usuário --}}
                    <div class="col-sm-3 mb-3">
                        <label class="form-label">Usuário <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id" required>
                            <option value="">Selecione</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                @endif

                {{-- CNPJ --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">CNPJ<span class="text-danger">*</span></label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control" required>
                </div>

                {{-- Razão Social --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Razão Social<span class="text-danger">*</span></label>
                    <input type="text" name="legal_name" id="legal-name" class="form-control" required>
                </div>

                {{-- Nome Fantasia --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Nome Fantasia<span class="text-danger">*</span></label>
                    <input type="text" name="trade_name" id="trade-name" class="form-control" required>
                </div>

                {{-- Inscrição Municipal --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Inscrição Municipal<span class="text-danger">*</span></label>
                    <input type="text" name="im" id="im" class="form-control" required>
                </div>

                {{-- Inscrição Estadual --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Inscrição Estadual<span class="text-danger">*</span></label>
                    <input type="text" name="ie" id="ie" class="form-control" required>
                </div>

                {{-- Email --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                {{-- Telefone --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Telefone<span class="text-danger">*</span></label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>

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
