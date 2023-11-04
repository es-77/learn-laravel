@php
    $name = 'Emmanuel saleem';
    $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
@endphp

<p> open console and see $name = 'Emmanuel saleem'; <br>
    $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9]; </p>
<script>
    var dataName = @json($name);
    var dataNumber = @json($numbers);
    var newWay = {{ Js::from($numbers) }};
    console.log("name print here", dataName);
    console.log("number print here", dataNumber);
    console.log("another way ", newWay);
</script>
