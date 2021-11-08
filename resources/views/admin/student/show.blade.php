<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Result') }}
        </h2>

        <div class="flex justify-end ">

            <div class="py-2">


                <a class="px-3 py-2 bg-green-500" href="{{route('students.index')}}">Back</a>


            </div>


        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>Roll No</th>
                            <th>Student Total Marks</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Gender</th>
                            <th>Student Class</th>
                            <th>Show details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $index=1 ?>
                        @foreach($marks as $mark)


                        <tr>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                               {{$index++}}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                            {{$mark->mark}}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                {{$mark->student->student_name}}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                {{$mark->student->email}}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                {{$mark->student->gender}}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                {{$mark->student->group->className}}
                            </td>


                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                              <button class="bg-yellow-600 w-24 h-8"> <a href="{{route('details.student', $mark->student_id)}}">Details</a></button>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
