@extends("layouts.layout-dashboard")

@section("tittle", "Edit Item:")

@section ("content")

        <section class="container edit-item mt-4 bg-white rounded">
    <!-- Header Button -->
            <h1 class="container header-tittle pt-4 fw-bold">Edit Item</h1>
            <div class="container header-button d-flex justify-content-center gap-2">
                <a href="/edit-item-submission-center" class="btn btn-warning text-white mt-4 col">Submission Center</a>
                <button type="" class="btn mt-4">></button>
                <a href="/edit-item-keywords" class="btn btn-warning text-white mt-4 col">Keywords</a>
                <button type="" class="btn mt-4">></button>
                <a href="/edit-item-deposits" class="btn btn-warning text-white mt-4 col">Deposits</a>
            </div>
    <!-- akhir Header Button -->

    <!-- Deposits -->
        <div class="container bg-main-content-deposits mt-3 p-2">
        
    <!-- Main Content Deposits -->
        <div class="container mt-3">
            <p class="main-text-deposits mb-3">
                As an editor of this item, you can move it into review without first resolving the identified issues. Otherwise, click 'Save and Return' to address these issues later.
            </p>
            <p class="main-text-deposits mb-3">
                <span class="fw-bold">For work deposited by its author:</span> In self-archiving this collection of files and associated bibliographic metadata, I grant Digital Blue Ocean the right to store and make them permanently available publicly for free online. I declare that this material is my own intellectual property. I understand that Digital Blue Ocean does not assume any responsibility for any copyright breaches that may occur in distributing these files or metadata. (All authors are encouraged to clearly assert their copyright on the title page of their work.)
            </p>
            <p class="main-text-deposits mb-3">
                <span class="fw-bold">For work deposited by someone other than the author:</span> I declare that the collection of files and associated bibliographic metadata I am archiving at Digital Blue Ocean is in the public domain. If this is not the case, I accept full responsibility for any copyright breaches that may arise from the distribution of these files or metadata.
            </p>
            <p class="main-text-deposits">
                Clicking the deposit button indicates your agreement to these terms
            </p>

            <div class="deposits-button p-4 d-flex justify-content-center gap-3">
                <a href="/deposits-item" class="btn btn-dark text-white">DEPOSITS ITEM NOW</a>
                <a href="/manage-deposits" class="btn btn-dark text-white">SAVE FOR LATER</a>
            </div> 

        </div>    
    <!-- akhir Main Content Deposits -->
        </div>
    <!-- Akhir Deposits -->

    <!-- Footer Button -->
        <div class="footer-button p-4 d-flex justify-content-center gap-3">
            <a href="/edit-item-keywords" class="btn btn-warning text-white">Previous</a>
            <a href="/save-and-return-page" class="btn btn-warning text-white">Save and Return</a>
        </div> 
        <!-- akhir Footer Button -->           
    </section>


@endsection