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
            $browser->waitFor(".add-button");
            $browser
                ->click(".primary-button")
                ->pause(500)
                ->assertSee("Some text");
        });
    }

    public function test_edit_todo()
    {
        $todo = Todo::factory()->create();
        $this->browse(function (Browser $browser) use ($todo) {
            $browser->visit("/");
            $browser->click("#todo-{$todo->id}")->pause(500);
            $input = $browser->value("#name");
            $this->assertEquals($todo->title, $input); //select the correct todo

            //change the value title and check if this change in bbdd
            $browser->type("#name", "foo")->waitFor(".save-button");
            $browser
                ->click(".primary-button")
                ->waitFor("#todo-{$todo->id}")
                ->assertSee("foo");
        });
    }

    public function test_responsive_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit("/");

            //change device size and push new if we can't see the word Open or any button text its ok
            $browser->resize(375, 812);
            $browser
                ->click("#new")
                ->assertDontSee("Open")
                ->assertDontSee("Today")
                ->assertDontSee("Public")
                ->assertDontSee("Highligh")
                ->assertDontSee("Estimation")
                ->assertDontSee("Cancel")
                ->assertDontSee("Ok");
        });
    }

    public function test_tags_format_todo()
    {
        $todo = Todo::create([
            "title" =>
                "This a #todo test with test@email.test and www.link.tets and one @user",
        ]);
        $this->browse(function (Browser $browser) use ($todo) {
            $browser->visit("/");
            $tag = $browser->text(
                "span.rounded.bg-violet-300.px-1.text-violet-800"
            );
            $user = $browser->text(
                "span.rounded.bg-green-300.px-1.text-green-800"
            );

            $this->assertEquals("#todo", $tag);
            $this->assertEquals("@user", $user);
            $browser->assertSeeIn(
                "span.rounded.bg-orange-300.px-1.text-orange-800",
                "Mail"
            );
            $browser->assertSeeIn(
                "span.rounded.bg-blue-300.px-1.text-blue-800",
                "Link"
            );
        });
    }
}
