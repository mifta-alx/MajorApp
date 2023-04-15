<div class="relative w-full h-full max-w-4xl md:h-auto">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-6 border-b rounded-t">
            <ol
                class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Data <span class="hidden sm:inline-flex sm:ml-2">Siswa</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="mr-2">2</span>
                        Data <span class="hidden sm:inline-flex sm:ml-2">Sekolah</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="mr-2">3</span>
                        Data <span class="hidden sm:inline-flex sm:ml-2">Kontak</span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">4</span>
                    Confirmation
                </li>
            </ol>
            {{-- <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Terms of Service
            </h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="defaultModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button> --}}

        </div>
        <!-- Modal body -->
        <form wire:submit.prevent="save">
            <div class="p-6">
                {{-- <ol
                    class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                    <li
                        class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span
                            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Data <span class="hidden sm:inline-flex sm:ml-2">Siswa</span>
                        </span>
                    </li>
                    <li
                        class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span
                            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <span class="mr-2">2</span>
                            Data <span class="hidden sm:inline-flex sm:ml-2">Sekolah</span>
                        </span>
                    </li>
                    <li
                        class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span
                            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <span class="mr-2">3</span>
                            Data <span class="hidden sm:inline-flex sm:ml-2">Kontak</span>
                        </span>
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">4</span>
                        Confirmation
                    </li>
                </ol> --}}
                {{-- STEP 1 --}}
                <div class="">
                    @if ($currentStep == 1)
                        @csrf
                        <div class="md:grid grid-cols-2 gap-4 mb-4">
                            <div class="mb-4 md:mb-0">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('nisn') text-red-700 @enderror">NISN</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('nisn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="NISN" name="nisn" value="{{ old('nisn') }}" wire:model='nisn'>
                                @error('nisn')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 md:mb-0">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('student_name') text-red-700 @enderror">Nama
                                    Siswa</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('student_name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Nama Siswa" name="student_name" value="{{ old('student_name') }}"
                                    wire:model='student_name'>
                                @error('student_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 @error('gender') text-red-700 @enderror">Jenis
                                Kelamin</label>
                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <input id="inline-radio" type="radio" value="Laki - laki" wire:model='gender'
                                        name="inline-radio-group"
                                        class="w-4 h-4 text-secondary-500 bg-gray-100 border-gray-300 focus:ring-secondary-500 focus:ring-2">
                                    <label for="inline-radio"
                                        class="ml-2 text-sm font-medium text-gray-900 @error('gender') text-red-600 @enderror">Laki
                                        -
                                        laki</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="inline-2-radio" type="radio" value="Perempuan" wire:model='gender'
                                        name="inline-radio-group"
                                        class="w-4 h-4 text-secondary-600 bg-gray-100 border-gray-300 focus:ring-secondary-500 focus:ring-2">
                                    <label for="inline-2-radio"
                                        class="ml-2 text-sm font-medium text-gray-900 @error('gender') text-red-600 @enderror">Perempuan</label>
                                </div>
                            </div>
                            @error('gender')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:grid grid-cols-2 gap-4 mb-4">
                            <div class="md:mb-0 mb-4">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('birth_place') text-red-700 @enderror">Tempat
                                    Lahir</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('birth_place') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Tempat Lahir" name="birth_place" value="{{ old('birth_place') }}"
                                    wire:model='birth_place'>
                                @error('birth_place')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <div class="grid md:grid-cols-6 grid-cols-4 gap-4">
                                    <div class="md:col-span-4 col-span-2">
                                        <label for="month"
                                            class="block mb-2 text-sm font-medium text-gray-900 @error('month') text-red-700 @enderror">Bulan</label>
                                        <select id="month" name="month" wire:model='month'
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('month') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                                            <option selected>Bulan</option>
                                            <option value="Januari" {{ old('month') == 'Januari' ? 'selected' : '' }}>
                                                Januari
                                            </option>
                                            <option value="Februari" {{ old('month') == 'Februari' ? 'selected' : '' }}>
                                                Februari</option>
                                            <option value="Maret" {{ old('month') == 'Maret' ? 'selected' : '' }}>Maret
                                            </option>
                                            <option value="April" {{ old('month') == 'April' ? 'selected' : '' }}>
                                                April
                                            </option>
                                            <option value="Mei" {{ old('month') == 'Mei' ? 'selected' : '' }}>Mei
                                            </option>
                                            <option value="Juni" {{ old('month') == 'Juni' ? 'selected' : '' }}>Juni
                                            </option>
                                            <option value="Juli" {{ old('month') == 'Juli' ? 'selected' : '' }}>Juli
                                            </option>
                                            <option value="Agustus" {{ old('month') === 'Agustus' ? 'selected' : '' }}>
                                                Agustus
                                            </option>
                                            <option value="September"
                                                {{ old('month') === 'September' ? 'selected' : '' }}>
                                                September</option>
                                            <option value="Oktober"
                                                {{ old('month') === 'Oktober' ? 'selected' : '' }}>
                                                Oktober
                                            </option>
                                            <option value="November"
                                                {{ old('month') === 'November' ? 'selected' : '' }}>
                                                November</option>
                                            <option value="Desember"
                                                {{ old('month') === 'Desember' ? 'selected' : '' }}>
                                                Desember</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900 @error('day') text-red-700 @enderror">Hari</label>
                                        <input type="text"
                                            class="shadow-sm bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('day') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                            placeholder="DD" name="day" value="{{ old('day') }}"
                                            wire:model='day' autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900 @error('year') text-red-700 @enderror">Tahun</label>
                                        <input type="text"
                                            class="shadow-sm bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('year') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                            placeholder="YYYY" name="year" value="{{ old('year') }}"
                                            wire:model='year' autocomplete="off">
                                    </div>
                                </div>
                                @error('month')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @error('day')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @error('year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="md:grid grid-cols-2 gap-4">
                            <div class="mdLmb-0 mb-4">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('email') text-red-700 @enderror">Email</label>
                                <input type="email"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('email') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Email" name="email" value="{{ old('email') }}" wire:model='email'>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:mb-0 mb-4">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('phone') text-red-700 @enderror">Nomor
                                    Telepon</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('phone') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Nomor Telepon" name="phone" value="{{ old('phone') }}"
                                    wire:model='phone'>
                                @error('phone')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @endif
                    {{-- STEP 2 --}}
                    @if ($currentStep == 2)
                        @csrf
                        <div class="mb-4">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 @error('npsn') text-red-700 @enderror">NPSN</label>
                            <input type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('npsn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="NPSN" name="npsn" value="{{ old('npsn') }}" wire:model='npsn'>
                            @error('npsn')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 @error('school_name') text-red-700 @enderror">Nama
                                Sekolah</label>
                            <input type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('school_name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Nama Sekolah" name="school_name" value="{{ old('school_name') }}"
                                wire:model='school_name'>
                            @error('school_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 @error('address') text-red-700 @enderror">Alamat</label>
                            <input type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('address') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Alamat" name="address" value="{{ old('address') }}"
                                wire:model='address'>
                            @error('address')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 @error('city_regency') text-red-700 @enderror">Kota/Kabupaten</label>
                            <input type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('city_regency') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Kota/Kabupaten" name="city_regency" value="{{ old('city_regency') }}"
                                wire:model='city_regency'>
                            @error('city_regency')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 @error('province') text-red-700 @enderror">Provinsi</label>
                            <input type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('province') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Provinsi" name="province" value="{{ old('province') }}"
                                wire:model='province'>
                            @error('province')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                    {{-- STEP 3 --}}
                    @if ($currentStep == 3)
                        @csrf
                        
                    @endif
                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center @if ($currentStep == 2) justify-between @endif justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                @if ($currentStep == 2)
                    <button type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                        wire:click="decreaseStep()">Back</button>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                @endif
                @if ($currentStep == 1)
                    <button type="button"
                        class="text-white bg-secondary-700 hover:bg-secondary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-secondary-600 dark:hover:bg-secondary-700 dark:focus:ring-secondary-800"
                        wire:click="increaseStep()">Next</button>
                @endif
            </div>
        </form>
    </div>
</div>
