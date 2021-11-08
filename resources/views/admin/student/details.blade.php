<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Individual Result') }}
        </h2>

        <div class="flex justify-end ">

            <div class="py-2">

                <a class="px-3 py-2 bg-green-500" href="{{route('single.student')}}">Back</a>

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
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$student->student_name}}
                                </td>

                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$student->email}}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$student->mobile_number}}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                  @foreach($student->marks as $mark)
                                 {{$mark->subject->name}}  :   {{$mark->marks}} <br>
                                    @endforeach
                                </td>

                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
