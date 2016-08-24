<?php

use App\Http\Requests\SaveTicketRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TicketTest extends TestCase
{
    use DatabaseTransactions;

    public function testICanCreateTicket()
    {
        $customer = factory(\App\Customer::class)->create();
        $this->visit('/home')
            ->click('Bon de travail')
            ->click('Ajouter')
            ->type('no', 'no')
            ->type('name', 'name')
            ->type('description', 'description')
            ->select($customer->id, 'customer_id')
            ->press('Créer');

        $this->see('no')
            ->see('name')
            ->see('description');
    }

    public function testICanSeeAListOfTicket()
    {
        factory(\App\Ticket::class)->create(['name' => 'bon1']);
        factory(\App\Ticket::class)->create(['name' => 'bon2']);

        $this->visit('/bon')
            ->see('bon1')
            ->see('bon2');
    }

    public function testICanDeleteATicket()
    {
        factory(\App\Ticket::class)->create(['name' => 'bonSupprimer']);

        $this->visit('/bon')
            ->press('Supprimer')
            ->notSeeInDatabase('tickets', ['bon' => 'bonSupprimer'])
            ->dontSee('bonSupprimer');
    }

    public function testICanEditATicket()
    {
        $bon = factory(\App\Ticket::class)->create(['name' => 'bonEdité']);
        $this->visit("bon/$bon->id/edit")
            ->type('editionFonctionnel', 'name')
            ->press('Sauvegarder')
            ->see('editionFonctionnel');

        $this->assertContains("bon/$bon->id", $this->currentUri);
    }

    public function testICantSaveAInvalidTicket()
    {
        $request = new SaveTicketRequest();
        $this->assertFalse(Validator::make([], $request->rules())->passes());
    }
}
