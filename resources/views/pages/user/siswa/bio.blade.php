@extends('layouts.main-user')
@section('container')
    <div class="flex justify-center md:items-center bg-gray-50 h-screen">

        <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 ">
            <form class="space-y-6" action="#">
                <h5 class="text-xl font-medium text-gray-900">Sign in to our platform</h5>
                <div>
                    <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900">NISN</label>
                    <input type="text" name="nisn" id="nisn"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 focus-visible:ring-secondary-500 focus-visible:border-secondary-500 block w-full p-2.5"
                        placeholder="NISN">
                </div>
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 focus-visible:ring-secondary-500 focus-visible:border-secondary-500 block w-full p-2.5"
                        placeholder="Nama Lengkap">
                </div>

                <div class="relative">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis Kelamin</label>
                    <button id="states-button" data-dropdown-toggle="dropdown-states"
                        class="flex-shrink-0 z-10 inline-flex items-center w-full p-2.5 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 justify-between"
                        type="button" onclick="onToggle()">
                        Pilih Jenis Kelamin
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="dropdown-states"
                        class="w-full z-10 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="states-button">
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <div class="inline-flex items-center">
                                        Laki - laki
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <div class="inline-flex items-center">
                                        Perempuan
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 focus-visible:ring-secondary-500 focus-visible:border-secondary-500 block w-full p-2.5"
                        placeholder="name@company.com">
                </div>
                <div>
                    <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5"
                    >
                </div>
                {{-- <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-secondary-300 "
                            >
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Remember
                            me</label>
                    </div>
                </div> --}}
                <button type="submit"
                    class="w-full text-white bg-secondary-500 hover:bg-secondary-600 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Next Step</button>
            </form>
        </div>

    </div>
    <script>
        const onToggle = () => {
            const sidebar = document.querySelector('#dropdown-states');
            state = !state;
            state ?
                sidebar.classList.remove("hidden") :
                sidebar.classList.add("hidden")
        }
    </script>
@endsection
