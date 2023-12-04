<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Propriete extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'surface',
        'nombreDePiece',
        'nombreDeChambre',
        'etage',
        'codePostale',
        'vendu',
        'ville',
        'adresse',
    ];
 protected $casts = 
 [
    'created_at' => 'string',
    'vendu' => 'bool', // pour faire des casting
 ];
  public function options()
  {
      return $this->belongsToMany(Option::class);
  }
  public function getSlug() : string
  {
      return Str::slug($this->titre);
  }
  public function getEtatVente() : string
  {
      return $this->vendu? "Vendu" : "En vente";
  }

  public function scopeVendu(Builder $builder): Builder
  {
     return $builder->where('vendu', true);
  }
  public function scoperecent(Builder $builder): Builder
  {
     return $builder->orderBy('created_at', 'desc');
  }
  
}
