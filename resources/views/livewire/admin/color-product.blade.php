<div>
    <div class="mt-12 bg-white shadow-lg rounded-lg p-6">
        {{-- Color --}}
        <div class="mb-6">
            <x-jet-label>
                Color
            </x-jet-label>
            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input type="radio" wire:model="color_id" name="color_id" value="{{ $color->id }}">
                        <span class="ml-2 text-gray-700 capitalize">{{ __($color->name) }}</span>
                    </label>
                @endforeach
            </div>
            <x-jet-input-error for="color_id" />
        </div>

        {{-- Cantidad --}}

        <div class="">

            <x-jet-label>
                Cantidad
            </x-jet-label>

            <x-jet-input type="number" class="w-full" wire:model="quantity" placeholder="Ingrese una cantidad" />

            <x-jet-input-error for="quantity" />
        </div>

        <div class="flex mt-4 justify-end items-center">

            <x-jet-action-message class="mr-3" on="saved">
                Agregado
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar
            </x-jet-button>
        </div>

    </div>
</div>
