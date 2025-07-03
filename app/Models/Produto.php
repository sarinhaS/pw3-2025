<?php

namespace App\Models;

use Categoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'preco', 'descricao', 'imagem', 'categorias_id'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
