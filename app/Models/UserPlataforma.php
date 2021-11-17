<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlataforma extends Model
{
    use HasFactory;

    /**
     * Define o nome da tabela para o model
     *
     * @var string
     */
    protected $table = 'users';
}
