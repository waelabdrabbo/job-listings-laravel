@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv)
@endphp
<li class="list-group-item">
    @foreach ($tags as $tag)        
    <a class="badge text-bg-primary text-decoration-none" href="/?tag={{$tag}}">{{$tag}}</a>
    @endforeach
</li>
