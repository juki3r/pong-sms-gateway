<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-gray-800 leading-tight">
            {{ __('SIM Rental – Step 2: Upload & Fill Information') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <form action="{{ route('sim.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Address --}}
                        <h5 class="fw-bold mb-3">🏠 Complete Address</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Barangay</label>
                                <input type="text" name="barangay" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">City/Municipality</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Province</label>
                                <input type="text" name="province" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">ZIP Code</label>
                                <input type="text" name="zip" class="form-control" required>
                            </div>
                        </div>

                        {{-- Personal Info --}}
                        <h5 class="fw-bold mb-3 mt-4">👤 Personal Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>

                        {{-- Uploads --}}
                        <h5 class="fw-bold mb-3 mt-4">📂 Upload Documents</h5>
                        <div class="mb-3">
                            <label class="form-label">Valid ID</label>
                            <input type="file" name="valid_id" class="form-control" accept="image/*,.pdf" required>
                            <div class="form-text">Accepted formats: JPG, PNG, PDF (max 2MB)</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Selfie with ID</label>
                            <input type="file" name="selfie_id" class="form-control" accept="image/*" required>
                            <div class="form-text">Make sure your face and ID are clearly visible</div>
                        </div>

                        {{-- Agreement --}}
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="agreement" id="agreement" required>
                            <label class="form-check-label" for="agreement">
                                I certify that the information provided is true and correct, and I agree to the SIM card rental terms and conditions.
                            </label>
                        </div>

                        {{-- Submit --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check-circle me-1"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
