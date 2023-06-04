<div class="p-4">
    <h1 class="font-pjs-bold text-2xl mb-6">Dashboard</h1>
    {{-- <div class="grid md:grid-cols-12 gap-3">
        <div class="col-span-2 md:col-span-3">
            <div class="relative overflow-hidden bg-secondary-400 rounded-xl">
                <div class="px-4 py-5 sm:p-6">
                    <div>
                        <p class="text-xs font-pjs-medium text-white">
                            Total Student
                        </p>
                        <p class="my-4 text-4xl font-pjs-semibold text-white">
                            {{ $count_student }}
                        </p>
                        <a href="{{ route('students.index') }}"
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
                            Total School
                        </p>
                        <p class="my-4 text-4xl font-pjs-semibold text-gray-900">
                            {{ $count_school }}
                        </p>
                        <a href="{{ route('schools.index') }}"
                            class="text-xs font-pjs-regular text-gray-400 flex items-center">
                            View all school <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                            Total Major
                        </p>
                        <p class="my-4 text-4xl font-pjs-semibold text-gray-900">
                            {{ $count_major }}
                        </p>
                        <a href="{{ route('majors.index') }}"
                            class="text-xs font-pjs-regular text-gray-400 flex items-center">
                            View all major <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                    <p class="text-sm font-pjs-semibold text-gray-900 md:mb-4">
                        Quick Recap
                    </p>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="flex flex-col p-6 bg-gray-50 rounded-xl">
                    <div class="flex justify-between">
                        <p class="font-pjs-semibold text-sm text-gray-700">Recent Results</p>
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
                    <div class="flex space-y-2 flex-col mt-5">
                        @forelse ($recentStudent as $student)
                            <div class="flex flex-row justify-start items-center space-x-8">
                                <div class="space-y-1">
                                    <p class="text-[10px] text-gray-500 font-pjs-regular">{{ $student['date'] }}</p>
                                    <p class="text-xs font-pjs-medium">{{ $student['time'] }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-pjs-medium capitalize">{{ $student['student_name'] }}</p>
                                    <p class="text-[10px] text-gray-500 font-pjs-regular">School: <span
                                            class="font-pjs-medium text-black">{{ $student['school_name'] }}</span>
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="flex justify-center items-center py-24">
                                <p class="text-sm font-pjs-regular">No result yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="cols-span-6">
            <div class="flex">
                <div class="p-6 bg-gray-50 rounded-xl">
                    <p class="text-sm font-pjs-semibold text-gray-900 md:mb-4">
                        Recap Score
                    </p>
                    <div class="chart-container" style="position: relative; width:685px">
                        <canvas id="scoreChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="grid md:grid-cols-6 gap-4">
        <div class="md:col-span-4">
            <div class="flex flex-col space-y-4">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2 md:col-span-2">
                        <div class="relative overflow-hidden bg-secondary-400 rounded-xl">
                            <div class="px-4 py-5 sm:p-6">
                                <div>
                                    <p class="text-xs font-pjs-medium text-white">
                                        Total Student
                                    </p>
                                    <p class="my-4 text-4xl font-pjs-semibold text-white">
                                        {{ $count_student }}
                                    </p>
                                    <a href="{{ route('students.index') }}"
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
                    <div class="col-span-2 md:col-span-2">
                        <div class="relative overflow-hidden bg-gray-50 rounded-xl">
                            <div class="px-4 py-5 sm:p-6">
                                <div>
                                    <p class="text-xs font-pjs-medium text-gray-900">
                                        Total School
                                    </p>
                                    <p class="my-4 text-4xl font-pjs-semibold text-gray-900">
                                        {{ $count_school }}
                                    </p>
                                    <a href="{{ route('schools.index') }}"
                                        class="text-xs font-pjs-regular text-gray-400 flex items-center">
                                        View all school <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2 mt-[2px]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
            
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 md:col-span-2">
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
                    <div class="col-span-2 md:col-span-2">
                        <div class="relative overflow-hidden bg-gray-50 rounded-xl">
                            <div class="px-4 py-5 sm:p-6">
                                <div>
                                    <p class="text-xs font-pjs-medium text-gray-900">
                                        Total Major
                                    </p>
                                    <p class="my-4 text-4xl font-pjs-semibold text-gray-900">
                                        {{ $count_major }}
                                    </p>
                                    <a href="{{ route('majors.index') }}"
                                        class="text-xs font-pjs-regular text-gray-400 flex items-center">
                                        View all major <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2 mt-[2px]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
            
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 rounded-xl">
                    <p class="text-sm font-pjs-semibold text-gray-900 md:mb-4">
                        Recap Score
                    </p>
                    <div class="chart-container" style="position: relative; ">
                        <canvas id="scoreChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-1">
            <div class="grid grid-rows-2 gap-4">
                <div class="p-6 bg-gray-50 rounded-xl">
                    <p class="text-sm font-pjs-semibold text-gray-900 md:mb-4">
                        Quick Recap
                    </p>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="flex flex-col p-6 bg-gray-50 rounded-xl">
                    <div class="flex justify-between">
                        <p class="font-pjs-semibold text-sm text-gray-700">Recent Results</p>
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
                    <div class="flex space-y-2 flex-col mt-5">
                        @forelse ($recentStudent as $student)
                            <div class="flex flex-row justify-start items-center space-x-8">
                                <div class="space-y-1">
                                    <p class="text-[10px] text-gray-500 font-pjs-regular">{{ $student['date'] }}</p>
                                    <p class="text-xs font-pjs-medium">{{ $student['time'] }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-pjs-medium capitalize">{{ $student['student_name'] }}</p>
                                    <p class="text-[10px] text-gray-500 font-pjs-regular">School: <span
                                            class="font-pjs-medium text-black">{{ $student['school_name'] }}</span>
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="flex justify-center items-center py-24">
                                <p class="text-sm font-pjs-regular">No result yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var dataChartGender = JSON.parse(`<?php echo $byGender; ?>`)
            const ctg = document.getElementById('myChart');
            const genderChart = new Chart(ctg, {
                type: 'doughnut',
                data: {
                    labels: dataChartGender.label,
                    datasets: [{
                        label: 'Total',
                        data: dataChartGender.data,
                        backgroundColor: [
                            'rgb(24,161,198)',
                            'rgb(20,136,167)',
                        ],
                    }]
                }
            });
            var dataChartScore = JSON.parse(`<?php echo $nilaiMax; ?>`)
            const cts = document.getElementById('scoreChart');
            const scoreChart = new Chart(cts, {
                type: 'bar',
                data: {
                    labels: dataChartScore.label,
                    datasets: [{
                        label: 'Score Tertinggi',
                        data: dataChartScore.data,
                        backgroundColor: [
                            'rgb(134, 209, 229)', //200
                            'rgb(57, 179, 213)', //300
                            'rgb(24,161,198)', //400
                            'rgb(20,136,167)', //500
                            'rgb(17, 114, 141)', //600
                            'rgb(14, 92, 114)', //700
                            'rgb(12, 78, 96)', //800
                            'rgb(8, 56, 69)', //900
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });
        </script>
    @endsection
</div>
