<?php

namespace App;

use App\Contracts\CrudModel;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Car
 *
 * @property integer $id
 * @property string $marque
 * @property string $modele
 * @property string $annee
 * @property string $no_plaque
 * @property string $no_serie
 * @property integer $customer_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereMarque($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereModele($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereAnnee($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereNoPlaque($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereNoSerie($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Car whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Car extends Model implements CrudModel
{
    protected $fillable = ['marque', 'modele', 'annee', 'no_plaque', 'no_serie', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function title()
    {
        return "$this->marque $this->modele $this->annee";
    }

    public function path()
    {
        return "/voiture/$this->id";
    }
}
