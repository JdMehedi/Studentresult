<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Student info') }}
        </h2>
        <div class="flex justify-end ">

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('admin.include.sidebar')
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('students.store')}}" method="POST">
                        @csrf
                        @include("admin.student._form",["button"=> __("create")])
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
