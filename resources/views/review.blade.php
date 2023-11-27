@extends("layouts.layout-dashboard")

@section("tittle", "Review")

@section("content")

                <section class="container review-admin mt-4 p-2 bg-white rounded">
                        <div class="container text-center">
                                <h1 class="fw-bold">Review</h1>
                        </div>
                
                <!-- Help Accordion -->
                <div class="accordion w-50 mt-5" id="accordionHelp">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingHelp">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHelp" aria-expanded="true" aria-controls="collapseHelp">
                                Help
                                </button>
                        </h2>
                        <div id="collapseHelp" class="accordion-collapse collapse" aria-labelledby="headingHelp" data-bs-parent="#accordionHelp">
                                <div class="accordion-body">
                                        <div class="d-flex gap-3 mb-3">
                                                <img src="{{ asset('assets/img_edititemreview.svg') }}" class="ms-5" alt="image edit item review">
                                                <p class="mt-3">View item in detail, including edit item</p>
                                        </div>
                                        <div class="d-flex gap-3 mb-3">
                                                <img src="{{ asset('assets/img_publishitemreview.svg') }}" class="ms-5" alt="image publish item review">
                                                <p class="mt-3">Move Item to Repository</p>
                                        </div>
                                        <div class="d-flex gap-3">
                                                <img src="{{ asset('assets/img_deleteitemreview.svg') }}" class="ms-5" alt="image delete item review">
                                                <p class="mt-3">Destroy Item (with notification to depositing user)</p>
                                        </div>
                                </div>
                        </div>
                        </div>
                </div>    
                <!-- akhir Help Accordion -->

                {{-- main content dashboard --}}
                <div class="container bg-main-content mt-3 p-3">
                        <div class="table-responsive">
                                <table class="table table-spacing bg-white">
                                <tr>
                                        <th class="text-center">Last Modified</th>
                                        <th class="text-center">Item Type</th>
                                        <th>Tittle</th>
                                        <th class="text-center">Depositing User</th>
                                        <th class="text-center">Journal or Publication Title</th>
                                        <th class="text-center">Volume</th>
                                        <th class="text-center">Number</th>
                                        <th class="text-center"></th>
                                </tr>
                                <tr>
                                        <td class="text-center">26 September 2023</td>
                                        <td class="text-center">Article</td>
                                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                                        <td class="text-center">Admin Digital Blue Ocean</td>
                                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center bg-white">
                                                <div class="d-flex gap-2">
                                                <img src="{{ asset('assets/img_edititemreview.svg') }}" alt="Edit Item">
                                                <img src="{{ asset('assets/img_publishitemreview.svg') }}" alt="Publish Item">
                                                <img src="{{ asset('assets/img_deleteitemreview.svg') }}" alt="Delete Item">
                                                </div>
                                        </td>
                                </tr>                                        
                                <tr>
                                        <td class="text-center">26 September 2023</td>
                                        <td class="text-center">Article</td>
                                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                                        <td class="text-center">Admin Digital Blue Ocean</td>
                                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center bg-white">
                                                <div class="d-flex gap-2">
                                                        <img src="{{ asset('assets/img_edititemreview.svg') }}" alt="Edit Item">
                                                        <img src="{{ asset('assets/img_publishitemreview.svg') }}" alt="Publish Item">
                                                        <img src="{{ asset('assets/img_deleteitemreview.svg') }}" alt="Delete Item">
                                                </div>
                                        </td>
                                </tr>                    
                                <tr>
                                        <td class="text-center">26 September 2023</td>
                                        <td class="text-center">Article</td>
                                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                                        <td class="text-center">Admin Digital Blue Ocean</td>
                                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center bg-white">
                                                <div class="d-flex gap-2">
                                                        <img src="{{ asset('assets/img_edititemreview.svg') }}" alt="Edit Item">
                                                        <img src="{{ asset('assets/img_publishitemreview.svg') }}" alt="Publish Item">
                                                        <img src="{{ asset('assets/img_deleteitemreview.svg') }}" alt="Delete Item">
                                                </div>
                                        </td>
                                </tr>                    
                                <tr>
                                        <td class="text-center">26 September 2023</td>
                                        <td class="text-center">Article</td>
                                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                                        <td class="text-center">Admin Digital Blue Ocean</td>
                                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center bg-white">
                                                <div class="d-flex gap-2">
                                                        <img src="{{ asset('assets/img_edititemreview.svg') }}" alt="Edit Item">
                                                        <img src="{{ asset('assets/img_publishitemreview.svg') }}" alt="Publish Item">
                                                        <img src="{{ asset('assets/img_deleteitemreview.svg') }}" alt="Delete Item">
                                                </div>
                                        </td>
                                </tr>                    
                                <tr>
                                        <td class="text-center">26 September 2023</td>
                                        <td class="text-center">Article</td>
                                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                                        <td class="text-center">Admin Digital Blue Ocean</td>
                                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center bg-white">
                                                <div class="d-flex gap-2">
                                                        <img src="{{ asset('assets/img_edititemreview.svg') }}" alt="Edit Item">
                                                        <img src="{{ asset('assets/img_publishitemreview.svg') }}" alt="Publish Item">
                                                        <img src="{{ asset('assets/img_deleteitemreview.svg') }}" alt="Delete Item">
                                                </div>
                                        </td>
                                </tr>                    
                                </table>
                        </div>
                </div>
                {{-- akhir main content dashboard --}}

                </section>
@endsection