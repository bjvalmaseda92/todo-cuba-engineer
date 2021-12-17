<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $title;
    public $todos;
    public ?Todo $editing;
    public $editingTitle;

    public function mount()
    {
        $this->todos = Todo::all();
    }

    public function addTodo()
    {
        $this->validate(["title" => "required"]);
        $todo = Todo::create(["title" => $this->title, "user_id" => 1]);
        $this->todos->push($todo);
        $this->title = "";
    }

    public function selectEdit(Todo $todo)
    {
        $this->editing = $todo;
        $this->editingTitle = $todo->title;
    }

    public function cancelEdit()
    {
        $this->editingTitle = "";
        $this->editing = null;
    }

    public function updateTodo()
    {
        $this->editing->update(["title" => $this->editingTitle]);
        $this->editingTitle = "";
        $this->editing = null;
        $this->todos = Todo::all();
    }

    public function render()
    {
        return view("livewire.todos");
    }
}
