<div class="shadow-md">
    <div class="border p-2 border-gray-200">
        <div x-data="{isNew : @entangle('isNew'), newTitle: @entangle('newTitle')}">
            @if (!isset($editing))

            <div x-show='isNew'>
                @include('todo.new')
            </div>
            <div class="flex" @click="isNew=true" x-show="! isNew">
                <x-heroicon-o-plus-circle class="w-6 h-6 text-blue-500 " />
                <span class="ml-2 text-gray-400">Type to add new task</span>
                <div class="avatar ml-auto opacity-60">
                    <img src="{{ asset('avatar.webp') }}" alt="avatar" class="rounded-full w-6">
                </div>
            </div>

            @endif
        </div>
        <div class="p-2 mt-2 grid-flow-row">
            <ul x-data="formatHTML()">
                @foreach ($todos as $todo)
                @if (isset($editing)&&$editing->is($todo))
                <div>
                    @include('todo.edit', $editing)
                </div>
                @else
                <li>
                    <div class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4">
                        <span class="ml-2 cursor-pointer" )" wire:click="selectEdit({{$todo}})"
                            x-html="formatText('{{$todo->title}}')"></span>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
</div>