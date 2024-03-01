<div class="form-group">
    <label for="{{ $name }}">{{ $label }} </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control"
        placeholder="Enter {{ $name }} " value="{{old($name)}}">

    {{-- error print msg  --}}
    <span class="text-danger">{{ $errors->first($name) }}</span>
    {{-- <span class="text-danger">@error($name) {{ $message }} @enderror</span> --}}
</div>
