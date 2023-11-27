@extends("layouts.layout-dashboard")

@section("tittle", "Dashboard-Admin")


@section("content")

        <section class="container dashboard-admin mt-4 p-2 bg-white rounded">
    {{-- header button --}}
        <div class="bg-header">
            <div class="container d-flex flex-column justify-content-center mt-2 p-2 gap-3">
                <div class="row justify-content-center">
                    <div class="col-sm-4 d-flex align-items-center justify-content-center mb-3">
                        <div class="article-content d-flex gap-2">
                            <h5 class="fw-bold">Article</h5>
                            <a href="/" class="btn btn-warning btn-sm text-white">17 Data</a>
                        </div>
                    </div>
                    <div class="col-sm-4 d-flex align-items-center justify-content-center mb-3">
                        <div class="books-content d-flex gap-2">
                            <h5 class="fw-bold">Books</h5>
                            <a href="/" class="btn btn-warning btn-sm text-white">0 Data</a>
                        </div>
                    </div>
                    <div class="col-sm-4 d-flex align-items-center justify-content-center mb-3">
                        <div class="thesis-content d-flex gap-2">
                            <h5 class="fw-bold">Thesis</h5>
                            <a href="/" class="btn btn-warning btn-sm text-white">0 Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- akhir header button --}}

    {{-- header tittle --}}
        <div class="container mt-3 p-2">
            <h3 class="fw-bold text-center">ALL COLLECTIONS</h3>
        </div>
    {{-- akhir header tittle --}}

    {{-- collection menu --}}
        <div class="container d-flex justify-content-between">
            <p class="navigation-menu ms-4">
                <a href="/first" class="fw-bold">First</a>
                <a href="/previous" class="fw-bold"> &lt; </a>
                <span class="fw-bold">1-5</span> out of <span class="fw-bold">17</span>
                <a href="/next" class="fw-bold"> &gt; </a>
                <a href="/last" class="fw-bold">Last</a>
            </p>
            <div class="order-by-results me-4 d-flex gap-3">
                <p>Order by results:</p>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="orderByDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="orderByDropdown">
                        <li><a class="dropdown-item" href="#" onclick="changeOrder('Recent First')">Recent First</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeOrder('Oldest First')">Oldest First</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
            function changeOrder(selectedOrder) {
                document.getElementById('orderByDropdown').textContent = selectedOrder;
            }
        </script>    
    {{-- akhir collection menu --}}

    {{-- main content dashboard --}}
        <div class="container bg-main-content mt-3 p-3">
            <div class="table-responsive">
                <table class="table table-spacing bg-white">
                    <tr>
                        <th class="text-center">NO.</th>
                        <th class="text-center">Cover</th>
                        <th>Tittle</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Keyword</th>
                    </tr>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">
                            <img src="{{ asset('assets/img_coveratm.svg') }}" alt="Logo DBO" width="80">
                        </td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center text-nowrap">Farida Agustin <br>
                            Qurotul Aini <br>
                            Alfiah Khoirunisa <br>
                            Efa Ayu Nabila
                        </td>
                        <td class="text-center">Technology</td>
                    </tr>                                        
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">
                            <img src="{{ asset('assets/img_coveratm.svg') }}" alt="Logo DBO" width="80">
                        </td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center text-nowrap">Farida Agustin <br>
                            Qurotul Aini <br>
                            Alfiah Khoirunisa <br>
                            Efa Ayu Nabila
                        </td>
                        <td class="text-center">Technology</td>
                    </tr>                    
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">
                            <img src="{{ asset('assets/img_coveratm.svg') }}" alt="Logo DBO" width="80">
                        </td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center text-nowrap">Farida Agustin <br>
                            Qurotul Aini <br>
                            Alfiah Khoirunisa <br>
                            Efa Ayu Nabila
                        </td>
                        <td class="text-center">Technology</td>
                    </tr>                    
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">
                            <img src="{{ asset('assets/img_coveratm.svg') }}" alt="Logo DBO" width="80">
                        </td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center text-nowrap">Farida Agustin <br>
                            Qurotul Aini <br>
                            Alfiah Khoirunisa <br>
                            Efa Ayu Nabila
                        </td>
                        <td class="text-center">Technology</td>
                    </tr>                    
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">
                            <img src="{{ asset('assets/img_coveratm.svg') }}" alt="Logo DBO" width="80">
                        </td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center text-nowrap">Farida Agustin <br>
                            Qurotul Aini <br>
                            Alfiah Khoirunisa <br>
                            Efa Ayu Nabila
                        </td>
                        <td class="text-center">Technology</td>
                    </tr>                    
                </table>
            </div>
        </div>
    {{-- akhir main content dashboard --}}
        </section>
    
@endsection