<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Illuminate\Support\Facades\DB;

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
            $browser->visit('/reguser')
                    ->type('name','usuario test')
                    ->type('user','test')
                    ->type('email','test@gmail.com')
                    ->type('password','1234')
                    ->press('btn')
                    ->assertPathIs('/');

            $browser->visit('/')
                    ->type('id', '1')
                    ->type('user','test')
                    ->type('password', '1234')
                    ->press('btn')
                    ->assertPathIs('/home');

            $browser->visit('home/credito')
                    ->type('cuenta', '1')
                    ->type('descripcion', 'credio test')
                    ->type('monto', '100')
                    ->press('action')
                    ->assertPathIs('/home');

            $browser->visit('home/debito')
                    ->type('cuenta', '1')
                    ->type('descripcion', 'credio test')
                    ->type('monto', '50')
                    ->press('action')
                    ->assertPathIs('/home');

            $browser->visit('home/transferencia')
                    ->type('cuenta', '1')
                    ->type('monto', '25')
                    ->press('action')
                    ->assertPathIs('/home');

            $browser->visit('home')
                    ->assertSee('Q');

            $browser->visit('home')
                    ->press('salir')
                    ->assertPathIs('/');
        });
    }

}
