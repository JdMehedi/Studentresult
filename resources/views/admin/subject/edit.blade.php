<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Subject') }}
        </h2>
        <div class="flex justify-end ">

            <div class="py-2">
                <a class=" bg-green-500 px-3 py-2 bg-green-700" href="{{route('marks.create')}}">Insert Mark</a>
                <a class="px-3 py-2 bg-green-500" href="{{route('marks.index')}}">View mark history</a>

            </div>


        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('subjects.update', $subject->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @include("admin.subject._form",["button"=> __("Update")])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
