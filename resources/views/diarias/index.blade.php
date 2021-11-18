@extends('adminlte::page')

@section('title', 'Lista de Diárias')

@section('content_header')
    <h1>Lista de Diárias</h1>

    <br>
    <div class="btn-toolbar">
      <div class="btn-group mr-2">
        <a href="?status=1,2,3">
            <button class="btn btn-default">Pendetes</button>
        </a>
        <a href="?status=5">
            <button class="btn btn-default">Canceladas</button>
        </a>
        <a href="?status=4,6,7">
            <button class="btn btn-default">Concluídas</button>
        </a>
      </div>
    </div>
@stop

@section('content')
    @include('_mensagens_sessao')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Status</th>
                <th scope="col">Nome Cliente</th>
                <th scope="col">Nome Diarista</th>
                <th scope="col">Data Atendimento</th>
                <th scope="col">Pagamento Diarista</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($diarias as $diaria)
                <tr>
                    <th>{{ $diaria->id }}</th>
                    <th>
                        @switch($diaria->status)
                            @case(1)
                                    Aguardando Pagamento
                                @break
                            @case(2)
                                    Paga
                                @break
                            @case(3)
                                    Diarista Selecionado
                                @break
                            @case(4)
                                    Presença confirmada
                                @break
                            @case(5)
                                    Cancelada
                                @break
                            @case(6)
                                    Avaliada
                                @break
                            @case(7)
                                    Transferido para diarista
                                @break                                                                                                                                                                
                        @endswitch
                    </th>
                    <td>{{ $diaria->cliente->nome_completo }}</td>
                    <td>{{ $diaria->diarista->nome_completo ?? '' }}</td>
                    <td>{{ \Carbon\Carbon::parse($diaria->data_atendimento)->format('d/m/Y h:i') }}</td>
                    <td>
                        @if (in_array($diaria->status, [4, 6]))
                            <a href="{{ route('diarias.pagar', $diaria) }}" class="btn btn-primary">Marcar como pago</a>
                        @elseif ($diaria->status == 7)
                            <a class="btn btn-success disabled">Pago</a>
                        @else 
                            <a class="btn btn-danger disabled">Indisponível</a>
                        @endif   
                    </td>
                </tr>
            @empty
                <tr>
                    <th></th>
                    <th>Nenhum registro foi encontrado</th>
                    <th></th>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $diarias->appends(request()->query())->links() }}
    </div>
@stop