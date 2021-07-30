<div class="flex-1 relative" x-data>
    <form action="{{route('search')}}" autocomplete="off">

        <x-jet-input name="name" wire:model="search" type="text" class="flex w-full" placeholder="¿Qué estas buscando?" />

        <button class="absolute right-0 top-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
            <x-search size="40" color="white" />
        </button>
    </form>

    <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open}" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                <?$productName = ""?>
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}"
                            alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>Categoria: {{ $product->subcategory->category->name }}</p>
                            {{ $productName = $product->name }}
                        </div>
                    </a>
                @empty
                    <p class="text-lg leading-5">No existe ningun regitro con el valor ingresado</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
