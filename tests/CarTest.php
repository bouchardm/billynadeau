<?php

use App\Http\Requests\SaveCarRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarTest extends TestCase
{
    use DatabaseTransactions;

    public function testICanCreateCar()
    {
        $this->visit('/home')
            ->click('Voiture')
            ->click('Ajouter')
            ->type('marque', 'marque')
            ->type('modele', 'modele')
            ->type('2009', 'annee')
            ->type('123wsre', 'no_plaque')
            ->type('23432O87482763489', 'no_serie')
            ->press('Créer');

        $this->see('marque')
            ->see('modele')
            ->see('2009');
    }

    public function testICanSeeAListOfCar()
    {
        factory(\App\Car::class)->create(['modele' => 'voiture1']);
        factory(\App\Car::class)->create(['modele' => 'voiture2']);

        $this->visit('/voiture')
            ->see('voiture1')
            ->see('voiture2');
    }

    public function testICanDeleteACar()
    {
        factory(\App\Car::class)->create(['modele' => 'modeleSupprimer']);

        $this->visit('/voiture')
            ->press('Supprimer')
            ->notSeeInDatabase('cars', ['modele' => 'modeleSupprimer'])
            ->dontSee('modeleSupprimer');
    }

    public function testICanEditACar()
    {
        $car = factory(\App\Car::class)->create(['modele' => 'voitureEdité']);
        $this->visit("voiture/$car->id/edit")
            ->type('editionFonctionnel', 'modele')
            ->press('Sauvegarder')
            ->see('editionFonctionnel');

        $this->assertContains("voiture/$car->id", $this->currentUri);
    }

    public function testICanAssociateACustomerToACar()
    {
        $car = factory(\App\Car::class)->create();
        $customer = factory(\App\Customer::class)->create();

        $this->visit("voiture/{$car->id}/edit")
            ->select($customer->id, 'customer_id')
            ->press('Sauvegarder')
            ->see($customer->title());
    }

    public function testICantSaveAInvalidCar()
    {
        $request = new SaveCarRequest();
        $this->assertFalse(Validator::make([], $request->rules())->passes());
    }
}
