<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados do Usuário
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            {{-- Nome --}}
            <div class="col-sm-3 mb-3">
                <label class="form-label">Nome<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
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

        </div>
    </div>

    <div class="card-footer"></div>

</div>
