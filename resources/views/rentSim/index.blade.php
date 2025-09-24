<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-flex justify-content-between">
            {{ __('Rent Sim Card') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Alerts --}}
                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @elseif(session('alert'))
                        <div class="alert alert-danger">{{ session('alert') }}</div>
                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <h5 class="fw-bold mb-3">📌 SIM Card Rental Requirements</h5>
                        <p class="mb-4">Please carefully follow the steps below to complete your SIM card rental application:</p>

                        <ol class="list-group list-group-numbered mb-4">
                            <li class="list-group-item">
                                <strong>Complete Address</strong>  
                                <ul class="mt-2">
                                    <li>House/Unit Number & Street</li>
                                    <li>Barangay</li>
                                    <li>City/Municipality</li>
                                    <li>Province</li>
                                    <li>ZIP/Postal Code</li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <strong>Valid Government-Issued ID</strong>  
                                <p class="mb-1 mt-2">Upload a clear photo of one (1) valid ID such as: Passport, Driver’s License, UMID, PRC ID, Voter’s ID, SSS/GSIS, or other accepted ID.</p>
                                <small class="text-muted">All details (ID number, name, and photo) must be visible.</small>
                            </li>

                            <li class="list-group-item">
                                <strong>Selfie with Your ID</strong>  
                                <p class="mb-1 mt-2">Take a selfie holding the same valid ID beside your face.</p>
                                <small class="text-muted">This is required to confirm the ID belongs to you.</small>
                            </li>

                            <li class="list-group-item">
                                <strong>Personal Information</strong>  
                                <ul class="mt-2">
                                    <li>Full Name (as on ID)</li>
                                    <li>Date of Birth</li>
                                    <li>Active Email Address</li>
                                    <li>Mobile Number</li>
                                </ul>
                            </li>

                            <li class="list-group-item">
                                <strong>Agreement & Confirmation</strong>  
                                <p class="mb-0 mt-2">You must agree to our rental terms, responsible usage policy, and compliance with the Philippine Data Privacy Act.</p>
                            </li>
                        </ol>

                        <p class="mt-3 text-warning fw-bold">
                            ⚠️ Incomplete or incorrect submissions may cause delays or rejection of your SIM rental request.
                        </p>
                    </div>

                    {{-- Next Button --}}
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('sim.upload') }}" class="btn btn-primary px-4">
                            Next →
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
