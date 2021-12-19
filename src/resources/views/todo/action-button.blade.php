@if ($newTitle!="")
<a href="" class="flex border rounded px-3 py-1 bg-gray-300 text-gray-500 mr-6 cursor-pointer">
    <x-heroicon-o-arrows-expand class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Open</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-500 mr-2 cursor-pointer">
    <x-heroicon-o-calendar class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Today</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-500 mr-2 cursor-pointer">
    <x-heroicon-o-lock-open class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Public</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-500 mr-2 cursor-pointer">
    <x-heroicon-o-sparkles class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Highlight</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-500 mr-2 cursor-pointer">
    <x-heroicon-o-stop class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Estimation</span>
</a>
@else
<a href="" class="flex border rounded px-3 py-1 bg-gray-200 text-gray-400 mr-6 cursor-not-allowed">
    <x-heroicon-o-arrows-expand class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Open</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2 cursor-not-allowed">
    <x-heroicon-o-calendar class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Today</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2 cursor-not-allowed">
    <x-heroicon-o-lock-open class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Public</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2 cursor-not-allowed">
    <x-heroicon-o-sparkles class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Highlight</span>
</a>
<a href="" class="flex border rounded px-3 py-1 text-gray-400 mr-2 cursor-not-allowed">
    <x-heroicon-o-stop class="w-6 h-6 mr-1" />
    <span class="hidden xl:block">Estimation</span>
</a>
@endif