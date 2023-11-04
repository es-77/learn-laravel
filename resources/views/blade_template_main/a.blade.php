@include('blade_template_main.header')
<p>
<h1>A blade file view</h1>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quaerat at esse explicabo sed, assumenda provident
mollitia hic optio officiis voluptatem voluptatum voluptatibus pariatur voluptas voluptates quam unde molestiae sequi.
</p>
{{-- @includeWhen(true, 'blade_template_main.b') --}}
{{-- @includeWhen(false, 'blade_template_main.b') --}}

{{-- opposite worke on upper  --}}

{{-- @includeUnless(false, 'blade_template_main.b') --}}
{{-- @includeUnless(true, 'blade_template_main.b') --}}

{{-- @includeIf() --}}

{{-- @includeFirst('blade_template_main.b') --}}

@include('blade_template_main.footer')
