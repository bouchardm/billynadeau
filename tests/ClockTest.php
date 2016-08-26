<?php

use App\Clock;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClockTest extends TestCase
{
    use DatabaseTransactions;
    
    public function setUp()
    {
        parent::setUp();
        $this->actingAsBasicUser();
    }

    public function testICanAddAClockToATicket()
    {
        $ticket = factory(\App\Ticket::class)->create();
        $this->visit($ticket->path())
            ->click('Ajouter du temps')
            ->type('09-09-2016 12:00', 'start')
            ->type('09-09-2016 16:00', 'end')
            ->press('Ajouter')
            ->see('2016-09-09 12:00')
            ->see('2016-09-09 16:00')
            ->see('4 heures');
    }

    public function testICanDeleteAClock()
    {
        /** @var \App\Ticket $ticket */
        $ticket = factory(\App\Ticket::class)->create();
        $clock = new Clock(['start' => '09-09-2016 12:00', 'end' => '09-09-2016 16:00', 'ticket_id' => $ticket->id]);
        $clock->save();

        $this->visit($ticket->path())
            ->press('Supprimer')
            ->dontSee('09-09-2016 16:0009-09-2016 16:00');
    }

    public function testICanHaveTheTimeOfAClock()
    {
        $clock = new Clock([
            'start' => new Carbon(),
            'end' => new Carbon('+2 hours'),
        ]);

        $this->assertEquals('2 heures 0 minutes', $clock->total());
    }

    public function testICanHaveTheTimeInMinuteOfAClock()
    {
        $clock = new Clock([
            'start' => new Carbon(),
            'end' => new Carbon('+2 minutes'),
        ]);

        $this->assertEquals('0 heures 2 minutes', $clock->total());
    }
}
