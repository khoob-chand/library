<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control" id="{{$name}}" value="{{old($name)}}">
@error($name)
<span class="text-danger">{{$message}}</span> 
@enderror


</div>