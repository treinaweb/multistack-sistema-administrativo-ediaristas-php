<?php

namespace App\Http\Controllers;

use App\Models\Diaria;
use Illuminate\Http\RedirectResponse;

class PagarDiaria extends Controller
{
    /**
     * Marca uma diária como paga
     *
     * @param Diaria $diaria
     * @return RedirectResponse
     */
    public function __invoke(Diaria $diaria): RedirectResponse
    {
        $statusInvalido = !in_array($diaria->status, [4, 6]);

        if ($statusInvalido) {
            return back()->with('mensagem', 'Status invalido para marcar como pago');
        }

        $diaria->status = 7;
        $diaria->save();

        return back()->with('mensagem', 'Diária marcada como paga');
    }
}
