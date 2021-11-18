<?php

namespace App\Http\Controllers;

use App\Models\Diaria;
use Illuminate\Http\Request;

class ListarDiarias extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $diarias = Diaria::filtradasPorStatusENome(
            $request->status ?? '',
            $request->nome ?? ''
        );

        return view('diarias.index', [
            'diarias' => $diarias
        ]);
    }
}
