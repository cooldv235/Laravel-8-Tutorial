<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Submit Page</title>
    <style>
        .err-msg {
            color: red;
        }
    </style>
</head>
<body>

    <!-- -->
    <form action="{{ route('store') }}" method="POST">
        @csrf <!-- ALWAYS INCLUDE THIS WHEN POST REQUEST -->
        <input type="text" name="title" placeholder="Enter Title" value="{{old('title')}}" />
        <!-- THIS IS HOW TO USE @ error DIRECTIVE TO DISPLAY VALIDATION ERRORS -->
        @error('title')
            <p class="err-msg">{{$message}}</p>
        @enderror

        <input type="text" name="place" placeholder="Enter Place" value="{{old('place')}}" />
        @error('place')
            <p class="err-msg">{{$message}}</p>
        @enderror

        <button type="submit">Save</button>
    </form>

    @if(Session::has('message'))
        <p style="color: green;">{{ Session::get('message') }}</p>
    @endif
    
</body>
</html>