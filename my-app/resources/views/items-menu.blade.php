<x-layout>
    @foreach ($items as $item)
        <x-item-card :item="$item" />
    @endforeach
</x-layout>
