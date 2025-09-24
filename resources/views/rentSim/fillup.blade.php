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
                            <div class="col-md-3">
                                <label class="form-label">Province</label>
                                <select name="province" id="province" class="form-select" required>
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">City/Municipality</label>
                                <select name="city" id="city" class="form-select" required disabled>
                                    <option value="">Select City/Municipality</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Barangay</label>
                                <select name="barangay" id="barangay" class="form-select" required disabled>
                                    <option value="">Select Barangay</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">ZIP Code</label>
                                <input type="text" name="zip" class="form-control" pattern="\d{4}" maxlength="4" >
                                <div class="form-text">Must be a 4-digit ZIP code</div>
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
                            <div class="form-text">Make sure your face and ID are clearly visible (max 2MB)</div>
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
                            <button type="submit" id="submitBtn" class="btn btn-primary px-4" disabled>
                                <i class="bi bi-check-circle me-1"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script for PSGC + validation --}}
    <script>
        const provinceSelect = document.getElementById("province");
        const citySelect = document.getElementById("city");
        const barangaySelect = document.getElementById("barangay");

        // Load provinces
        fetch("https://psgc.gitlab.io/api/provinces.json")
            .then(res => res.json())
            .then(data => {
                data.forEach(province => {
                    let opt = new Option(province.name, province.code);
                    provinceSelect.add(opt);
                });
            });

        // On province change, load cities/municipalities
        provinceSelect.addEventListener("change", () => {
            citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
            barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
            citySelect.disabled = true;
            barangaySelect.disabled = true;

            if (provinceSelect.value) {
                fetch(`https://psgc.gitlab.io/api/provinces/${provinceSelect.value}/cities-municipalities.json`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(city => {
                            let opt = new Option(city.name, city.code);
                            citySelect.add(opt);
                        });
                        citySelect.disabled = false;
                    });
            }
        });

        // On city change, load barangays
        citySelect.addEventListener("change", () => {
            barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
            barangaySelect.disabled = true;

            if (citySelect.value) {
                fetch(`https://psgc.gitlab.io/api/cities-municipalities/${citySelect.value}/barangays.json`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(brgy => {
                            let opt = new Option(brgy.name, brgy.name);
                            barangaySelect.add(opt);
                        });
                        barangaySelect.disabled = false;
                    });
            }
        });

        // Disable/enable submit based on agreement checkbox
        document.getElementById('agreement').addEventListener('change', function () {
            document.getElementById('submitBtn').disabled = !this.checked;
        });

        // File size validation (2MB max)
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function () {
                if (this.files[0] && this.files[0].size > 2 * 1024 * 1024) {
                    alert("File size must be less than 2MB.");
                    this.value = "";
                }
            });
        });
    </script>
</x-app-layout>
