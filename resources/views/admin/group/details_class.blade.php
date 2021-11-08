<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Information') }}
        </h2>

        <div class="flex justify-end ">

            <div class="py-2">

                <a class="px-3 py-2 bg-green-500" href="{{route('groups.index')}}">Back</a>

            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full sm:w-3/4  p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Student Name</th>
                            <th>Student email</th>
                            <th>Gender</th>
                            <th>Mobile Number</th>
                            <th>Total marks</th>
{{--                            <th>View</th>--}}

                        </tr>
                        </thead>
                        <tbody>
                        <?php $index = 1;?>
                        @forelse($lists as $mark)
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$index++}}
                                </td>

                                 <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                 {{ $mark->student->student_name }}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $mark->student->email }}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $mark->student->gender }}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $mark->student->mobile_number }}
                                </td>
                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $mark->sum }}
                                </td>
{{--                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">--}}
{{--                                    <a class="bg-yellow-300 p-6 py-2" href="{{route('details.result',$mark->student_id)}}">View</a>--}}
{{--                                </td>--}}






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
