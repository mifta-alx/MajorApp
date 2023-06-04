<!-- Main modal -->
<div wire:ignore.self id="CreateModal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add School
                </h3>
                <button type="button" wire:click="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="CreateModal">
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
                    <div>
                        <label for="npsn"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('npsn') text-red-700 @enderror">NPSN</label>
                        <input type="text" name="npsn" id="npsn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-600 focus:border-secondary-600 block w-full p-2.5 @error('npsn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            value="{{ old('npsn') }}" placeholder="NPSN" wire:model="npsn">
                        @error('npsn')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="school_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('school_name') text-red-700 @enderror">Nama
                            Sekolah</label>
                        <input type="text" name="school_name" id="school_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('school_name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('school_name') }}" placeholder="Nama Sekolah" wire:model="school_name">
                        @error('school_name')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div wire:ignore.self class="">
                        <label for="province"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('province') text-red-700 @enderror">Provinsi</label>
                        <select id="province" wire:model="province" name="province"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('province') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih provinsi</option>
                            <option disabled="disabled" default="true">Pilih provinsi</option>
                            @forelse ($province_arr as $data_province => $value)
                                <option value="{{ $data_province }}" @if (old('province') == $data_province) selected @endif>
                                    {{ $data_province }}
                                </option>
                            @empty
                                <option disabled selected>No province found.</option>
                            @endforelse
                        </select>
                        @error('province')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div wire:ignore.self class="">
                        <label for="city_regency"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('city_regency') text-red-700 @enderror">Kota/Kabupaten</label>
                        <select id="city_regency" wire:model="city_regency" name="city_regency"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('city_regency') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih kota/kabupaten</option>
                            <option disabled="disabled" default="true">Pilih kota/kabupaten</option>
                            @if (isset($province))
                                @if (isset($province_arr[$province]))
                                    @forelse ($province_arr[$province] as $kabkota)
                                        <option>{{ $kabkota }}
                                        </option>
                                    @empty
                                        <option disabled selected>No city or regency found.</option>
                                    @endforelse
                                @endif
                            @endif
                        </select>
                        @error('city_regency')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('address') text-red-700 @enderror">Alamat</label>
                        <textarea id="address" wire:model="address" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary-500 focus:border-secondary-500 @error('address') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            placeholder="Alamat sekolah lengkap"></textarea>
                        @error('address')
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
                    Add new school
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
                    data-modal-toggle="EditModal">
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
                        <label for="npsn"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('npsn') text-red-700 @enderror">NPSN</label>
                        <input type="text" name="npsn" id="npsn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-600 focus:border-secondary-600 block w-full p-2.5 @error('npsn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            value="{{ old('npsn') }}" placeholder="NPSN" wire:model="npsn">
                        @error('npsn')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="school_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('school_name') text-red-700 @enderror">Nama
                            Sekolah</label>
                        <input type="text" name="school_name" id="school_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('school_name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('school_name') }}" placeholder="Nama Sekolah" wire:model="school_name">
                        @error('school_name')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div wire:ignore.self class="">
                        <label for="province"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('province') text-red-700 @enderror">Provinsi</label>
                        <select id="province" wire:model="province" name="province"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('province') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih provinsi</option>
                            <option disabled="disabled" default="true">Pilih provinsi</option>
                            @forelse ($province_arr as $data_province => $value)
                                <option value="{{ $data_province }}"
                                    @if (old('province') == $data_province) selected @endif>
                                    {{ $data_province }}
                                </option>
                            @empty
                                <option disabled selected>No province found.</option>
                            @endforelse
                        </select>
                        @error('province')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div wire:ignore.self class="">
                        <label for="city_regency"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('city_regency') text-red-700 @enderror">Kota/Kabupaten</label>
                        <select id="city_regency" wire:model="city_regency" name="city_regency"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('city_regency') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih kota/kabupaten</option>
                            <option disabled="disabled" default="true">Pilih kota/kabupaten</option>
                            @if (isset($province))
                                @if (isset($province_arr[$province]))
                                    @forelse ($province_arr[$province] as $kabkota)
                                        <option>{{ $kabkota }}
                                        </option>
                                    @empty
                                        <option disabled selected>No city or regency found.</option>
                                    @endforelse
                                @endif
                            @endif
                        </select>
                        @error('city_regency')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('address') text-red-700 @enderror">Alamat</label>
                        <textarea id="address" wire:model="address" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary-500 focus:border-secondary-500 @error('address') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            placeholder="Alamat sekolah lengkap"></textarea>
                        @error('address')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-secondary-500 hover:bg-secondary-600 focus:ring-2 focus:outline-none focus:ring-secondary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update school
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
            <button type="button" wire:click="closeModal"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-toggle="DeleteModal">
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
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Ya, Saya Yakin
                </button>
                <button data-modal-toggle="DeleteModal" type="button" wire:click="closeModal"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                    Batal</button>
            </div>
        </div>
    </form>
</div>
