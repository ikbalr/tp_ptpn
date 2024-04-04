<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex">
            <div class="flex-1 w-42 mx-10 font-normal bg-grey border border-gray-100 rounded-lg shadow-md">
                <div class="flex">
                    <div class="w-3/6 mt-3 mx-10 text-md text-center font-normal bg-white dark:bg-gray-700 border border-gray-200 rounded-lg shadow-md">
                        <strong class="text-white">Jumlah Pegawai</strong>
                        <div class="flex place-content-center items-center">
                            <div>
                                <svg class="w-[48px] h-[48px] me-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="text-4xl font-black text-gray-900 dark:text-white">
                                {{ $totalPegawai }}
                            </div>
                        </div>
                    </div>
                    <div class="w-3/6 mt-3 mx-10 text-md text-center font-normal bg-green-900 border border-gray-200 rounded-lg shadow-md">
                        <strong class="text-white">Unit Usaha</strong>
                        <div class="flex place-content-center items-center">
                            <div>
                                <svg class="w-[47px] h-[47px] me-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"/>
                                  </svg>                                  
                            </div>
                            <div class="text-4xl font-black text-gray-900 dark:text-white">
                                10
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex-none max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ol class="relative border-s border-gray-200 dark:border-gray-700">                  
                    @foreach($log as $l)
                    @inject('helper', 'App\Http\Controllers\KaryawanController')
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        </span>
                        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                            <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ \Carbon\Carbon::parse($l['created_at'])->diffForHumans() }}</time>
                            <div class="text-sm font-normal text-gray-500 dark:text-gray-300">{{ __('Anda') }} {{ $l['activity'] }} <span class="bg-gray-100 text-gray-800 text-xs font-normal me-2 px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300">{{ $l['ip'] }}</span></div>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</x-app-layout>
