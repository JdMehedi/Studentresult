<div>
    <label class="block" for="marks">Mark</label>
    <input  type="text" name="marks" id="marks" value="{{old('marks', isset($marks)? $marks->marks : "")}}">
    <p class="text-red-600">{{$errors->first('marks')}}</p>
</div>

<div>

</div>
<div>
    <label class="block" for="student_id"> Student Name</label>
    <select name="student_id" id="student_id">
        <option value=""> {{ __("Select Student") }}</option>
        @foreach($student as $id=> $value)
            <option value="{{$id}}"> {{$value }}</option>

        @endforeach
        <p class="text-red-600">{{$errors->first('student_id')}}</p>
    </select>
</div>
<div class="mt-4">
    <button class="bg-green-700 px-4 py-2"
            type="submit">{{$button}} </button>

</div>

@if(!empty($subjects))
    @foreach ($subjects as $key => $subject)
        <div class="col-md-6">
            <label class="form-control">{{$subject->subject_name}}</label>
            <input type="hidden" name="subject_id[]" value="{{$subject->id}}">
        </div>
        <div class="col-md-6">
            <input type="number" name="marks[]" class="form-control" placeholder="Enter Mark" min="0" max="100" required>
        </div>
    @endforeach
@endif


