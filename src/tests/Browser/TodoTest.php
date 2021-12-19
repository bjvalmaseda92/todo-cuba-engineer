<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TodoTest extends DuskTestCase
{
    //use DatabaseMigrations;
    public function testCreateTodo()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit("/")->assertSee("Type to add new task");
            $browser->click("#new")->assertSee("Open");
            $browser->type("newTitle", "Some text");
            $browser->pause(2000);
            $browser->click("#button-add");
        });
    }
}
