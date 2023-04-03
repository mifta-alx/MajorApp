<nav class="bg-white lg:px-[100px] px-4 py-4 relative">
    <div class="container flex flex-wrap items-center justify-start md:justify-between mx-auto">
        <a class="block mr-2 md:hidden" href="{{ route('home') }}"><svg stroke="currentColor" fill="none" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="24" width="24"
                xmlns="http://www.w3.org/2000/svg">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg></a>
        <a href="{{ route('home') }}" class="flex items-center">
            <span
                class="self-center text-2xl md:text-3xl font-pjs-bold md:font-pjs-extrabold whitespace-nowrap text-secondary-500 italic">Major.</span>
        </a>
        {{-- <div class="flex md:order-2">
       <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg md:hidden hover:bg-third-light focus:outline-none focus:ring-2 focus:ring-third-light" aria-controls="navbar-default" aria-expanded="false" onclick="showNav()">
         <span class="sr-only">Open main menu</span>
         <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
     </button>
   </div> --}}
        {{-- <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="flex flex-col p-4 mt-4 border bg-gray-100 md:bg-transparent rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0  ">
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-bold md:p-0" aria-current="page">Home</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-bold md:p-0" aria-current="page">About</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-bold md:p-0" aria-current="page">Services</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-bold md:p-0" aria-current="page">Contact Us</a>
          </li>
        </ul>
      </div> --}}
    </div>
</nav>
<script>
    let state = false;
    const showNav = () => {
        const sidebar = document.querySelector('#navbar-default');
        state = !state;
        state ?
            sidebar.classList.remove("hidden") :
            sidebar.classList.add("hidden")
    }
</script>
