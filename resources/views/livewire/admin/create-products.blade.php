<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta información para crear un producto
    </h1>

    <div class="grid grid-cols-2 gap-6 mb-4">
        {{-- CATEGORIA --}}
        <div>
            <x-jet-label value="Categorías" />
            <select class="w-full form-control" wire:model="category_id">

                <option value="" selected disabled>Selelciona un categoría</option>

                @foreach ($categories as $category)
                    <option value=" {{ $category->id }} "> {{ $category->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="category_id" />
        </div>
        {{-- Sub-categoria --}}
        <div>
            <x-jet-label value="Subcategorías" />
            <select class="w-full form-control" wire:model="subcategory_id">

                <option value="" selected disabled>Selelciona un Subcategoría</option>

                @foreach ($subcategories as $subcategory)

                    <option value=" {{ $subcategory->id }} "> {{ $subcategory->name }}</option>

                @endforeach
            </select>
            <x-jet-input-error for="subcategory_id" />
        </div>
    </div>
    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input class="w-full" wire:model="name" type="text" placeholder="Ingrese nombre del producto" />
        <x-jet-input-error for="name" />
    </div>
    {{-- Slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input class="w-full bg-gray-200" disabled wire:model="slug" type="text"
            placeholder="Ingrese el slug del producto" />
        <x-jet-input-error for="slug" />
    </div>

    {{-- Descripcion --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Descripción" />
            <textarea class="w-full form-control" cols="30" rows="4" wire:model="description" x-data x-init="ClassicEditor
                        .create( $refs.miEditor )
                        .then(function (editor){
                            editor.model.document.on('change:data', () => {
                                @this.set('description', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="miEditor">

            </textarea>
        </div>
        <x-jet-input-error for="description" />
    </div>

    <div class=" grid grid-cols-2 mb-4 gap-6">
        {{-- Marca --}}
        <div>
            <x-jet-label value="Marca" />
            <select class="form-control w-full" wire:model="brand_id">
                <option value="" selected disabled>Seleccione una marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                @endforeach
            </select>
            <x-jet-input-error for="brand_id" />
        </div>
        {{-- Precio --}}
        <div>
            <x-jet-label value="Precio" />
            <x-jet-input wire:model="price" type="number" class="w-full" step=".01" />
            <x-jet-input-error for="price" />
        </div>
    </div>


    @if ($subcategory_id)
        @if (!$this->subcategory->color && !$this->subcategory->size)
            <div>
                <x-jet-label value="Cantidad" />
                <x-jet-input wire:model="quantity" type="number" class="w-full" />
                <x-jet-input-error for="quantity" />
            </div>
        @endif
    @endif

    <div class="flex mt-4">
        <x-jet-button
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save"
            class="ml-auto">
            Crear Producto
        </x-jet-button>
    </div>

</div>