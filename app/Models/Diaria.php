<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @param integer $quantidadePaginas
     * @return LengthAwarePaginator
     */
    static public function todasPaginadas(int $quantidadePaginas = 15): LengthAwarePaginator
    {
        return self::with(['cliente', 'diarista'])->paginate($quantidadePaginas);
    }
}
