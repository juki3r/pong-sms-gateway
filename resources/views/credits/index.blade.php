<x-app-layout>
  <x-slot name="header">
      <div class="header">
          <div class="flex justify-between">
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
      </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
  
                      <div class="card shadow rounded-2 p-4">
                          <div class="card-head mb-4">
                            <h3 class="fs-3 fw-bold">BUY MORE CREDITS</h3>
                          </div>
                          @if(session('error'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('error') }}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                          @endif
                          <form action="{{route('buy.credits')}}" method="POST" id="packageForm" class="">
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
                                    <input type="checkbox" class="form-checkbox checkbox" name="credits" value="500" />
                                  </td>
                                  <td class="px-0 py-2">500 Credits</td>
                                  <td class="px-4 py-2">₱ 1,200 .00</td>
                                  <td class="px-4 py-2">500</td>
                                </tr>
                                <tr class="package_row border cursor-pointer" onclick="selectRow(this)">
                                  <td class="px-4 py-2">
                                    <input type="checkbox" class="form-checkbox checkbox" name="credits" value="1000" />
                                  </td>
                                  <td class="px-0 py-2">1,000 Credits</td>
                                  <td class="px-4 py-2">₱ 2,500 .00</td>
                                  <td class="px-4 py-2">1,000</td>
                                </tr>
                                <tr class="package_row border cursor-pointer" onclick="selectRow(this)">
                                  <td class="px-4 py-2">
                                    <input type="checkbox" class="form-checkbox checkbox" name="credits" value="3000" />
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
          </div>
      </div>
  </div>
</x-app-layout>
