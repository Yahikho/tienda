<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta información para actualizar un producto
    </h1>

    <div class="mb-4" wire:ignore>
        <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
            id="my-awesome-dropzone"></form>
    </div>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- CATEGORIA --}}
            <div>
                <x-jet-label value="Categorías" />
                <select class="w-full form-control" wire:model="category_id">
                    <option value="" selected disabled>Seleccione una categoría</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="category_id" />
            </div>
            {{-- Sub-categoria --}}
            <div>
                <x-jet-label value="Subcategorías" />
                <select class="w-full form-control" wire:model="product.subcategory_id">

                    <option value="" selected disabled>Selelciona un Subcategoría</option>

                    @foreach ($subcategories as $subcategory)

                        <option value=" {{ $subcategory->id }} "> {{ $subcategory->name }}</option>

                    @endforeach
                </select>
                <x-jet-input-error for="product.subcategory_id" />
            </div>
        </div>
        {{-- Nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre" />
            <x-jet-input class="w-full" wire:model="product.name" type="text"
                placeholder="Ingrese nombre del producto" />
            <x-jet-input-error for="product.name" />
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
                <textarea class="w-full form-control" cols="30" rows="4" wire:model="product.description" x-data x-init="ClassicEditor
                            .create( $refs.miEditor )
                            .then(function (editor){
                                editor.model.document.on('change:data', () => {
                                    @this.set('product.description', editor.getData())
                                })
                            })
                            .catch( error => {
                                console.error( error );
                            } );" x-ref="miEditor">

                </textarea>
            </div>
            <x-jet-input-error for="product.description" />
        </div>

        <div class=" grid grid-cols-2 mb-4 gap-6">
            {{-- Marca --}}
            <div>
                <x-jet-label value="Marca" />
                <select class="form-control w-full" wire:model="product.brand_id">
                    <option value="" selected disabled>Seleccione una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                    @endforeach
                </select>
                <x-jet-input-error for="product.brand_id" />
            </div>
            {{-- Precio --}}
            <div>
                <x-jet-label value="Precio" />
                <x-jet-input wire:model="product.price" type="number" class="w-full" step=".01" />
                <x-jet-input-error for="product.price" />
            </div>
        </div>


        @if ($this->subcategory)
            @if (!$this->subcategory->color && !$this->subcategory->size)
                <div>
                    <x-jet-label value="Cantidad" />
                    <x-jet-input wire:model="product.quantity" type="number" class="w-full" />
                    <x-jet-input-error for="product.quantity" />
                </div>
            @endif
        @endif


        <div class="flex mt-4 justify-end items-center">

            <x-jet-action-message class="mr-3" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Actualizar Producto
            </x-jet-button>
        </div>
    </div>

    @if ($this->subcategory)

        @if ($this->subcategory->size)

            @livewire('admin.size-product', ['product' => $product], key('size-product' . $product->id))

        @elseif($this->subcategory->color)

            @livewire('admin.color-product', ['product' => $product], key('color-product' . $product->id))

        @endif

    @endif

    @push('script')
        <script>
            // "myAwesomeDropzone" is the camelized version of the HTML element's ID
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                },
                dictDefaultMessage : "Arrastre una imagen al recuadro",
                acceptedFiles : "image/*",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
            };
        </script>
    @endpush
</div>
