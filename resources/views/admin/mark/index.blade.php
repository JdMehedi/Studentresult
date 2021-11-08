<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marksheet') }}
        </h2>
        <div class="flex justify-end ">




        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('admin.include.sidebar')
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Student Name</th>
                            <th>Subject Name</th>
                            <th>Marks</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $index = 1;?>
                        @forelse($list as $mark)
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$index++}}
                                </td>

                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                  {{$mark->student->student_name}}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$mark->subject->name}}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$mark->marks}}
                                </td>
                                <td>
                                    <a class="px-3 py-2 bg-green-700" href="{{route('marks.edit', $mark->id)}}">Edit</a>


                                    <a class="px-3 py-2 bg-red-700 delete-row"
                                       href=""
                                       data-confirm="Are you sure to delete this?">Delete</a>
                                </td>



                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center text-3xl">{{ __("No post yet") }}</td>
                            </tr>

                            </tr>
                        @endforelse

                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
