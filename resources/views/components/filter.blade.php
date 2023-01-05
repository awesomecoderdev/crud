<div class="relative flex justify-between items-center">
    <div class="flex items-center relative my-3 border border-transparent ">
        <form method="GET"
            action="{{ route(Route::currentRouteName(), ['status' => request('status'), 'search' => request('search')]) }}"
            class="relative flex justify-center items-center">
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                placeholder="{{ __('Search') }}..."
                class="block w-screen max-w-sm pr-8 rounded-md focus:border-primary-500 focus:ring-primary-500 border-gray-200 shadow-sm sm:text-sm">
            <button type="submit" class="absolute right-2 mt-0.5 rounded-full ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5 text-slate-400 pointer-events-none">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </form>
        <div class="  px-4 py-3 text-right sm:px-6">
            <a href="{{ route('users.create') }}"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
                <span class="mx-2">
                    {{ __('Create') }}
                </span>
            </a>
        </div>
    </div>


</div>
