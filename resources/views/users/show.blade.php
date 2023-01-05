<x-app-layout>
    @section('head')
        <title>{{ __($user->name) }} {{ config('settings.separator', '|') }} {{ __(config('app.name')) }}
        </title>
    @endsection
    {{-- @if ($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif --}}
    <div class="mt-10 sm:mt-0 container mx-auto">
        <div class="md:grid md:grid-cols-3 md:gap-6 my-10">
            <div class="mt-5 md:col-span-6 md:mt-0">
                <div class="overflow-hidden sm:rounded-md border-gray-200 border ">
                    <div class="relative p-5">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Name') }}</label>
                                <input type="text" readonly name="name" id="name" autocomplete="given-name"
                                    value="{{ $user->name }}"
                                    class="mt-1 block w-full rounded-md @error('name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror shadow-sm  sm:text-sm">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-3">
                                <label for="email-address"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Email address') }}</label>
                                <input type="text" readonly name="email-address" id="email-address"
                                    autocomplete="email" value="{{ $user->email }}"
                                    class="mt-1 block w-full rounded-md @error('email') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 @enderror   shadow-sm  sm:text-sm">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 ">
                                        <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="street-address"
                                    class="block text-sm font-medium text-gray-700 ">{{ __('Street address') }}</label>
                                <input type="text" readonly name="street-address" id="street-address"
                                    autocomplete="street-address"
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
                                <input type="text" readonly name="city" id="city"
                                    autocomplete="address-level2"
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
                                <input type="text" readonly name="region" id="region"
                                    autocomplete="address-level1"
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
                                <input type="text" readonly name="postal-code" id="postal-code"
                                    autocomplete="postal-code"
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
                        <a href="{{ route('users.edit', $user) }}"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                            <span class="mx-2">
                                {{ __('Edit') }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
