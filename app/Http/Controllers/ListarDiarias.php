<?php

namespace App\Http\Controllers;

use App\Models\Diaria;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ListarDiarias extends Controller
{
    /**
     * Lista as diárias com filtros
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
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
