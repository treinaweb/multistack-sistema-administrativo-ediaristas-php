@extends('adminlte::page')

@section('title', 'Lista de Diárias')

@section('content_header')
    <h1>Lista de Diárias</h1>
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
                <th scope="col">Ações</th>
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
                        <a href="" class="btn btn-primary">Marcar como pago</a>
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
        {{ $diarias->links() }}
    </div>
@stop