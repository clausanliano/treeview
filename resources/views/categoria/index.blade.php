<!DOCTYPE html>
<html>
<head>
	<title>Laravel Category Treeview Example</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="/css/treeview.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Árvore de Categorias</div>
	  		<div class="panel-body">
	  			<div class="row">
	  				<div class="col-md-6">
	  					<h3>Lista de Categorias</h3>
                          <ul id="tree1">
				            @foreach($categorias_pais as $categoria)
				                <li>
				                    {{ $categoria->nome }}
				                    @if($categoria->subcategorias()->count() )
				                        @include('categoria.detalhe',['subcategorias' => $categoria->subcategorias])
				                    @endif
				                </li>
				            @endforeach
				        </ul>
	  				</div>
	  				<div class="col-md-6">
	  					<h3>Inserir Categoria</h3>

                            <form action="{{route('categoria.store')}}" method="post">
                                @csrf
				  				@if ($message = Session::get('sucesso'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>
									        <strong>{{ $message }}</strong>
									</div>
								@endif

				  				<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', '') }}" placeholder="Digite um nome">
									<span class="text-danger">{{ $errors->first('nome') }}</span>
								</div>

                                <div class="form-group {{ $errors->has('pai_id') ? 'has-error': ''}} ">
                                    <label for="pai_id">Pertence a categoria</label>
                                    <select name="pai_id" id="pai_id" class="form-control">
                                        <option value="0" selected ><-- Não pertence a nenhuma categoria--></option>
                                        @foreach ($todas_categorias as $item)
                                            <option value="{{ $item->id }}"  @if (old('pai_id') === $item->id) selected  @endif> {{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('pai_id') }}</span>
                                </div>


								<div class="form-group">
									<button class="btn btn-success">Add New</button>
								</div>
                            </form>
	  				</div>
	  			</div>
	  		</div>
        </div>
    </div>
    <script src="/js/treeview.js"></script>
</body>
</html>
