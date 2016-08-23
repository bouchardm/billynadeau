<?php

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


}
