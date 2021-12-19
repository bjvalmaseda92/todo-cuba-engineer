<form wire:submit.prevent='addTodo'>
    <div class="shadow-md">
        <div class="border p-2 border-gray-200">
            <div class="flex">
                <x-heroicon-o-plus-circle class="w-6 h-6 text-blue-500 " />

                <input type="text" placeholder="Type to add new task" class="focus:outline-none ml-2 w-5/6"
                    wire:model="newTitle" name="newTitle">
                <div
                    class="avatar ml-auto @if($newTitle=="") opacity-60 cursor-not-allowed @else cursor-pointer @endif">
                    <img src="{{ asset('avatar.webp') }}" alt="avatar" class="rounded-full w-6">
                </div>
            </div>
        </div>
        <div class="border p-2 border-gray-200 bg-gray-50">
            <div class="flex py-3">
                @include('todo.action-button') {{-- botones de accion --}}
                <div class="ml-auto flex">
                    <span
                        class="secondary-button hidden xl:flex border rounded px-3 py-1 text-gray-600 mr-2 ml-auto bg-gray-200 cursor-pointer"
                        @click="isNew=false, newTitle=''">
                        Cancel
                    </span>
                    @if ($newTitle!="")
                    <button type="submit"
                        class="primary-button flex border rounded px-3 py-1 text-white mr-2 ml-auto bg-blue-500">
                        <span class="add-button hidden xl:block">
                            Add
                        </span>
                        <x-heroicon-o-plus-sm class="w-6 h-6 xl:hidden" />
                    </button>
                    @else
                    <span
                        class="primary-button flex border rounded px-3 py-1 text-white mr-2 ml-auto bg-blue-500 cursor-pointer"
                        @click="isNew=false">
                        <span class="hidden xl:block">
                            Ok
                        </span>
                        <span class="xl:hidden">
                            X
                        </span>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>