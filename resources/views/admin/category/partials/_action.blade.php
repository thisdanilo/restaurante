<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        @can('category_show')
            <a class="dropdown-item" href="{{ route('category.show', $model->id) }}">Ver</a>
        @endcan

        @can('category_edit')
            <a class="dropdown-item" href="{{ route('category.edit', $model->id) }}">Editar</a>
        @endcan

        @can('category_delete')
            <form method="post" action="{{ route('category.delete', $model->id) }}">

                {{-- Elementos Ocultos --}}
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">Excluir</button>
            </form>
        @endcan
    </div>
</div>
