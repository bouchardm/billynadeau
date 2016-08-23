<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{

    public function testICanCreateUser()
    {
        $this->visit('/home')
            ->click('Client')
            ->click('Ajouter')
            ->type('firstName', 'firstName')
            ->type('lastName', 'lastName')
            ->press('Créer')
            ->see('firstName')
            ->see('lastName');
    }
}
