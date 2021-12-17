<form wire:submit.prevent="updateTodo">
    <div class="shadow-md">
        <div class="border p-2 border-gray-200">
            <div class="flex">
                <x-heroicon-o-plus-circle class="w-6 h-6 text-blue-500 " />
                <input type="text" placeholder="Type to add new task" class="focus:outline-none ml-2 w-5/6"
                    wire:model="editingTitle">
                <div class="avatar ml-auto">
                    <img src="{{ asset('avatar.webp') }}" alt="avatar" class="rounded-full w-6">
                </div>
            </div>
        </div>
        <div class="border p-2 border-gray-200 bg-gray-50">
            <div class="flex py-3">
                <a href="" class="flex border rounded px-3 py-1 bg-gray-200 text-gray-400 mr-6">
                    <x-heroicon-o-arrows-expand class="w-6 h-6 mr-1" />
                    <span>Open</span>
                </a>
                <a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2">
                    <x-heroicon-o-calendar class="w-6 h-6 mr-1" />
                    <span>Today</span>
                </a>
                <a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2">
                    <x-heroicon-o-lock-open class="w-6 h-6 mr-1" />
                    <span>Public</span>
                </a>
                <a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2">
                    <x-heroicon-o-sparkles class="w-6 h-6 mr-1" />
                    <span>Highlight</span>
                </a>
                <a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2">
                    <x-heroicon-o-stop class="w-6 h-6 mr-1" />
                    <span>Estimation</span>
                </a>
                <div class="ml-auto flex">
                    <span class="flex border rounded px-3 py-1 text-gray-600 mr-2 ml-auto bg-gray-200 cursor-pointer"
                        wire:click="cancelEdit">
                        Cancel
                    </span>
                    <button type="submit" class="flex border rounded px-3 py-1 text-white mr-2 ml-auto bg-blue-500">
                        <i class="far fa-save mt-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>