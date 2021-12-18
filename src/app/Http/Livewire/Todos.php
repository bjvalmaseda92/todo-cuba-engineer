<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Expr\FuncCall;

class Todos extends Component
{
    public $newTitle;
    public $isNew = false;
    public $todos;
    public ?Todo $editing;
    public $editingTitle;
    public $isEdited = false;

    public function mount()
    {
        $this->todos = Todo::all();
    }

    public function newTodo()
    {
        $this->isNew = true;
    }

    public function cancelNewTodo()
    {
        $this->newTitle = null;
        $this->isNew = false;
        $this->isEdited = false;
    }

    public function addTodo()
    {
        $this->validate(["newTitle" => "required"]);

        $todo = Todo::create(["title" => $this->newTitle, "user_id" => 1]);
        $this->todos->push($todo);
        $this->todos = Todo::all();
        $this->cancelNewTodo();
    }

    public function selectEdit(Todo $todo)
    {
        $this->cancelNewTodo();
        $this->editing = $todo;
        $this->editingTitle = $todo->title;
    }

    public function cancelEdit()
    {
        $this->editingTitle = "";
        $this->editing = null;
        $this->cancelNewTodo();
    }

    public function updateTodo(Todo $todo)
    {
        $todo->update(["title" => $this->editingTitle]);
        $this->todos = Todo::all();
        $this->cancelEdit();
    }

    public function render()
    {
        return view("livewire.todos");
    }

    public function updatedEditingTitle($name, $value)
    {
        $this->isEdited = true;
    }
}
