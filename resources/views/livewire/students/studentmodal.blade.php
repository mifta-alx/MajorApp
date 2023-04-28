<!-- Main modal -->
<div wire:ignore.self id="CreateModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Student
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
                    <div>
                        <label for="nisn"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('nisn') text-red-700 @enderror">NISN</label>
                        <input type="text" name="nisn" id="nisn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-600 focus:border-secondary-600 block w-full p-2.5 @error('nisn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            value="{{ old('nisn') }}" placeholder="NISN" wire:model="nisn">
                        @error('nisn')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="student_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('student_name') text-red-700 @enderror">Nama
                            Siswa</label>
                        <input type="text" name="student_name" id="student_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('student_name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('student_name') }}" placeholder="Nama Siswa" wire:model="student_name">
                        @error('student_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('gender') text-red-700 @enderror">Jenis
                            Kelamin</label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input id="inline-radio" type="radio" value="Male" wire:model='gender'
                                    name="inline-radio-group"
                                    class="w-4 h-4 text-secondary-500 bg-gray-100 border-gray-300 focus:ring-secondary-500 focus:ring-2 @error('gender') text-red-700 border-red-500 bg-red-50 @enderror">
                                <label for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 @error('gender') text-red-600 @enderror">Laki
                                    -
                                    laki</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="inline-2-radio" type="radio" value="Female" wire:model='gender'
                                    name="inline-radio-group"
                                    class="w-4 h-4 text-secondary-600 bg-gray-100 border-gray-300 focus:ring-secondary-500 focus:ring-2 @error('gender') text-red-700 border-red-500 bg-red-50 @enderror">
                                <label for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 @error('gender') text-red-600 @enderror">Perempuan</label>
                            </div>
                        </div>
                        @error('gender')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
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
                    <div>
                        <div class="grid md:grid-cols-4 gap-4">
                            <div class="sm:col-span-2" wire:ignore.self >
                                <label for="month"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('month') text-red-700 @enderror">Bulan</label>
                                <select id="month" name="month" wire:model='month'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('month') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                                    <option hidden>Bulan</option>
                                    <option disabled="disabled" default="true">Bulan</option>
                                    @forelse ($months as $month)
                                        <option value="{{ $month }}"
                                            @if (old('month') == $month) selected @endif>{{ $month }}
                                        </option>
                                    @empty
                                        <option disabled selected>No month found.</option>
                                    @endforelse
                                </select>
                            </div>
                            <div>
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('day') text-red-700 @enderror">Hari</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('day') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="DD" name="day" value="{{ old('day') }}" wire:model='day'
                                    autocomplete="off">
                            </div>
                            <div>
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('year') text-red-700 @enderror">Tahun</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('year') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="YYYY" name="year" value="{{ old('year') }}" wire:model='year'
                                    autocomplete="off">
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
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('email') text-red-700 @enderror">Email</label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('email') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('email') }}" placeholder="name@company.com"
                            wire:model="email">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('phone') text-red-700 @enderror">No, Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('phone') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('phone') }}" placeholder="No. Telepon" wire:model="phone">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div wire:ignore.self class="sm:col-span-2">
                        <label for="npsn"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('npsn') text-red-700 @enderror">Asal Sekolah</label>
                        <select id="npsn" wire:model="npsn" name="npsn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('npsn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih asal sekolah</option>
                            <option disabled="disabled" default="true">Pilih asal sekolah</option>
                            @forelse ($schools as $key => $value)
                                <option value="{{ $value->npsn }}" @if (old('npsn') == $value->npsn ) selected @endif>{{ $value->school_name }}</option>
                            @empty
                                <option disabled selected>No school found.</option>
                            @endforelse
                        </select>
                        @error('npsn')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
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
                    Add new student
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Update modal -->
<div wire:ignore.self id="EditModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Student
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
                        <label for="nisn"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('nisn') text-red-700 @enderror">NISN</label>
                        <input type="text" name="nisn" id="nisn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-600 focus:border-secondary-600 block w-full p-2.5 @error('nisn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                            value="{{ old('nisn') }}" placeholder="NISN" wire:model="nisn">
                        @error('nisn')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="student_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('student_name') text-red-700 @enderror">Nama
                            Siswa</label>
                        <input type="text" name="student_name" id="student_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('student_name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('student_name') }}" placeholder="Nama Siswa" wire:model="student_name">
                        @error('student_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('gender') text-red-700 @enderror">Jenis
                            Kelamin</label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input id="inline-radio" type="radio" value="Male" wire:model='gender'
                                    name="inline-radio-group"
                                    class="w-4 h-4 text-secondary-500 bg-gray-100 border-gray-300 focus:ring-secondary-500 focus:ring-2 @error('gender') text-red-700 border-red-500 bg-red-50 @enderror">
                                <label for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 @error('gender') text-red-600 @enderror">Laki
                                    -
                                    laki</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="inline-2-radio" type="radio" value="Female" wire:model='gender'
                                    name="inline-radio-group"
                                    class="w-4 h-4 text-secondary-600 bg-gray-100 border-gray-300 focus:ring-secondary-500 focus:ring-2 @error('gender') text-red-700 border-red-500 bg-red-50 @enderror">
                                <label for="inline-2-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 @error('gender') text-red-600 @enderror">Perempuan</label>
                            </div>
                        </div>
                        @error('gender')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
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
                    <div>
                        <div class="grid md:grid-cols-4 gap-4">
                            <div class="sm:col-span-2" wire:ignore.self >
                                <label for="month"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('month') text-red-700 @enderror">Bulan</label>
                                <select id="month" name="month" wire:model='month'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('month') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                                    <option hidden>Bulan</option>
                                    <option disabled="disabled" default="true">Bulan</option>
                                    @forelse ($months as $month)
                                        <option value="{{ $month }}"
                                            @if (old('month') == $month) selected @endif>{{ $month }}
                                        </option>
                                    @empty
                                        <option disabled selected>No month found.</option>
                                    @endforelse
                                </select>
                            </div>
                            <div>
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('day') text-red-700 @enderror">Hari</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('day') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="DD" name="day" value="{{ old('day') }}" wire:model='day'
                                    autocomplete="off">
                            </div>
                            <div>
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 @error('year') text-red-700 @enderror">Tahun</label>
                                <input type="text"
                                    class="shadow-sm bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('year') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="YYYY" name="year" value="{{ old('year') }}" wire:model='year'
                                    autocomplete="off">
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
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('email') text-red-700 @enderror">Email</label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('email') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('email') }}" placeholder="name@company.com"
                            wire:model="email">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('phone') text-red-700 @enderror">No, Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('phone') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror focus:ring-secondary-600 focus:border-secondary-600 "
                            value="{{ old('phone') }}" placeholder="No. Telepon" wire:model="phone">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div wire:ignore.self class="sm:col-span-2">
                        <label for="npsn"
                            class="block mb-2 text-sm font-medium text-gray-900 @error('npsn') text-red-700 @enderror">Asal Sekolah</label>
                        <select id="npsn" wire:model="npsn" name="npsn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('npsn') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option hidden>Pilih asal sekolah</option>
                            <option disabled="disabled" default="true">Pilih asal sekolah</option>
                            @forelse ($schools as $key => $value)
                                <option value="{{ $value->npsn }}" @if (old('npsn') == $value->npsn ) selected @endif>{{ $value->school_name }}</option>
                            @empty
                                <option disabled selected>No school found.</option>
                            @endforelse
                        </select>
                        @error('npsn')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                class="text-white inline-flex items-center bg-secondary-500 hover:bg-secondary-600 focus:ring-2 focus:outline-none focus:ring-secondary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update student
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div wire:ignore.self id="DeleteModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <form class="relative w-full h-full max-w-md md:h-auto" wire:submit.prevent='destroy'>
        @csrf
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" wire:click="closeModal"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="DeleteModal">
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
