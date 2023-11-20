<section class="search-books">
    <div class="tittle pt-5">
    <div class="maintext">
        Search for your favorite digital book now!
    </div>
    <div class="container d-flex justify-content-center">
        <form action="/posts" method="get">
            <div class="searchbar input-group input-group-lg">
            <input name="title" type="text" class="form-control" aria-label="Sizing example input" placeholder="Fill in with Book Title, Publisher, Book Category, Book Content" aria-describedby="inputGroup-sizing-lg" style="border-radius: 20px 0 0 20px;" value="{{request('search')}}">
            <button class="btnsearch btn input-group-text text-white" style="border-radius: 0 20px 20px 0;" id="inputGroup-sizing-lg" type="submit">Search</button>
            </div> 
        </form>
    </div>     
    </div>
    <a class="btn btn-primary" href="{{ route('all_posts') }}" role="button">View All</a>
</section>