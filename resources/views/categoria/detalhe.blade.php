<ul>
    @foreach($subcategorias as $subcategoria)
        <li>
            {{ $subcategoria->nome }}
            @if($subcategoria->subcategorias()->count())
                @include('categoria.detalhe',['subcategorias' => $subcategoria->subcategorias])
            @endif
        </li>
    @endforeach
</ul>
