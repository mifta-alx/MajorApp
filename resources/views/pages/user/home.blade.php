@extends('layouts.main')
@section('container')
    <div class="bg-secondary-500">
        <div class="relative max-w-5xl mx-auto pt-20 pb-8 sm:pt-24 lg:pt-32 px-4 md:px-0">
            <h1 class="text-white font-pjs-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight text-center">Let's find out
                what high school major suits you.</h1>
            <p class="mt-6 text-sm md:text-lg text-slate-200 text-center max-w-3xl mx-auto font-pjs-regular">
                The high school majors application using the Single Addaptive Weighting method is a digital platform that
                aims to assist high school students in choosing majors that suit their interests, talents and abilities.
            </p>
            {{-- <div class="mt-6 sm:mt-10 flex justify-center space-x-6 text-sm">
            <button type="button"
                    class="hidden sm:flex items-center w-72 text-left space-x-3 px-4 h-12 bg-white ring-1 ring-slate-900/10 hover:ring-slate-300 focus:outline-none focus:ring-2 focus:ring-sky-500 shadow-sm rounded-lg text-slate-400 ">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="flex-none text-slate-300 dark:text-slate-400"
                        aria-hidden="true">
                        <path d="m19 19-3.5-3.5"></path>
                        <circle cx="11" cy="11" r="6"></circle>
                    </svg>
                    <span class="flex-auto">Masukkan Nama</span>
                </button>
            </div> --}}
            <form class="mt-6 sm:mt-10 flex flex-col md:flex-row justify-center md:space-x-6 text-sm md:px-0" action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center w-full md:w-72 text-left space-x-1 px-4 h-12 bg-white ring-1 ring-slate-900/10 hover:ring-slate-300 focus:outline-none focus:ring-2 focus:ring-white shadow-sm rounded-lg text-slate-400 ">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="flex-none text-slate-300" aria-hidden="true">
                            <path d="m19 19-3.5-3.5"></path>
                            <circle cx="11" cy="11" r="6"></circle>
                        </svg>
                    <input type="search" id="default-search"
                        class="flex-auto w-full p-2 text-sm text-gray-900 focus-visible:outline-0"
                        placeholder="Masukkan Nama" name="nama_siswa" required autocomplete="off">
                </div>
                <button type="submit"
                    class="mt-4 md:mt-0 bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto">Get
                    started</button>
            </form>
        </div>
        <svg class="header-decoration" data-name="Layer 3" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
            viewBox="0 0 1920 305.139">
            <defs>
                <style>
                    .cls-1 {
                        fill: #ffffff;
                    }
                </style>
            </defs>
            <title>header-decoration</title>
            <path class="cls-1"
                d="M1486.486,36.773C1434.531,13.658,1401.068-5.1,1329.052,1.251c-92.939,8.2-152.759,70.189-180.71,89.478-23.154,15.979-134.286,104.091-171.753,128.16-50.559,32.48-98.365,59.228-166.492,67.5-67.648,8.21-124.574-6.25-152.992-18-42.218-17.454-42.218-17.454-90-39-35.411-15.967-81.61-34.073-141.58-34.054-116.6.037-262.78,77.981-354.895,80.062C53.1,275.793,22.75,273.566,0,260.566v44.573H1920V61.316c-36.724,23.238-76.008,61.68-177,65C1655.415,129.2,1556.216,67.8,1486.486,36.773Z"
                transform="translate(0 0)"></path>
        </svg>
    </div>
@endsection
