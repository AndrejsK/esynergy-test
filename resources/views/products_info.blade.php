<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product info
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Name: {{ $product->name }} <br>
                    Amount: {{ $product->amount }} <br>
                    Price: {{ $product->price }} <br>
                    @can('update', $product)
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    @endcan
                    @can('delete', $product)
                        <td>
                            <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <x-button>Delete</x-button>
                            </form>
                        </td>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
