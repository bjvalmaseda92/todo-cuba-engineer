<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $title;
    public $todos;

    public function mount()
    {
        $this->todos = Todo::all();
    }

    public function addTodo()
    {
        $todo = Todo::create(["title" => $this->title, "user_id" => 1]);
        $this->todos->push($todo);
        $this->title = "";
    }

    public function render()
    {
        return view("livewire.todos");
    }
}
