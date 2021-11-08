<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Subject') }}
        </h2>

        <div class="flex justify-end ">



        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('admin.include.sidebar')
                <div class="w-full sm:w-3/4  p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Class Name</th>
                            <th>Total Student</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $index = 1;?>
                        @forelse($list as $class)
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{$index++}}
                                </td>

                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    <a class="bg-yellow-700 px-4 py-2.5" href=""> {{$class->group->className}}</a>
                                </td>

                                <td class="border-t-0 px-6 align-middle  border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    <a class="bg-yellow-700 px-4 py-2.5" href=""> {{$class->total}}</a>
                                </td>


                                <td>
                                    <a class="px-3 py-2 bg-green-700" href="{{route('groups.edit',$class->group_id)}}">Edit</a>
                                    <a class="px-3 py-2 bg-yellow-700" href="{{route('groups.show',$class->group_id)}}">View</a>

                                    <a class="px-3 py-2 bg-red-700 delete-row"
                                       href="{{route('groups.destroy',$class->group_id)}}"
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
