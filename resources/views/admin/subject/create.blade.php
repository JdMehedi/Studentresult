<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Subject') }}
        </h2>

        <div class="flex justify-end ">




        </div>
    </x-slot>

    @if (session('SUCCESS'))
        <div class="bg-yellow-100 px-4 py-2 border border-blue-600 text-center text-yellow-500 m-5 text-lg">
            {{ session('SUCCESS') }}
        </div>
    @endif

    @if (session('ERROR'))
        <div class="bg-red-100 px-4 py-2 border border-blue-600 text-center text-red-500 m-5 text-lg">
            {{ session('ERROR') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('admin.include.sidebar')
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('subjects.store')}}" method="POST">
                        @csrf
                        @include("admin.subject._form",["button"=> __("create")])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
