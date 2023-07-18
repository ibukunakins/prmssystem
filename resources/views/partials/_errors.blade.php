<ul>
    @foreach ($errors->all() as $error)
        <li class="text-danger error-text">{{ $error }}</li>
    @endforeach
</ul>