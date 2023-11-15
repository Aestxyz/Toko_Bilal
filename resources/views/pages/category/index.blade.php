<?php

use Livewire\WithPagination;
use Livewire\Volt\Component;
use App\Models\Category;

new class extends Component {
    use WithPagination;

    public function with(): array
    {
        return [
            'categories' => Category::latest()->paginate(10),
        ];
    }
};
?>

<x-app-layout>
    @volt
        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Kategori Produk') }}
                </h2>
            </x-slot>

            <div class="card bg-white mt-10">
                <div class="card-body">
                    @include('pages.category.create')
                    <div class="overflow-x-auto border pt-2 rounded">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $no => $category)
                                    <tr>
                                        <th>{{ ++$no }}</th>
                                        <th>{{ $category->name }}</th>
                                        <th>#</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    @endvolt
</x-app-layout>
