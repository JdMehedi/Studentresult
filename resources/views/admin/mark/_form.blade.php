                    <div>
                        <label class="block" for="student_id"> Class Name</label>
                        <select name="group_id" id="group_id" >
                            <option value=""> {{ __("Select a Class") }}</option>
                            @foreach($class as $id=> $value)
                                <option value="{{$id}}"> {{$value }}</option>
                            @endforeach

                        </select>
                        <p class="text-red-600">{{$errors->first('student_id')}}</p>
                    </div>

                    <div>
                        <label class="block" for="student_id"> Student Name</label>
                        <select name="student_id" id="student" >



                        </select>
                        <p class="text-red-600">{{$errors->first('student_id')}}</p>
                    </div>

                    <div class="py-6">
                        <label class="block  uppercase tracking-wide text-gray-900 text-xs font-bold mb-8" for="grid-first-name">
                            Subject Name
                        </label>



                        @foreach($subject as $subject)
                            <div class="flex flex-wrap -mx-3 mb-6 items-center">
                                <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
                                    <label class="block flex items-center  uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="grid-first-name">
                                        {{$subject->name}}
                                        <input type="hidden" name="subject_id[]" value="{{$subject->id}}">
                                    </label>

                                </div>
                                <div class="w-full md:w-10/12 px-3 mb-6 md:mb-0">
                                    <input name="marks[]" id="marks" type="number" class="md:w-8/12 w-full appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="insert marks">
                                    <p class="text-red-600">{{$errors->first('marks.*')}}</p>
                                </div>

                            </div>
                        @endforeach
                        <div class="mt-4">
                            <button class="bg-green-700 w-16 h-8 mt-2" type="submit" >{{$button}}</button>

                        </div>
                    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type=text/javascript>
    $('#group_id').change(function(){
        var groupId = $(this).val();

        if(groupId){
            $.ajax({
                type:"GET",
                url:"{{url('/selectstudent')}}/"+groupId,
                success:function(request){
                    // console.log(request);
                    if(request){
                        $("#student").empty();
                        $("#student").append('<option>Select Student</option>');
                        $.each(request,function(key,value){
                            $("#student").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#student").empty();
                    }
                }
            });
        }else{
            $("#student").empty();
        }
    });

</script>
