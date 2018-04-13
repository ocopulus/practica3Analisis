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
                    ->type('user','juan')
                    ->type('password', '1234')
                    ->press('btn')
                    ->assertPathIs('/home');

            $browser->visit('home/credito')
                    ->type('cuenta', '1')
                    ->type('descripcion', 'credio test')
                    ->type('monto', '100')
                    ->press('action')
                    ->assertPathIs('/home');

            //Debajo de este comentario pone tus pruebas chiqui


            //De aqui para habajo no toques nada

            $browser->visit('home')
                    ->assertSee('Q');

            $browser->visit('home')
                    ->press('salir')
                    ->assertPathIs('/');
        });
    }

}
