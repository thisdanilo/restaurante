<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        @can('role_show')
            <a class="dropdown-item" href="{{ route('role.show', $model->id) }}">Ver</a>
        @endcan

        @can('role_edit')
            <a class="dropdown-item" href="{{ route('role.edit', $model->id) }}">Editar</a>
        @endcan

        @can('role_delete')
            <form method="post" action="{{ route('role.delete', $model->id) }}">

                {{-- Elementos Ocultos --}}
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">Excluir</button>
            </form>
        @endcan
    </div>
</div>
