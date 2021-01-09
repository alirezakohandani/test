{{-- @foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <br>
    <p>{{ $post->description }}</p>
    <br>

    <h4>author: {{ DB::table('users')->select(['name'])->where('id', '=', $post->user_id)->get() }}</h4>
    <br>
    <hr>
@endforeach --}}
