<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('tenant.show', ['id' => $model->id]) }}">Ver</a>
        <a class="dropdown-item" href="{{ route('tenant.edit', ['id' => $model->id]) }}">Editar</a>
        <a class="dropdown-item" href="{{ route('tenant.confirm_delete', ['id' => $model->id]) }}">Excluir</a>
    </div>
