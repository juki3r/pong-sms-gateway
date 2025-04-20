<x-app-layout>
    <x-slot name="header">
        <div class="header">
            <div class="flex justify-between">
                <h3 class="fs-3">
                    Send SMS
                </h3>
                <div class="d-flex" style="font-size: 13px">
                    <div class="d-flex justify-center align-items-center border px-2 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-database-fill text-warning" viewBox="0 0 16 16">
                            <path d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223"/>
                            <path d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                            <path d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                            <path d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                          </svg>
                        <span class="px-1 fw-bold">{{$current_credits}}</span>
                        credits
                       
                    </div>
                    <a href="{{route('credits')}}">
                        <button class="border px-2 py-2 bg-danger text-light m-0">Buy</button>
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
                        <div class="container">
                            <div class="card shadow rounded-4">
                                <div class="card-body p-4">
                                    <h4 class="mb-4">Send Message</h4>
                                    
                                    <form action="{{route('sms.send')}}" method="POST">
                                        @csrf
                        
                                        <!-- Recipient Number Input -->
                                        <div class="mb-3">
                                            <label for="recipient" class="form-label">Enter Number</label>
                                            <input 
                                                type="number" 
                                                class="form-control form-control-lg @error('recipient') is-invalid @enderror" 
                                                name="recipient" 
                                                id="recipient" 
                                                placeholder="e.g. 09xxxxxxxxxx" 
                                                value="{{ old('recipient') }}"
                                                required>
                                            @error('recipient')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
    
                        
                                        <!-- Message Field -->
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Your Message</label>
                                            <textarea 
                                                class="form-control form-control-lg @error('message') is-invalid @enderror" 
                                                name="message" 
                                                id="message" 
                                                rows="4" 
                                                maxlength="160" 
                                                placeholder="Type your message here (max 160 characters)..." 
                                                required
                                                oninput="updateCharCount()">{{ old('message') }}</textarea>
                                            <small class="text-muted">
                                                <span id="charCount">0</span>/160 characters
                                            </small>
                                            @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
    
                        
                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-danger btn-lg w-100">
                                            Send Message
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Live Character Count Script -->
                        <script>
                            function updateCharCount() {
                                const message = document.getElementById('message');
                                const count = document.getElementById('charCount');
                                count.textContent = message.value.length;
                            }
                        
                            // Initialize count on page load (optional)
                            document.addEventListener('DOMContentLoaded', updateCharCount);
                        </script>
       
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
