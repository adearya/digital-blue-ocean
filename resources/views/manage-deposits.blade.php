@extends("layouts.layout-dashboard")

@section("tittle", "Manage Deposits")


@section("content")

    <section class="container manage-deposits p-2 mt-4 bg-white rounded">
        <div class="text-center pt-4">
            <h1 class="tittle fw-bold">Manage Deposits</h1>
            <a href="/edit-item-submission-center" class="btn btn-warning text-white mt-4">NEW ITEM</a>
        </div>        

        <div class="container bg-main-content mt-3 p-3">
            <div class="table-responsive">
                <table class="table table-spacing bg-white">
                    <tr>
                        <th class="text-center">Last Modified</th>
                        <th class="text-center">Item Type</th>
                        <th>Tittle</th>
                        <th class="text-center">Journal or Publication Title</th>
                        <th class="text-center">Volume</th>
                        <th class="text-center">Number</th>
                        <th class="text-center"></th>
                    </tr>
                    <tr>
                        <td class="text-center">26 September 2023</td>
                        <td class="text-center">Article</td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1</td>
                        <td class="text-center bg-white">
                            <div class="d-flex gap-2">
                                <img src="{{ asset('assets/img_viewItem.svg') }}" alt="View Item">
                                <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                                <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">
                                <img src="{{ asset('assets/img_depositsItem.svg') }}" alt="Deposits Item">
                            </div>
                        </td>
                    </tr>                                        
                    <tr>
                        <td class="text-center">26 September 2023</td>
                        <td class="text-center">Article</td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1</td>
                        <td class="text-center bg-white">
                            <div class="d-flex gap-2">
                                <img src="{{ asset('assets/img_viewItem.svg') }}" alt="View Item">
                                <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                                <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">
                                <img src="{{ asset('assets/img_depositsItem.svg') }}" alt="Deposits Item">
                            </div>
                        </td>
                    </tr>                    
                    <tr>
                        <td class="text-center">26 September 2023</td>
                        <td class="text-center">Article</td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1</td>
                        <td class="text-center bg-white">
                            <div class="d-flex gap-2">
                                <img src="{{ asset('assets/img_viewItem.svg') }}" alt="View Item">
                                <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                                <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">
                                <img src="{{ asset('assets/img_depositsItem.svg') }}" alt="Deposits Item">
                            </div>
                        </td>
                    </tr>                    
                    <tr>
                        <td class="text-center">26 September 2023</td>
                        <td class="text-center">Article</td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1</td>
                        <td class="text-center bg-white">
                            <div class="d-flex gap-2">
                                <img src="{{ asset('assets/img_viewItem.svg') }}" alt="View Item">
                                <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                                <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">
                                <img src="{{ asset('assets/img_depositsItem.svg') }}" alt="Deposits Item">
                            </div>
                        </td>
                    </tr>                    
                    <tr>
                        <td class="text-center">26 September 2023</td>
                        <td class="text-center">Article</td>
                        <td>Utilization of Blockchain Technology for Management E-Certificate Open Journal System</td>
                        <td class="text-center">APTISI Transactions on Management (ATM)</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1</td>
                        <td class="text-center bg-white">
                            <div class="d-flex gap-2">
                                <img src="{{ asset('assets/img_viewItem.svg') }}" alt="View Item">
                                <img src="{{ asset('assets/img_removeItem.svg') }}" alt="Remove Item">
                                <img src="{{ asset('assets/img_editItem.svg') }}" alt="Edit Item">
                                <img src="{{ asset('assets/img_depositsItem.svg') }}" alt="Deposits Item">
                            </div>
                        </td>
                    </tr>                    
                </table>
            </div>
        </div>

        <div class="text-center p-3">
            <p>Displaying results 1 to 5 of 100. <br>
            1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | Next</p>
        </div>        
    </section>
    
@endsection