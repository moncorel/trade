@if(session('success'))
    <p class="bg-success p-2 text-white rounded">
        {{ session('success') }}
    </p>
@elseif(session('error'))
    <p class="bg-danger p-2 text-white rounded">
        {{ session('error') }}
    </p>
@endif
