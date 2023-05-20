<div class="p-4">
    <h1 class="font-pjs-bold text-2xl mb-6">Dashboard</h1>
    <div class="grid md:grid-cols-12 gap-3">
        <div class="col-span-2 md:col-span-3">
            <div class="relative overflow-hidden bg-secondary-400 rounded-xl">
                <div class="px-4 py-5 sm:p-6">
                    <div>
                        <p class="text-xs font-pjs-medium text-white">
                            Total School
                        </p>
                        <p class="my-4 text-4xl font-pjs-semibold text-white">
                            {{ $count_school }}
                        </p>
                        <a href="{{ route('schools.index') }}"
                            class="text-xs font-pjs-regular text-gray-100 flex items-center">
                            View all student <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2 mt-[2px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2 md:col-span-3">
            <div class="relative overflow-hidden bg-gray-50 rounded-xl">
                <div class="px-4 py-5 sm:p-6">
                    <div>
                        <p class="text-xs font-pjs-medium text-gray-900">
                            Total Criteria
                        </p>
                        <p class="my-4 text-4xl font-pjs-semibold text-gray-900">
                            {{ $count_criteria }}
                        </p>
                        <a href="{{ route('criterias.index') }}"
                            class="text-xs font-pjs-regular text-gray-400 flex items-center">
                            View all criteria <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2 mt-[2px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2 md:col-span-3">
            <div class="relative overflow-hidden bg-gray-50 rounded-xl">
                <div class="px-4 py-5 sm:p-6">
                    <div>
                        <p class="text-xs font-pjs-medium text-gray-900">
                            Total Subcriteria
                        </p>
                        <p class="my-4 text-4xl font-pjs-semibold text-gray-900">
                            {{ $count_subcriteria }}
                        </p>
                        <a href="{{ route('subcriterias.index') }}"
                            class="text-xs font-pjs-regular text-gray-400 flex items-center">
                            View all subcriteria <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2 mt-[2px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4">
            <div class="flex flex-col gap-3">
                <div class="p-6 bg-gray-50 rounded-xl">
                    <p class="text-sm font-pjs-semibold text-gray-900">
                        Quick Recap
                    </p>
                    <div class="grid grid-cols-2">
                        <div>
                            <p class="text-xs font-pjs-regular my-3 items-center flex"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-secondary-400 mr-1" viewBox="0 0 512 512" fill="currentColor">
                                    <circle cx="256" cy="56" r="56" />
                                    <path
                                        d="M304 128h-96a64.19 64.19 0 00-64 64v107.52c0 10.85 8.43 20.08 19.27 20.47A20 20 0 00184 300v-99.73a8.18 8.18 0 017.47-8.25 8 8 0 018.53 8V489a23 23 0 0023 23 23 23 0 0023-23V346.34a10.24 10.24 0 019.33-10.34A10 10 0 01266 346v143a23 23 0 0023 23 23 23 0 0023-23V200.27a8.18 8.18 0 017.47-8.25 8 8 0 018.53 8v99.52c0 10.85 8.43 20.08 19.27 20.47A20 20 0 00368 300V192a64.19 64.19 0 00-64-64z" />
                                </svg>Laki-laki</p>
                            <p class="text-2xl font-pjs-semibold">{{ $percentage_male }}<span class="text-xs">%</span>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-pjs-regular my-3 items-center flex"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-secondary-400 mr-1"
                                    viewBox="0 0 512 512" fill="currentColor">
                                    <circle cx="255.75" cy="56" r="56" />
                                    <path
                                        d="M394.63 277.9l-10.33-34.41v-.11l-22.46-74.86h-.05l-2.51-8.45a44.87 44.87 0 00-43-32.08h-120a44.84 44.84 0 00-43 32.08l-2.51 8.45h-.06l-22.46 74.86v.11l-10.37 34.41c-3.12 10.39 2.3 21.66 12.57 25.14a20 20 0 0025.6-13.18l25.58-85.25 2.17-7.23a8 8 0 0115.53 2.62 7.78 7.78 0 01-.17 1.61L155.43 347.4a16 16 0 0015.32 20.6h29v114.69c0 16.46 10.53 29.31 24 29.31s24-12.85 24-29.31V368h16v114.69c0 16.46 10.53 29.31 24 29.31s24-12.85 24-29.31V368h30a16 16 0 0015.33-20.6l-43.74-145.81a7.52 7.52 0 01-.16-1.59 8 8 0 0115.54-2.63l2.17 7.23 25.57 85.25A20 20 0 00382.05 303c10.27-3.44 15.69-14.71 12.58-25.1z" />
                                </svg>Perempuan</p>
                            <p class="text-2xl font-pjs-semibold">{{ $percentage_female }}<span class="text-xs">%</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-4 bg-gray-50 rounded-xl">
                    <div class="flex justify-between">
                        <p class="font-pjs-semibold text-sm text-gray-700">Recent Students</p>
                        <div
                            class="flex flex-row space-x-2 justify-center border text-secondary-500 bg-secondary-100 items-center px-2 py-[2px] rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="w-3 h-3 text-secondary-500 font-pjs-medium" fill="currentColor">
                                <path
                                    d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                                </path>
                            </svg>
                            <p class="text-xs font-pjs-medium text-secondary-500">{{ $count_student }}</p>
                        </div>
                    </div>
                    <div class="flex space-y-2 flex-col my-3">
                        @forelse ($students as $student)
                            <div>
                                <p class="text-xs font-pjs-medium capitalize">{{ $student->student_name }}</p>
                                <p class="text-[10px] text-gray-500 font-pjs-regular">{{ $student->school_name }}</p>
                            </div>
                        @empty
                            <div class="flex justify-center items-center py-24">
                                <p class="text-sm font-pjs-regular">No Students yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
