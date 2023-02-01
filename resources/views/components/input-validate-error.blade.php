@props(['error-field'])

@error('error-field')
    <small class="mt-1 text-red-500 ">
        {{ $message }}
    </small>
@enderror
