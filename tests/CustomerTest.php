<?php

use App\Http\Requests\SaveCustomerRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
    use DatabaseTransactions;

    public function testICanCreateCustomer()
    {
        $this->visit('/home')
            ->click('Client')
            ->click('Ajouter')
            ->type('firstName', 'firstName')
            ->type('lastName', 'lastName')
            ->press('Créer');

        $this->see('firstName')
            ->see('lastName');
    }

    public function testICanSeeAListOfCustomer()
    {
        factory(\App\Customer::class)->create(['firstName' => 'client1']);
        factory(\App\Customer::class)->create(['firstName' => 'client2']);

        $this->visit('/client')
            ->see('client1')
            ->see('client2');
    }

    public function testICanDeleteACustomer()
    {
        factory(\App\Customer::class)->create(['firstName' => 'clientSupprimer']);

        $this->visit('/client')
            ->press('Supprimer')
            ->notSeeInDatabase('customers', ['firstName' => 'clientSupprimer'])
            ->dontSee('clientSupprimer');
    }

    public function testICanEditACustomer()
    {
        $customer = factory(\App\Customer::class)->create(['firstName' => 'clientEdité']);
        $this->visit("client/$customer->id/edit")
            ->type('editionFonctionnel', 'lastName')
            ->press('Sauvegarder')
            ->see('editionFonctionnel');

        $this->assertContains("client/$customer->id", $this->currentUri);
    }

    public function testICantSaveAInvalidCustomer()
    {
        $request = new SaveCustomerRequest();
        $this->assertFalse(Validator::make([], $request->rules())->passes());
    }
}
