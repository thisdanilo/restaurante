<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" user="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        @can('user_show')
            <a class="dropdown-item" href="{{ route('user.show', $model->id) }}">Ver</a>
        @endcan

        @can('user_edit')
            <a class="dropdown-item" href="{{ route('user.edit', $model->id) }}">Editar</a>
        @endcan

        @can('user_delete')
            <form method="post" action="{{ route('user.delete', $model->id) }}">

                {{-- Elementos Ocultos --}}
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">Excluir</button>
            </form>
        @endcan
    </div>
</div>
