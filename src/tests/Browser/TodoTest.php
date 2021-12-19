<?php

namespace Tests\Browser;

use App\Models\Todo;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TodoTest extends DuskTestCase
{
    use DatabaseMigrations;
    public function test_create_todo()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit("/")->assertSee("Type to add new task");
            $browser->click("#new")->assertSee("Open");
            $browser->type("newTitle", "Some text");
            $browser->pause(1500);
            $browser
                ->click(".primary-button")
                ->pause(500)
                ->assertSee("Some text");
        });
    }
}
