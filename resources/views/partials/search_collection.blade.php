<section class="search-books">
    <div class="tittle pt-5">
    <div class="maintext">
        Search for your favorite digital book now!
    </div>
    <div class="container d-flex justify-content-center">
        <div class="searchbar input-group input-group-lg">
        <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Fill in with Book Title, Publisher, Book Category, Book Content" aria-describedby="inputGroup-sizing-lg" style="border-radius: 20px 0 0 20px;">
        <span class="btnsearch btn input-group-text text-white" style="border-radius: 0 20px 20px 0;" id="inputGroup-sizing-lg">Search</span>
        </div> 
    </div>     
    </div>
    <a class="btn btn-primary" href="{{ route('get_collections') }}" role="button">View All</a>
</section>