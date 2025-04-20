<x-app-layout>
    <x-slot name="header">
        <div class="header">
            <div class="flex justify-between">
                <h3 class="fs-3">
                    Dashboard PONG
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

                    <div class="d-flex flex-column w-100 justify-start">
                        <div class="slot">
                            <div class="row">
                                {{-- SMS --}}
                                <div class="col">
                                    <a href="{{route('send_sms')}}">
                                        <div class="d-flex justify-center align-items-center p-4 text-light" style="background-color: rgba(87, 90, 90, 0.996); border-radius:6px">
                                            <div class="text-center border-danger d-flex align-items-center px-2 bg-danger send_sms">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                                                </svg>
                                                <button class="btn btn:hover p-2 text-light">Send an SMS</button>
                                            </div>
                                            <span class="px-4">
                                                Use our SMS Web Tool to send a message.
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                {{-- TOP-UP --}}
                                <div class="col">
                                    <div class="d-flex justify-center align-items-center p-4 text-light" style="background-color: rgba(87, 90, 90, 0.996); border-radius:6px">
                                        <a href="{{route('credits')}}">
                                            <div class="text-center border-danger d-flex align-items-center px-2 bg-danger send_sms">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-database-fill" viewBox="0 0 16 16">
                                                    <path d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223"/>
                                                    <path d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                                                    <path d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                                                    <path d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"/>
                                                </svg>
                                                <button class="btn btn:hover p-2 text-light">Top-up credits</button>
                                            </div>
                                        </a>
                                        <span class="px-4">
                                            Top-up with one of our packages..
                                        </span>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row py-2 m-0">
                                @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @elseif(session('status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                <h3 class="fs-4 m-0 p-0 fw-bold mt-3">Recent Messages</h3>
            
                                
                            
                                <div id="messageTable" class="mt-1">
                                    <table class="table table-bordered" style="font-size: 12px;">
                                        <thead>
                                            <tr>
                                                <th>RECIPIENT</th>
                                                <th>MESSAGE</th>
                                                <th>SMS LENGTH</th>
                                                <th>STATUS</th>
                                                <th>DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody id="messagesBody">
                                           
                                        </tbody>
                                    </table>
                                    <nav id="pagination" class="mt-3"></nav>
                                </div>      
                                <script>
                                let currentPage = 1;
                                function fetchMessages(page = currentPage) {
                                    fetch(`{{ route('messages.status') }}?page=${page}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            currentPage = data.current_page; // Update current page
            
                                            const tbody = document.getElementById('messagesBody');
                                            tbody.innerHTML = '';
            
                                            data.messages.forEach(message => {
                                                const row = `
                                                    <tr>
                                                        <td>${message.phone_number}</td>
                                                        <td>${message.message}</td>
                                                        <td>${message.message.length}</td>
                                                        <td>
                                                            ${message.status === 'sent' ? '<span class="badge bg-success">Sent</span>' :
                                                            message.status === 'failed' ? '<span class="badge bg-danger">Failed</span>' :
                                                            `<span class="badge bg-secondary">${message.status}</span>`}
                                                        </td>
                                                        <td>${new Date(message.created_at).toLocaleString('en-PH', { timeZone: 'Asia/Manila' })}</td>
                                                    </tr>
                                                `;
                                                tbody.innerHTML += row;
                                            });
            
                                            updatePagination(data.current_page, data.last_page);
                                        })
                                        .catch(error => console.error('Error fetching messages:', error));
                                }
                                function updatePagination(current, last) {
                                    const pagination = document.getElementById('pagination');
                                    let html = '<ul class="pagination justify-content-center">';
            
                                    if (current > 1) {
                                        html += `<li class="page-item"><a class="page-link" href="#" onclick="goToPage(${current - 1})">&laquo;</a></li>`;
                                    }
                                    for (let i = 1; i <= last; i++) {
                                        html += `<li class="page-item ${i === current ? 'active' : ''}">
                                                    <a class="page-link" href="#" onclick="goToPage(${i})">${i}</a>
                                                </li>`;
                                    }
                                    if (current < last) {
                                        html += `<li class="page-item"><a class="page-link" href="#" onclick="goToPage(${current + 1})">&raquo;</a></li>`;
                                    }
                                    html += '</ul>';
                                    pagination.innerHTML = html;
                                }
                                function goToPage(page) {
                                    currentPage = page;
                                    fetchMessages(currentPage);
                                }
                                // Auto-refresh every second
                                setInterval(() => fetchMessages(currentPage), 1000);
                                fetchMessages(); // Initial load
                                    
                                </script>
                            </div>
            
                        </div>
                        
                    </div>
                    
        


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
