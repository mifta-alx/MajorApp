
<nav class="bg-secondary-500 lg:px-[100px] px-4 py-2.5 relative">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="#" class="flex items-center">
        <span class="self-center text-2xl md:text-3xl font-pjs-extrabold whitespace-nowrap text-white italic">Major.</span>
    </a>
    <div class="flex md:order-2">
     <button type="button" class="text-white bg-black hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-3 md:mr-0">Login</button>
     <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg md:hidden hover:bg-third-light focus:outline-none focus:ring-2 focus:ring-third-light" aria-controls="navbar-default" aria-expanded="false" onclick="showNav()">
       <span class="sr-only">Open main menu</span>
       <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
   </button>
 </div>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 mt-4 border bg-gray-100 md:bg-transparent rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0  ">
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-pjs-semibold hover:font-pjs-bold md:p-0" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-pjs-semibold hover:font-pjs-bold md:p-0" aria-current="page">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-pjs-semibold hover:font-pjs-bold md:p-0" aria-current="page">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-black bg-gray-100 rounded md:bg-transparent md:text-slate-200 hover:text-white font-pjs-semibold hover:font-pjs-bold md:p-0" aria-current="page">Contact us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
  let state = false;
  const showNav = () => {
    const sidebar = document.querySelector('#navbar-default');
    state = !state;
    state ? 
    sidebar.classList.remove("hidden")
    :
    sidebar.classList.add("hidden")
  }
</script>