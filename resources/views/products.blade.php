<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('create', \App\Models\Product::class)
                        <a href="{{ route('products.create') }}">Create new entry</a>
                    @endcan
                    <table class="table table-striped">
                        <thead>
                        <td>Name of product (link to more info)</td>
                        <td>Amount of product</td>
                        <td>Price per unit</td>
                        </thead>
                        @foreach($products as $product)
                            <tr>
                                <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->amount }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
