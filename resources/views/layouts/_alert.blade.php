@if (session('success'))
<div class="px-10 mt-5">
    <div class="alert alert-success d-flex align-items-center p-5 mb-0">
        <div class="d-flex flex-column">
            <h4 class="mb-1 text-dark">Alert</h4>
            <span>{{ session('success') }}</span>
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                </svg>
            </span>
        </button>
    </div>
</div>
@endif

@if (session('error'))
<div class="px-10 mt-5">
    <div class="alert alert-danger d-flex align-items-center p-5 mb-0">
        <div class="d-flex flex-column">
            <h4 class="mb-1 text-dark">Alert</h4>
            <span>{{ session('error') }}</span>
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                </svg>
            </span>
        </button>
    </div>
</div>
@endif

@if ($errors->any())
<div class="px-10 mt-5">
    <div class="alert alert-danger d-flex align-items-center p-5 mb-0">
        <div class="d-flex flex-column">
            <h4 class="mb-1 text-dark">Alert</h4>
            @foreach ($errors->all() as $error)
                <span>{{$error}}</span>
            @endforeach
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                </svg>
            </span>
        </button>
    </div>
</div>
@endif