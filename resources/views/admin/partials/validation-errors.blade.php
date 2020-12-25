@if ($errors->any())
    @foreach ($errors->all() as $error)
       <div>
        <p style="color: red">{{ $error }}</p>
        </div>
    @endforeach
@endif