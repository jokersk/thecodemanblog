<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('email', "jokersk119@gmail.com")
                ->type('psw', "ys717484") // Enter plain password
                ->press('button');
                
            $browser
                ->visit('/blogs/list')
                ->assertSee('Action');

            $browser->click("table a:first-child")
                ->assertPathIs('/blogs/detail/1');
        });

       
    }
}
