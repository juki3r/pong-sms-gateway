<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SIM Rental – Step 2: Upload & Fill Information') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Address --}}
                    <h5 class="fw-bold mb-3">🏠 Complete Address</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>House/Unit & Street</label>
                            <input type="text" name="street" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Barangay</label>
                            <input type="text" name="barangay" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>City/Municipality</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Province</label>
                            <input type="text" name="province" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>ZIP Code</label>
                            <input type="text" name="zip" class="form-control" required>
                        </div>
                    </div>

                    {{-- Uploads --}}
                    <h5 class="fw-bold mb-3 mt-4">📂 Upload Documents</h5>
                    <div class="mb-3">
                        <label>Valid ID</label>
                        <input type="file" name="valid_id" class="form-control" accept="image/*,.pdf" required>
                    </div>
                    <div class="mb-3">
                        <label>Selfie with ID</label>
                        <input type="file" name="selfie_id" class="form-control" accept="image/*" required>
                    </div>

                    {{-- Personal Info --}}
                    <h5 class="fw-bold mb-3 mt-4">👤 Personal Information</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                    </div>

                    {{-- Agreement --}}
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="agreement" required>
                        <label class="form-check-label">
                            I certify that the information provided is true and correct, and I agree to the SIM card rental terms and conditions.
                        </label>
                    </div>

                    {{-- Submit --}}
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
