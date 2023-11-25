<section class="search-books">
  <div class="title pt-5">
      <div class="main-text">
          Search for your favorite digital book now!
      </div>
      <div class="container d-flex justify-content-center">
          <form action="/posts" method="get" class="search-bar input-group input-group-lg">
              <input type="text" class="form-control" name="title" aria-label="Sizing example input" placeholder="Fill in with Book Title, Publisher, Book Category, Book Content" aria-describedby="inputGroup-sizing-lg" value="{{request('search')}}" style="border-radius: 20px 0 0 20px;">
              <button type="submit" class="btn btn-search btn-primary input-group-text text-white" style="border-radius: 0 20px 20px 0;" id="inputGroup-sizing-lg">Search</button>
          </form>
      </div>
  </div>
</section>