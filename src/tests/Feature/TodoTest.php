<?php

namespace Tests\Feature;

use App\Http\Livewire\Todos;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_todo_index_page_is_rendered()
    {
        $this->withExceptionHandling();

        $response = $this->get("/");

        $response->assertStatus(200);
    }

    public function test_exists_todos_components_in_index_page()
    {
        $this->withExceptionHandling();
        $this->get("/")->assertSeeLivewire("todos");
    }

    public function test_user_can_create_todo()
    {
        Livewire::test(Todos::class)
            ->call("newTodo")
            ->set("newTitle", "foo")
            ->call("addTodo");

        $this->assertTrue(Todo::whereTitle("foo")->exists());
    }

    public function test_past_form_validation()
    {
        Livewire::test(Todos::class)
            ->set("newTitle", "")
            ->call("addTodo")
            ->assertHasErrors(["newTitle" => "required"]);
    }

    public function test_user_can_edit_todo()
    {
        $todo = Todo::factory()->create();

        Livewire::test(Todos::class)
            ->call("selectEdit", $todo)
            ->set("editingTitle", "foo")
            ->call("updateTodo", $todo);

        $todo->refresh();
        $this->assertEquals("foo", $todo->title);
    }
}
