<nav class="fixed top-0 z-40 w-full bg-white border-b border-gray-200">
   <div class="px-3 py-3 lg:px-5 lg:pl-3">
     <div class="flex items-center justify-between">
       <div class="flex items-center justify-start">
         <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" onclick="showNav()">
             <span class="sr-only">Open sidebar</span>
             <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
             </svg>
          </button>
         <a href="{{ route('home') }}" class="flex ml-2 md:mr-24">
           <img src="{{url('/images/logo.png')}}" class="h-8 mr-3" alt="Major Logo" />
           <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Major.</span>
         </a>
       </div>
       {{-- <div class="flex items-center">
           <div class="flex items-center ml-3">
             <div>
               <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                 <span class="sr-only">Open user menu</span>
                 <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
               </button>
             </div>
             <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
               <div class="px-4 py-3" role="none">
                 <p class="text-sm text-gray-900 dark:text-white" role="none">
                   Neil Sims
                 </p>
                 <p class="text-sm font-medium text-gray-900 truncate" role="none">
                   neil.sims@flowbite.com
                 </p>
               </div>
               <ul class="py-1" role="none">
                 <li>
                   <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                 </li>
                 <li>
                   <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                 </li>
                 <li>
                   <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Earnings</a>
                 </li>
                 <li>
                   <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                 </li>
               </ul>
             </div>
           </div>
         </div>
     </div> --}}
   </div>
 </nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-30 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar" aria-modal="true" role="dialog">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
      <ul class="space-y-2">
         <li>
            <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('dashboard') ? 'text-white' : 'text-gray-500 '  }} flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z" clip-rule="evenodd" />
                  <path fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z" clip-rule="evenodd" />
                </svg>
                
               <span class="flex-1 ml-3 whitespace-nowrap">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('students.index') }}" class="{{ Request::is('students*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('students*') ? 'text-white' : 'text-gray-500 '  }} flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                  <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                  <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Students</span>
            </a>
         </li>
         <li>
            <a href="{{ route('schools.index') }}" class="{{ Request::is('schools*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('schools*') ? 'text-white' : 'text-gray-500 '  }} flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path fill-rule="evenodd" d="M3 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5H15v-18a.75.75 0 000-1.5H3zM6.75 19.5v-2.25a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75zM6 6.75A.75.75 0 016.75 6h.75a.75.75 0 010 1.5h-.75A.75.75 0 016 6.75zM6.75 9a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM6 12.75a.75.75 0 01.75-.75h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 6a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zm-.75 3.75A.75.75 0 0110.5 9h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 12a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM16.5 6.75v15h5.25a.75.75 0 000-1.5H21v-12a.75.75 0 000-1.5h-4.5zm1.5 4.5a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 2.25a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75h-.008zM18 17.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z" clip-rule="evenodd" />
                </svg>
                
               <span class="flex-1 ml-3 whitespace-nowrap">Schools</span>
            </a>
         </li>
         <li>
            <a href="{{ route('alternatives.index') }}" class="{{ Request::is('alternatives*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('alternatives*') ? 'text-white' : 'text-gray-500 '  }}flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z" clip-rule="evenodd" />
                </svg>
                
               <span class="flex-1 ml-3 whitespace-nowrap">Alternatives</span>
            </a>
         </li>
         <li>
            <a href="{{ route('users.index') }}" class="{{ Request::is('users*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('users*') ? 'text-white' : 'text-gray-500 '  }}flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                  <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                </svg>
                
               <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
         </li>
         <li>
            <a href="{{ route('roles.index') }}" class="{{ Request::is('roles*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('roles*') ? 'text-white' : 'text-gray-500 '  }}flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 01-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 016.126 3.537zM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 010 .75l-1.732 3.001c-.229.396-.76.498-1.067.16A5.231 5.231 0 016.75 12c0-1.362.519-2.603 1.37-3.536zM10.878 17.13c-.447-.097-.623-.608-.394-1.003l1.733-3.003a.75.75 0 01.65-.375h3.465c.457 0 .81.408.672.843a5.252 5.252 0 01-6.126 3.538z" />
                  <path fill-rule="evenodd" d="M21 12.75a.75.75 0 000-1.5h-.783a8.22 8.22 0 00-.237-1.357l.734-.267a.75.75 0 10-.513-1.41l-.735.268a8.24 8.24 0 00-.689-1.191l.6-.504a.75.75 0 10-.964-1.149l-.6.504a8.3 8.3 0 00-1.054-.885l.391-.678a.75.75 0 10-1.299-.75l-.39.677a8.188 8.188 0 00-1.295-.471l.136-.77a.75.75 0 00-1.477-.26l-.136.77a8.364 8.364 0 00-1.377 0l-.136-.77a.75.75 0 10-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 00-1.3.75l.392.678a8.29 8.29 0 00-1.054.885l-.6-.504a.75.75 0 00-.965 1.149l.6.503a8.243 8.243 0 00-.689 1.192L3.8 8.217a.75.75 0 10-.513 1.41l.735.267a8.222 8.222 0 00-.238 1.355h-.783a.75.75 0 000 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 10.513 1.41l.735-.268c.197.417.428.816.69 1.192l-.6.504a.75.75 0 10.963 1.149l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 101.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.771a.75.75 0 101.477.26l.137-.772a8.376 8.376 0 001.376 0l.136.773a.75.75 0 101.477-.26l-.136-.772a8.19 8.19 0 001.294-.47l.391.677a.75.75 0 101.3-.75l-.393-.679a8.282 8.282 0 001.054-.885l.601.504a.75.75 0 10.964-1.15l-.6-.503a8.24 8.24 0 00.69-1.191l.735.268a.75.75 0 10.512-1.41l-.734-.268c.115-.438.195-.892.237-1.356h.784zm-2.657-3.06a6.744 6.744 0 00-1.19-2.053 6.784 6.784 0 00-1.82-1.51A6.704 6.704 0 0012 5.25a6.801 6.801 0 00-1.225.111 6.7 6.7 0 00-2.15.792 6.784 6.784 0 00-2.952 3.489.758.758 0 01-.036.099A6.74 6.74 0 005.251 12a6.739 6.739 0 003.355 5.835l.01.006.01.005a6.706 6.706 0 002.203.802c.007 0 .014.002.021.004a6.792 6.792 0 002.301 0l.022-.004a6.707 6.707 0 002.228-.816 6.781 6.781 0 001.762-1.483l.009-.01.009-.012a6.744 6.744 0 001.18-2.064c.253-.708.39-1.47.39-2.264a6.74 6.74 0 00-.408-2.308z" clip-rule="evenodd" />
                </svg>
                
               <span class="flex-1 ml-3 whitespace-nowrap">Roles</span>
            </a>
         </li>
         <li>
            <a href="{{ route('criterias.index') }}" class="{{ Request::is('criterias*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="{{ Request::is('criterias*') ? 'text-white' : 'text-gray-500 '  }} flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path fill-rule="evenodd" d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z" clip-rule="evenodd" />
                </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Criterias</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
            </a>
         </li>
         <li>
            <a href="{{ route('subcriterias.index') }}" class="{{ Request::is('subcriterias*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('subcriterias*') ? 'text-white' : 'text-gray-500 '  }} flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path fill-rule="evenodd" d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 00-.722-1.952l-3.285-3.832A3 3 0 0016.215 3h-8.43a3 3 0 00-2.278 1.048L2.222 7.88A3 3 0 001.5 9.832zM7.785 4.5a1.5 1.5 0 00-1.139.524L3.881 8.25h3.165a3 3 0 012.496 1.336l.164.246a1.5 1.5 0 001.248.668h2.092a1.5 1.5 0 001.248-.668l.164-.246a3 3 0 012.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 00-1.139-.524h-8.43z" clip-rule="evenodd" />
                  <path d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 003 3h15a3 3 0 003-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 00-2.496 1.336l-.164.246a1.5 1.5 0 01-1.248.668h-2.092a1.5 1.5 0 01-1.248-.668l-.164-.246A3 3 0 007.046 15H2.812z" />
                </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Subcriterias</span>
            </a>
         </li>
         <li>
            <a href="{{ route('scores.index') }}" class="{{ Request::is('scores*') ? 'bg-secondary-500 hover:bg-secondary-600 text-white' : ''  }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" {{ Request::is('scores*') ? 'text-white' : 'text-gray-500 '  }}flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 ">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                </svg>
                
               <span class="flex-1 ml-3 whitespace-nowrap">Scores</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

<script>
  let state = false;
  const showNav = () => {
    const sidebar = document.querySelector('#logo-sidebar');
    state = !state;
    state ? 
    sidebar.classList.add("transform-none")
    :
    sidebar.classList.remove("transform-none")
  }
</script>

<div class="p-4 sm:ml-64">
   <div class="mt-14">
     @yield('container-admin')
    </div>
</div>
