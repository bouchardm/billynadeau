<?php

namespace App;

use App\Contracts\CrudModel;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model implements CrudModel
{
    protected $fillable = ['firstName', 'lastName'];

    public function title()
    {
        return "$this->firstName $this->lastName";
    }

    public function path()
    {
        return "/client/$this->id";
    }
}
