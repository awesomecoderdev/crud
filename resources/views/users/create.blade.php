<x-app-layout>
    @section('head')
        <title>{{ __('Edit User') }} {{ config('settings.separator', '|') }} {{ __(config('app.name')) }}
        </title>
    @endsection

    <div class="mt-10 sm:mt-0 container mx-auto">

        <div class="relative my-4">
            @if (Session::has('success'))
                <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg  dark:text-green-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">{{ __('Success!') }}</span> {{ Session::get('success') }}
                    </div>
                </div>
            @endif

            @if (Session::has('error'))
                <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg  dark:text-blue-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">{{ __('Opps!') }}</span> {{ Session::get('error') }}
                    </div>
                </div>
            @endif
        </div>

        <div class="md:grid md:grid-cols-3 md:gap-6 my-10">
            <div class="mt-5 md:col-span-6 md:mt-0">
                <form method="POST" action="{{ route('users.store') }}"
                    class="overflow-hidden sm:rounded-md border-gray-200 border ">
                    @csrf
                    <div class="relative p-5">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Name') }}</label>
                                <input type="text" name="name" id="name" autocomplete="given-name"
                                    value="{{ old('name') }}"
                                    class="mt-1 block w-full rounded-md @error('name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror shadow-sm  sm:text-sm">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-3">
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Email address') }}</label>
                                <input type="text" name="email" id="email" autocomplete="email"
                                    value="{{ old('email') }}"
                                    class="mt-1 block w-full rounded-md @error('email') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror   shadow-sm  sm:text-sm">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Password') }}</label>
                                <input type="password" name="password" id="password" autocomplete="password"
                                    value="{{ old('password') }}"
                                    class="mt-1 block w-full rounded-md @error('password') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror shadow-sm  sm:text-sm">
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="confirmed_password"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Confirm Password') }}</label>
                                <input type="password" name="confirmed_password" id="confirmed_password"
                                    autocomplete="confirmed_password" value="{{ old('confirmed_password') }}"
                                    class="mt-1 block w-full rounded-md @error('confirmed_password') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror shadow-sm  sm:text-sm">
                                @error('confirmed_password')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="street-address"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Street address') }}</label>
                                <input type="text" name="street-address" id="street-address"
                                    autocomplete="street-address" value="{{ old('street-address') }}"
                                    class="mt-1 block w-full rounded-md @error('address') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror  shadow-sm  sm:text-sm">
                                @error('street-address')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('City') }}</label>
                                <input type="text" name="city" id="city" autocomplete="address-level2"
                                    value="{{ old('city') }}"
                                    class="mt-1 block w-full rounded-md @error('city') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror   shadow-sm  sm:text-sm">

                                @error('city')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="region"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('State / Province') }}</label>
                                <input type="text" name="region" id="region" autocomplete="address-level1"
                                    value="{{ old('state') }}"
                                    class="mt-1 block w-full rounded-md @error('state') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror  shadow-sm  sm:text-sm">
                                @error('state')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postal-code"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('ZIP / Postal code') }}</label>
                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                                    value="{{ old('zip') }}"
                                    class="mt-1 block w-full rounded-md @error('zip') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror  shadow-sm  sm:text-sm">
                                @error('zip')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class=" bg-gray-50  px-4 py-3 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>

                            <span class="mx-2">
                                {{ __('Save') }}
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
