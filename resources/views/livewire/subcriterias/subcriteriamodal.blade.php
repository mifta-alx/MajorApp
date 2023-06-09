<!-- Main modal -->
<div wire:ignore.self id="CreateModal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Subcriteria
                </h3>
                <button type="button" wire:click="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="CreateModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent='store'>
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div wire:ignore.self>
                        <label for="criteria_id"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('criteria_id') text-red-700 @enderror">Kriteria</label>
                        <select id="criteria_id" wire:model="criteria_id" name="criteria_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('criteria_id') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih kriteria</option>
                            <option disabled="disabled" default="true">Pilih kriteria</option>
                            @forelse ($criterias as $key => $value)
                                <option value="{{ $value->criteria_id }}"
                                    @if (old('criteria_id') == $value->criteria_id) selected @endif>{{ $value->criteria_name }}
                                </option>
                            @empty
                                <option disabled selected>No subcriteria found.</option>
                            @endforelse
                        </select>
                        @error('criteria_id')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subcriteria_start"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('subcriteria_start') text-red-700 @enderror">Nilai
                            Awal</label>
                        <input type="text" name="subcriteria_start" id="subcriteria_start"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-600 focus:border-secondary-600 block w-full p-2.5 @error('subcriteria_start') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            value="{{ old('subcriteria_start') }}" placeholder="Nilai Awal"
                            wire:model="subcriteria_start">
                        @error('subcriteria_start')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subcriteria_end"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('subcriteria_end') text-red-700 @enderror">Nilai
                            Akhir</label>
                        <input type="text" name="subcriteria_end" id="subcriteria_end"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('subcriteria_end') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('subcriteria_end') }}" placeholder="Nilai Akhir" wire:model="subcriteria_end">
                        @error('subcriteria_end')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subcriteria_score"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('subcriteria_score') text-red-700 @enderror">Nilai
                            Subkriteria</label>
                        <input type="text" name="subcriteria_score" id="subcriteria_score"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('subcriteria_score') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('subcriteria_score') }}" placeholder="Nilai Subkriteria"
                            wire:model="subcriteria_score">
                        @error('subcriteria_score')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-secondary-500 hover:bg-secondary-600 focus:ring-2 focus:outline-none focus:ring-secondary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add new subcriteria
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Update modal -->
<div wire:ignore.self id="EditModal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Subcriteria
                </h3>
                <button type="button" wire:click="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="EditModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent='update'>
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="criteria_id"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('criteria_id') text-red-700 @enderror">Kriteria</label>
                        <select id="criteria_id" wire:model="criteria_id" name="criteria_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('criteria_id') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih kriteria</option>
                            <option disabled="disabled" default="true">Pilih kriteria</option>
                            @forelse ($criterias as $item)
                                <option value="{{ $item->criteria_id }}"
                                    {{ old('criteria_id') == $item->criteria_id ? 'selected' : '' }}>
                                    {{ $item->criteria_name }}</option>
                            @empty
                                <option>No subcriteria found.</option>
                            @endforelse
                        </select>
                        @error('criteria_id')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subcriteria_start"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('subcriteria_start') text-red-700 @enderror">Nilai
                            Awal</label>
                        <input type="text" name="subcriteria_start" id="subcriteria_start"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-600 focus:border-secondary-600 block w-full p-2.5 @error('subcriteria_start') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            value="{{ old('subcriteria_start') }}" placeholder="Nilai Awal"
                            wire:model="subcriteria_start">
                        @error('subcriteria_start')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subcriteria_end"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('subcriteria_end') text-red-700 @enderror">Nilai
                            Akhir</label>
                        <input type="text" name="subcriteria_end" id="subcriteria_end"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('subcriteria_end') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('subcriteria_end') }}" placeholder="Nilai Akhir"
                            wire:model="subcriteria_end">
                        @error('subcriteria_end')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subcriteria_score"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('subcriteria_score') text-red-700 @enderror">Nilai
                            Subkriteria</label>
                        <input type="text" name="subcriteria_score" id="subcriteria_score"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('subcriteria_score') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('subcriteria_score') }}" placeholder="Nilai Subkriteria"
                            wire:model="subcriteria_score">
                        @error('subcriteria_score')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-secondary-500 hover:bg-secondary-600 focus:ring-2 focus:outline-none focus:ring-secondary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update subcriteria
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div wire:ignore.self id="DeleteModal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <form class="relative w-full h-full max-w-md md:h-auto" wire:submit.prevent='destroy'>
        @csrf
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="DeleteModal" wire:click="closeModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Apakah anda yakin untuk menghapus
                    data ini?</h3>
                <button type="submit" type="button"
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Ya, Saya Yakin
                </button>
                <button data-modal-hide="DeleteModal" type="button" wire:click="closeModal"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-2 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                    Batal</button>
            </div>
        </div>
    </form>
</div>
