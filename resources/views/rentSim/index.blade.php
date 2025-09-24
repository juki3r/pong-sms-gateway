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

                    rent

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
