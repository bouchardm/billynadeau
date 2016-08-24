<?php

namespace App;

use App\Contracts\CrudModel;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Ticket
 *
 * @property integer $id
 * @property string $no
 * @property string $name
 * @property string $description
 * @property integer $client_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $customer_id
 * @method static \Illuminate\Database\Query\Builder|\App\Ticket whereCustomerId($value)
 * @property-read \App\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Clock[] $clocks
 */
class Ticket extends Model implements CrudModel
{
    protected $fillable = ['no', 'name', 'description', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function clocks()
    {
        return $this->hasMany(Clock::class);
    }

    public function title()
    {
        return $this->name;
    }

    public function path()
    {
        return "/bon/{$this->id}";
    }
}
