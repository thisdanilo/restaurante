<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados da Função
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            @if ($show ?? false)
                {{-- Nome --}}
                <div class="col-sm-3 mb-2">
                    <label class="form-label">Nome</label>
                    <input class="form-control" value="{{ $role->name }}" readonly>
                </div>
            @elseif (isset($role))
                {{-- Nome --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="{{ $role->name }}">
                </div>
            @else
                {{-- Nome --}}
                <div class="col-sm-3 mb-3">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
            @endif

        </div>
    </div>

    <div class="card-footer"></div>

</div>

<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados da Permissão
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            @if ($show ?? false)
                @foreach ($role->permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" checked disabled>
                                <label class="form-check-label">{{ $permission->translated_name }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif (isset($role))
                @foreach ($role->permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" checked>
                                <label class="form-check-label">{{ $permission->translated_name }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                <label class="form-check-label">{{ $permission->translated_name }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                <label class="form-check-label">{{ $permission->translated_name }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <div class="card-footer"></div>

</div>
