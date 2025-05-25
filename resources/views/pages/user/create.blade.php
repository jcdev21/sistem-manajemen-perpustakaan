<form class="form" action="" method="POST">
    @csrf
    <div class="d-flex flex-column mb-8 fv-row">
        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
            <span class="required">Name</span>
        </label>
        <input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama" name="nama" required />
    </div>
    <div class="d-flex flex-column mb-8 fv-row">
        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
            <span class="required">Email</span>
        </label>
        <input type="email" class="form-control form-control-solid" placeholder="Masukkan Email" name="email" required />
    </div>
    <div class="text-center">
        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
        <button type="submit" class="btn btn-primary">
            <span class="indicator-label">Submit</span>
        </button>
    </div>
</form>