@if ($errors->any())
    <div {{ $attributes }}>

        <ul class="mt-3 list-disc list-inside text-sm mx-auto p-0">
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger alert-dismissible fade show m-0 border border-danger" role="alert">
                <li>{{ $error }}</li>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endforeach
        </ul>
    </div>
@endif
