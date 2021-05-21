<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('products.store') }}">
                        @csrf
                        <x-label for="name" value="Name"/>
                        <x-input id="name" name="name" type="text" :value="old('name')" required autofocus/>
                        <x-validation-error class="mb-4" :errors="$errors" title="name"/>

                        <x-label for="amount" value="Amount"/>
                        <x-input id="amount" name="amount" type="number" min="0" :value="old('amount')" required/>
                        <x-validation-error class="mb-4" :errors="$errors" title="amount"/>

                        <x-label for="price" value="Price"/>
                        <x-input id="price" name="price" type="number" min="0" max="999999.99" step="0.01" :value="old('price')" required/>
                        <x-validation-error class="mb-4" :errors="$errors" title="price"/>

                        <x-button>Create</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
