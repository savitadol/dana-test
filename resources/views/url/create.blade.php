<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Url Shortening') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full sm:max-w-md mt-6 px-3 py-3 bg-grey shadow-md overflow-hidden sm:rounded-lg">
                         <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        
                        <form method="POST" action="{{ route('url.store') }}">
                            @csrf
                
                            <div>
                                <x-input id="destination" class="block mt-1 w-full" type="text" name="destination" :value="old('destination')" required autofocus />
                                <x-label for="destination" :value="__('Enter the url you want to shorten.')" />
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                <x-button>
                                    {{ __('Shorten Url') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full">
                        <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-center font-bold">
                                    <td class="border px-3 py-3">SLUG</td>
                                    <td class="border px-3 py-3">URL</td>
                                    <td class="border px-3 py-3">CREATED AT</td>
                                </tr>
                            </thead>
                            @foreach($urls as $url)
                                <tr>
                                    <td class="border px-3 py-3"><a href="{{route('destination',['url'=>$url->slug])}}">{{$url->shortened_url}}</a></td>
                                    <td class="border px-3 py-3">{{$url->destination}}</td>
                                    <td class="border px-3 py-3">{{dateformat($url->created_at)}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="mt-6">
                            {{$urls->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
