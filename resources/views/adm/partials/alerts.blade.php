@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
            {{ $error }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
@endif