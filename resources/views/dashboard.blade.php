<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full sm:w-1/4 p-6 bg-white border-b border-gray-200">

                    <ul  style="list-style-type:disc;">
                        <li class="text-xl pb-2">Group
                            <ol class="text-sm pt-2 ">
                                <li><a class="bg-green-700 m-6 p-2" href="{{route('groups.create')}}">Create Group</a></li>
                                <br>
                                <li><a class="bg-green-400 m-6 p-2 px-5" href="{{route('groups.index')}}">All Group</a></li>

                            </ol>
                        </li>
                    </ul>

                    <ul  style="list-style-type:disc;">
                        <li class="text-xl pb-2">Student
                            <ol class="text-sm pt-2 ">
                                <li><a class="bg-green-700 m-6 p-2" href="{{route('students.create')}}">Create Student</a></li>
                                <br>
                                <li><a class="bg-green-400 m-6 p-2 px-5" href="{{route('students.index')}}">All Student</a></li>

                            </ol>
                        </li>
                    </ul>

                    <ul  style="list-style-type:disc;">
                        <li class="text-xl pb-2">Subject
                            <ol class="text-sm pt-2 ">
                                <li><a class="bg-green-700 m-6 p-2" href="{{route('subjects.create')}}">Create Subject</a></li>
                                <br>
                                <li><a class="bg-green-400 m-6 p-2 px-5" href="{{route('subjects.index')}}">All Subject</a></li>

                            </ol>
                        </li>
                    </ul>

                    <ul  style="list-style-type:disc;">
                        <li class="text-xl pb-2">Marks
                            <ol class="text-sm pt-2 ">
                                <li><a class="bg-green-700 m-6 p-2" href="{{route('marks.create')}}">Create Mark</a></li>
                                <br>
                                <li><a class="bg-green-400 m-6 p-2 px-5" href="{{route('marks.index')}}">All Mark</a></li>

                            </ol>
                        </li>
                    </ul>

                    <ul  style="list-style-type:disc;">
                        <li class="text-xl pb-2">Import multiple student
                            <ol class="text-sm pt-2 ">
                                <li><a class="bg-green-700 m-6 p-2" href="{{route('multiple.import')}}">Import Student</a></li>
                                <br>
                                <li><a class="bg-green-400 m-6 p-2 px-5" href="">All student</a></li>

                            </ol>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
