<?php

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['name'];
    public function produtos():HasMany
    {
        return $this->HasMany(Produto::class);
    }
}
