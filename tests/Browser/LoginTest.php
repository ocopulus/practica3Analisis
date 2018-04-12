<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('id', '1')
                    ->type('user','juan')
                    ->type('password', '1234')
                    ->press('btn')
                    ->assertPathIs('/home');
        });
    }

    public function testRegistroUsuario()
    {

    }

}
