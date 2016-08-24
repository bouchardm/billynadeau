<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Clock
 *
 * @property integer $id
 * @property integer $ticket_id
 * @property-read \App\Ticket $ticket
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $start
 * @property \Carbon\Carbon $end
 * @method static \Illuminate\Database\Query\Builder|\App\Clock whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Clock whereStart($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Clock whereEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Clock whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Clock whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Clock whereTicketId($value)
 */
class Clock extends Model
{
    protected $fillable = ['start', 'end', 'ticket_id'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function getStartAttribute($value)
    {
        return new Carbon($value);
    }

    public function getEndAttribute($value)
    {
        return new Carbon($value);
    }

    public function total()
    {
        return $this->start->diff($this->end, true)->format('%h heures %i minutes');
    }

    public function path()
    {
        return "/clock/{$this->id}";
    }
}
