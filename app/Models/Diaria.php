<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diaria extends Model
{
    use HasFactory;

    /**
     * Define a relação da diária com o cliente
     *
     * @return BelongsTo
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(UserPlataforma::class, 'cliente_id');
    }

    /**
     * Define a relação da diária com o diarista
     *
     * @return BelongsTo
     */
    public function diarista(): BelongsTo
    {
        return $this->belongsTo(UserPlataforma::class, 'diarista_id');
    }

    /**
     * Retorna todas as diárias páginadas
     * com as relações cliente e diarista
     *
     * @param string $status
     * @param string $nome
     * @param integer $quantidadePaginas
     * @return LengthAwarePaginator
     */
    static public function filtradasPorStatusENome(string $status, string $nome, int $quantidadePaginas = 15): LengthAwarePaginator
    {
        return self::with(['cliente', 'diarista'])
            ->when($status, function ($q) use ($status) {
                $q->whereIn('status', explode(',', $status));
            })
            ->whereHas('cliente', function ($q) use ($nome) {
                $q->where('nome_completo', 'like', '%' . $nome . '%');
            })
            ->orderBy('id')
            ->paginate($quantidadePaginas);
    }
}
