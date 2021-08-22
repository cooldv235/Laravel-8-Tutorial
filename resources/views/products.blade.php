<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pass Array Data View</title>
</head>
<body>

    <!-- NOW WE HAVE TO LOOP THROUGH THAT ARRAY OF DATA IN ORDER TO PRINT -->
    <!-- FOR THIS WE USE @foreach blade template -->
    
    <!-- 
        @if(count($products))    
            @foreach($products as $product)
                {{$product}}
            @endforeach 
        @else
            <p>No Record to Show.</p>

        // FOR ELSE :-
        @forelse($products as $product)
            {{$product}}
        @empty
            <p>No Records to Show.</p>
        @endforelse
    -->

    <h5>To be Completed.</h5>

</body>
</html>