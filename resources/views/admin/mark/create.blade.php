<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input marks') }}
        </h2>
        <div class="flex justify-end ">

            <div class="p-6 bg-white border-b border-gray-200">

                @if (isset($errors) && $errors->any())
                    <div class="bg-yellow-300 text-white">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif


                <form action="{{route('marks.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="file"> Student information file</label>
                    <input class="block my-3" type="file" name="file" >
                    <button class="bg-green-700 px-4 py-2" type="submit">Submit</button>

                </form>
            </div>


        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('admin.include.sidebar')
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('marks.store')}}" method="POST">
                        @csrf
                        @include("admin.mark._form",["button"=> __("create")])


                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
