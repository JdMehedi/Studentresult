<label class="block mb-2" for="name">Subject Name</label>
<input class="block" type="text" name="name" value="{{old('name', isset($subject)? $subject->name :"")}}">
<p class="text-red-600">{{$errors->first('name')}}</p>
<button class="bg-green-700 w-16 h-8 mt-2" type="submit" >{{$button}}</button>
