@extends('layouts.main-admin')
@section('container-admin')
    <div>
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center text-sm font-pjs-semibold text-gray-800 hover:text-secondary-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('users.index') }}"
                            class="ml-1 text-sm font-pjs-semibold text-gray-700 hover:text-secondary-500 md:ml-2">Users</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-pjs-semibold text-gray-500 md:ml-2">Edit Users</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="w-full p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 ">
            <form action="{{ route('users.store') }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-4">
                    <label for="text"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('nama') text-red-700 @enderror">Nama</label>
                    <input type="text"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('nama') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Nama" name="nama" value="{{ old('nama', $user->nama) }}">
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="text"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('username') text-red-700 @enderror">Username</label>
                    <input type="text"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('username') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Username" name="username" value="{{ old('username', $user->username) }}">
                    @error('username')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('email') text-red-700 @enderror">Email</label>
                    <input type="eamil"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('email') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('password') text-red-700 @enderror">Password</label>
                    <input type="password"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('password') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Password" name="password" value="{{ old('password', $user->password) }}">
                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="role"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('role') text-red-700 @enderror">Role</label>
                    <select id="role" name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 @error('role') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @enderror">
                        <option selected disabled>Role</option>
                        <option value="admin" {{ "admin" === old('role', $user->role) ? 'selected' : '' }}>Admin</option>
                        <option value="petugas"  {{ "petugas" === old('role', $user->role) ? 'selected' : '' }}>Petugas</option>
                    </select>
                    @error('role')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="text-white bg-secondary-500 hover:bg-secondary-600 focus:ring-4 focus:outline-none focus:ring-secondary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </form>
        </div>
    </div>
    <script>
        let isOpen = false;
        const onShow = () => {
            const dropdown = document.querySelector('#dropdown-states');
            isOpen = !isOpen;
            isOpen ?
                dropdown.classList.remove("hidden")
                // dropdown.classList.add("block") 
                :
                dropdown.classList.add("hidden")
            // dropdown.classList.remove("block")
        }
    </script>
@endsection
