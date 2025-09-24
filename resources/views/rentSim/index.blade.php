<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-flex justify-content-between">
            {{ __('Rent Sim Card') }}
        </h2>
        
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @elseif(session('alert'))
                        <div class="alert alert-danger">
                            {{ session('alert') }}
                        </div>
                    @endif

                    {{-- Recipient error --}}
                    @if($errors->has('recipient'))
                        <div class="alert alert-danger">{{ $errors->first('recipient') }}</div>
                    @elseif($errors->has('message'))
                        <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                    @elseif($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                   <div>
                        <h6 class="fw-bold mb-3">SIM Card Rental Requirements</h6>
                        <p>Please carefully follow the steps below to complete your SIM card rental application:</p>

                        <ol class="mb-0">
                            <li>
                                <strong>Complete Address</strong>  
                                Provide your full residential address, including:  
                                <ul>
                                    <li>House/Unit Number & Street</li>
                                    <li>Barangay</li>
                                    <li>City/Municipality</li>
                                    <li>Province</li>
                                    <li>ZIP/Postal Code</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Valid Government-Issued ID</strong>  
                                Upload a clear photo of one (1) valid ID such as: Passport, Driver’s License, UMID, PRC ID, Voter’s ID, SSS/GSIS, or any other accepted government-issued ID.  
                                <br><span class="text-muted">Make sure all details (ID number, name, and photo) are visible.</span>
                            </li>

                            <li>
                                <strong>Selfie with Your ID</strong>  
                                Take a selfie holding the same valid ID beside your face.  
                                <br><span class="text-muted">This is required for verification to confirm that the ID belongs to you.</span>
                            </li>

                            <li>
                                <strong>Personal Information</strong>  
                                Ensure you provide:  
                                <ul>
                                    <li>Full Name (as written on your ID)</li>
                                    <li>Date of Birth</li>
                                    <li>Active Email Address</li>
                                    <li>Mobile Number (if available)</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Agreement & Confirmation</strong>  
                                You must agree to our rental terms, responsible usage policy, and compliance with the Philippine Data Privacy Act before we process your request.
                            </li>
                        </ol>

                        <p class="mt-3 text-warning fw-bold">
                            ⚠️ Incomplete or incorrect submissions may cause delays or rejection of your SIM rental request.
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
