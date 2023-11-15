<?php

use function Livewire\Volt\{state, rules};
use App\Models\Category;

state(['name' => fn () $categories]);
rules(['name' => 'required|min:6']);

$save = function () {
    Category::create($this->validate())->with('success', 'Berhasil');
};

?>

@volt
    <div>
        <!-- Open the modal using ID.showModal() method -->
        <button class="btn" onclick="my_modal_5.showModal()">open modal</button>
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <form wire:submit="save">

                    <x-input-label for="name" :value="__('Nama Kategori')" />
                    <x-text-input wire:loading.attr="disabled" wire:model="name" id="name" class="block mt-1 w-full"
                        type="name" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <x-primary-button wire:loading.attr='disabled' class="mt-5">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </form>
            </div>
        </dialog>
    </div>
@endvolt
