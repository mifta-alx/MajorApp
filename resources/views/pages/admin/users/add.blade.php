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
                        <a href="{{ route('users') }}"
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
                        <span class="ml-1 text-sm font-pjs-semibold text-gray-500 md:ml-2">Add Users</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="w-full p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 ">
            <form>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">UUID</label>
                    <input type="text"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5"
                        placeholder="UUID" required>
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                    <input type="text"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5"
                        placeholder="Username" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="eamil"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5"
                        placeholder="Email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5"
                        placeholder="Password" required>
                </div>
                <div class="relative mb-6 z-30">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <div class="flex">
                        <button id="states-button" data-dropdown-toggle="dropdown-states"
                            class="flex-shrink-0 z-10 w-full inline-flex items-center justify-between py-2.5 px-4 text-sm font-pjs-semibold text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
                            type="button" onclick="onShow()">
                            Pilih Role
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fillRule="evenodd"
                                    d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                    clipRule="evenodd" />
                            </svg>
                        </button>
                        <div id="dropdown-states"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-full"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 72px, 0px);">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="states-button">
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-secondary-500 hover:text-white">
                                        <div class="inline-flex items-center">
                                            Admin
                                        </div>
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-secondary-500 hover:text-white">
                                        <div class="inline-flex items-center">
                                            Petugas
                                        </div>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="text-white bg-secondary-500 hover:bg-secondary-600 focus:ring-4 focus:outline-none focus:ring-secondary-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </form>
        </div>
    </div>
    <script>
        let isOpen = false;
        const listTipe = [
            'Admin',
            'Petugas'
        ]
        
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
