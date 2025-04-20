<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pong SMS Gateway</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    @vite('resources/css/app.css')
</head>
<style>
    body{
        height: 100vh;
        background-color: #f2f2f2;
    }
    .main_wrapper{
        height: 87vh;
    }
    .card {
        max-width: 1200px;
        margin: 0 auto;
    }

    .package_row:hover{
        background-color: rgb(39, 50, 85);
        color: white;
    }


</style>
<body>

    <div class="container-fluid h-100">
        <div class="row h-100">
            {{-- NAVBAR / SIDEBAR --}}
            <div class="col-1 bg-black text-light flex flex-column align-items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-light-800 mt-2" />
                </a>

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="mt-5">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('send_sms')" :active="request()->routeIs('send_sms')" class="mt-3">
                    {{ __('Send SMS') }}
                </x-nav-link>
                <x-nav-link :href="route('credits')" :active="request()->routeIs('credits')" class="mt-3">
                    {{ __('Credits') }}
                </x-nav-link>
            </div>

            <div class="col">
                <div class=" p-3 flex justify-between">
                    <h3 class="fs-3">
                        Credits
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


                {{-- MAIN-CONTENT --}}
                <div class="mt-4 d-flex flex-column justify-start main_wrapper">
                    <div class="row p-5">
                        <div class="card shadow rounded-2 p-4">
                          <div class="card-head mb-4">
                            <h3 class="fs-3 fw-bold">BUY MORE CREDITS</h3>
                          </div>
                          
                          <form action="{{route('package')}}" method="POST" id="packageForm" class="">
                            @csrf
                            
                            <table class="w-full bg-white shadow rounded-lg">
                              <thead class="bg-red-600 text-white">
                                <tr>
                                  <th class="px-0 py-2 w-1"></th>
                                  <th class="px-0 py-2 text-left">Package</th>
                                  <th class="px-4 py-2 text-left">Price</th>
                                  <th class="px-4 py-2 text-left">Credits</th>
                                </tr>
                              </thead>
                              <tbody id="packageTable">
                                <tr class="package_row border cursor-pointer" onclick="selectRow(this)">
                                  <td class="px-4 py-2">
                                    <input type="checkbox" class="form-checkbox checkbox" name="selected_package" value="500" />
                                  </td>
                                  <td class="px-0 py-2">500 Credits</td>
                                  <td class="px-4 py-2">₱ 1,200 .00</td>
                                  <td class="px-4 py-2">500</td>
                                </tr>
                                <tr class="package_row border cursor-pointer" onclick="selectRow(this)">
                                  <td class="px-4 py-2">
                                    <input type="checkbox" class="form-checkbox checkbox" name="selected_package" value="1000" />
                                  </td>
                                  <td class="px-0 py-2">1,000 Credits</td>
                                  <td class="px-4 py-2">₱ 2,500 .00</td>
                                  <td class="px-4 py-2">1,000</td>
                                </tr>
                                <tr class="package_row border cursor-pointer" onclick="selectRow(this)">
                                  <td class="px-4 py-2">
                                    <input type="checkbox" class="form-checkbox checkbox" name="selected_package" value="3000" />
                                  </td>
                                  <td class="px-0 py-2">3,000 Credits</td>
                                  <td class="px-4 py-2">₱5,000 .00</td>
                                  <td class="px-4 py-2">3,000</td>
                                </tr>
                              </tbody>
                            </table>
                            @error('selected_package')
                                <div class="text-danger py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                          
                            <div class="flex justify-end mt-4">
                              <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded shadow hover:bg-red-700">Buy</button>
                            </div>
                          </form>
                          
                          <script>
                            function selectRow(row) {
                              // Uncheck all checkboxes
                              document.querySelectorAll(".checkbox").forEach(cb => cb.checked = false);
                              
                              // Check the one that was clicked
                              const checkbox = row.querySelector(".checkbox");
                              checkbox.checked = true;
                            }
                          </script>
                          
                        </div>
                      </div>
                      
                      
                    
                    <div class="row mt-auto p-3">
                        <footer class="text-success text-center py-3 mt-auto">
                            &copy; {{ date('Y') }} PONG. All rights reserved.
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
