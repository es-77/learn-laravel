<p>blade file code start</p>
<br>
<p>print variable or and php text use @{{  }}</p>
<p>name name is {{ 'Emmanuel' }}</p>

@php
    $name = 'Emmanuel';
@endphp

<p>my name is {{ $name }}</p>

<p>html print {{ '<h1>hello world</h1>' }}</p>

<p>to print html code use @{!!!!} {!! '<h1>hello world</h1>' !!}</p>

{{-- code or heading comments  --}}

<p>comments @{{ --code or heading comments-- }} </p>

<p>
    write if conditions
    @@if ()

    @@else

    @@endif
</p>
<p>
    switch case
    @@switch()
    @@case()

    @@break

    @@default

    @@endswitch
</p>

<p>
    while loop
    @@while ()

    @@endwhile
</p>

<p>
    for loop
    @@for ()


    @@endfor
</p>
<p>
    foreach loop
    @@foreach ( as )

    @@endforeach
</p>

<p>
    forelse is record not fund else block run
    @@forelse ( as )

    @@empty


    @@endforelse
</p>

<p>
    isset
    @@isset()

    @@endisset
</p>

<p>
    empty

    @@empty()

    @@endempty
</p>
