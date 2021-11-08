<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Class Name') }}
        </h2>
        <div class="flex justify-end ">

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('admin.include.sidebar')
                <div class="w-full sm:w-3/4 p-6 bg-white border-b border-gray-200">
                    <form action="{{route('groups.store')}}" method="POST">
                        @csrf
                        @include("admin.group._form",["button"=> __("create")])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
