@props(['comment'])
<x-panel class='bg-gray-50'>
    <article class="flex bg-gray-100 p-6 space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?id={{$comment->user_id}}" alt="" width="60" heigh="60" class="rounded-xl">
            </div>
            <div>
            <header class="mb-4">
                <h3 class="font_bold"> {{$comment->author->username}}</h3>
                <p class="text-xs"> Posted
                <time>{{$comment->created_at->format('F j, Y, g_i a')}} </time>
            </header>
            <p>{{$comment->body}}</p>
        </div>
    </article>
</x-panel>