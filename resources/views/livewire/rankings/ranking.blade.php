<div>
    <section class="container px-4 mx-auto">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-x-3">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white capitalize">{{ $titles }}</h2>

                    <span
                        class="px-3 py-1 text-xs text-secondary-600 bg-secondary-100 rounded-full">{{ $count . ' ' . $titles }}</span>
                </div>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">See the {{ $titles }}.</p>
            </div>

            <div class="flex items-center mt-4 gap-x-3">
                <button
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <span>Report</span>
                </button>
            </div>
        </div>

        <div class="mt-6 md:flex md:items-center md:justify-between">

            <div class="relative flex items-center mt-4 md:mt-0">
                <span class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>

                <input type="text" placeholder="Search" wire:model="search" id="searchData"
                    class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-secondary-400 dark:focus:border-secondary-300 focus:ring-secondary-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>
        </div>

        @if ($rankings->count())
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="py-4 px-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                            Ranking
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                            NISN
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                            Nama Siswa
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                            Asal Sekolah
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                            Hasil
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                            Rekomendasi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($rankings as $item)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item['ranking'] }}
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->result->nisn }}
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->student->student_name }}
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->school->school_name }}
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->result->saw_result }}
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{ $item->result->recomendation_result }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="flex items-center mt-6 text-center border rounded-lg h-96 dark:border-gray-700">
                @if ($search)
                    <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
                        <div class="p-3 mx-auto text-secondary-500 bg-secondary-100 rounded-full dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <h1 class="mt-3 text-lg text-gray-800 dark:text-white">No {{ $titles }} found</h1>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Your search “{{ $search }}” did not
                            match any {{ $titles }}. Please try again or create a new {{ $title }}.
                        </p>
                        <div class="flex items-center mt-4 sm:mx-auto gap-x-3 justify-center">
                            <button wire:click="clearSearch()" type="button" id="btnClear"
                                class="px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                                Clear Search
                            </button>
                        </div>
                    @else
                        <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
                            <div class="p-3 mx-auto text-secondary-500 bg-secondary-100 rounded-full dark:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z">
                                    </path>
                                </svg>
                            </div>
                            <h1 class="mt-3 text-lg text-gray-800 dark:text-white">No {{ $titles }} yet</h1>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">For now, there is no {{ $title }}
                                data is available. Please create a new {{ $title }} first.</p>
                @endif
            </div>
        @endif
        <div class="mt-6">
            {{ $rankings->links() }}
        </div>
    </section>
</div>
