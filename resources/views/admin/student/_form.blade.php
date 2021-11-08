<div>
    <label class="block mb-2" for="student_name">Student Name</label>
    <input class="block" type="text" name="student_name" value="{{old('student_name', isset($student)? $student->student_name :"")}}">
    <p class="text-red-600">{{$errors->first('student_name')}}</p>
</div>

<div>
    <label class="block mb-2" for="email">Student email</label>
    <input class="block" type="text" name="email" value="{{old('email', isset($student)? $student->email :"")}}">
    <p class="text-red-600">{{$errors->first('email')}}</p>
</div>

<div>
    <label class="block mb-2" for="mobile_number">Mobile Number</label>
    <input class="block" type="text"  name="mobile_number"  value="{{old('mobile_number',isset($student)? $student->mobile_number :"")}}">
    <p class="text-red-600">{{$errors->first('mobile_number')}}</p>

</div>
<div>
    <input type="radio" name="gender" value="male"> Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
</div>

<div>
    <label class="block" for="group_id"> Class Name</label>
    <select name="group_id" id="group_id">
        <option value=""> {{ __("Select Class") }}</option>
        @foreach($class as $id=> $value)
            <option value="{{$id}}"> {{$value }}</option>
        @endforeach
        <p class="text-red-600">{{$errors->first('className')}}</p>
    </select>
</div>


<button class="bg-green-700 w-16 h-8 mt-2" type="submit" >{{$button}}</button>
