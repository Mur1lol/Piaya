@extends('layouts/template')

@section('conteudo')
	<div class="container chao">
		<h3 style="margin-bottom: 25px">Lista de Solicitações</h3>
		
		<div class="row">
			@foreach($solicitacaos as $solicitacao)
				@if($solicitacao->user->status == 1  && $solicitacao->user->adm == 0)
					<div class="col-md-6">
						<div class="form-group">
							<div class="input-group botao">
								<label class="form-control">{{ $solicitacao->user->name }}</label>
								<div class="input-group-append ">
									<button class="btn btn-success" type="button" id="button-addon2">
										<i class="fas fa-list"></i>
									</button>
								</div>
							</div>
							<div class="card abre">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">{{$solicitacao->descricao}}</li>
								</ul>
								<div class="card-body">
									<div class="row">
										<div class="col">
											{!! Form::open(['route' => ['users.updateUser', $solicitacao->user->id], 'method' => 'PUT']) !!}
							                    <div class="form-group">
							                        {!! Form::text('adm', '1', ['class' => 'form-control', 'hidden']) !!}
							                        {!! Form::text('status', '0', ['class' => 'form-control', 'hidden']) !!}
							                    </div>
							                    {!! Form::submit('Confirmar', ['class' => 'btn btn-success']) !!}
							                {!! Form::close() !!}
						                </div>
						                <div class="col">
							                {!! Form::open(['route' => ['users.updateUser', $solicitacao->user->id], 'method' => 'PUT']) !!}
							                    <div class="form-group">
							                    	{!! Form::text('adm', '0', ['class' => 'form-control', 'hidden']) !!}
							                        {!! Form::text('status', '2', ['class' => 'form-control', 'hidden']) !!}
							                    </div>
							                    {!! Form::submit('Recusar', ['class' => 'btn btn-danger']) !!}
							                {!! Form::close() !!}
							            </div>
						            </div>
								</div>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
@endsection

@section('script')
    {{ Html::script('tcc/js/solicitacao.js') }}
@endsection