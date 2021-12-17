<div class="shadow-md">
    <div class="border p-2 border-gray-200">
        @if (!isset($editing))
        @if ($new)
        @include('todo.new')
        @else
        <div class="flex" wire:click="newTodo">
            <x-heroicon-o-plus-circle class="w-6 h-6 text-blue-500 " />
            <span class="ml-2 text-gray-400">Type to add new task</span>
            <div class="avatar ml-auto">
                <img src="{{ asset('avatar.webp') }}" alt="avatar" class="rounded-full w-6">
            </div>
        </div>
        @endif
        @endif
        <div class="p-2 mt-2 grid-flow-row">
            <ul>
                @foreach ($todos as $todo)
                @if (isset($editing)&&$editing->id==$todo->id)
                <div>
                    @include('todo.edit', $editing)
                </div>
                @else
                <li>
                    <div class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4">
                        <span class="ml-2 cursor-pointer" wire:click="selectEdit({{$todo}})">{{$todo->title}}</span>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>