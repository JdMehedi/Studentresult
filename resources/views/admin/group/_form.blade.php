<div>
    <label class="block" for="className">Insert Class Name</label>
    <input  type="text" name="className" id="className" value="">
    <p class="text-red-600">{{$errors->first('className')}}</p>
</div>
<div class="mt-4">
    <button class="bg-green-700 px-4 py-2"
            type="submit">{{$button}} </button>

</div>


