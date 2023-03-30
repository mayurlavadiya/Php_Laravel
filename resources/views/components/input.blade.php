
{{-- Centralized banavva mate --}}

<div class="form-group">
    <label for="">{{$label}}</label>
    <input type="{{$type}}" class="form-control border border-success" name="{{$name}}" id=""  />
    <span class="text-danger">
        @error('')
            {{$message}}
        @enderror
    </span>
</div>