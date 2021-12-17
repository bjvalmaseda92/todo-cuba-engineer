<div class="shadow-md">
    <div class="border p-2 border-gray-200">
        @if (!isset($editing))
        <div class="flex">
            <x-heroicon-o-plus-circle class="w-6 h-6 text-blue-500 " />
            <input type="text" placeholder="Type to add new task" class="focus:outline-none ml-2 w-5/6"
                wire:model.lazy="title">
            <div class="avatar ml-auto">
                <img src="{{ asset('avatar.webp') }}" alt="avatar" class="rounded-full w-6">
            </div>
        </div>
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
                        <input type="checkbox" class="form-checkbox h-4 w-4" checked>
                        <span class="ml-2 cursor-pointer" wire:click="selectEdit({{$todo}})">{{$todo->title}}</span>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>