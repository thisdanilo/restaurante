<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('tenant.show', ['id' => $model->id]) }}">Ver</a>
        <a class="dropdown-item" href="{{ route('tenant.edit', ['id' => $model->id]) }}">Editar</a>
        <a class="dropdown-item" href="{{ route('tenant.confirm_delete', ['id' => $model->id]) }}">Excluir</a>
    </div>
</div>
