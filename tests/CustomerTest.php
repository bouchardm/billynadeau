<?php

use App\Customer;
use App\Http\Requests\SaveCustomerRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
    use DatabaseTransactions;
    
    public function setUp()
    {
        parent::setUp();
        $this->actingAsBasicUser();
    }

    public function testICanCreateCustomer()
    {
        $this->visit('/admin')
            ->click('Client')
            ->click('Ajouter')
            ->type('firstName', 'firstName')
            ->type('lastName', 'lastName')
            ->type('address', 'address')
            ->type('phone', 'phone')
            ->type('cellphone', 'cellphone')
            ->press('Créer');

        $this->see('firstName')
            ->see('lastName')
            ->see('address')
            ->see('phone')
            ->see('cellphone');
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

    public function testICanSeeTheCustomersCars()
    {
        $customer = factory(\App\Customer::class)->create(['firstName' => 'clientEdité']);
        $car = factory(\App\Car::class)->create(['customer_id' => $customer->id]);

        $this->visit($customer->path())
            ->see($car->modele)
            ->see($car->marque)
            ->see($car->annee);
    }

    public function testICantSaveAInvalidCustomer()
    {
        $request = new SaveCustomerRequest();
        $this->assertFalse(Validator::make([], $request->rules())->passes());
    }
}
