<!-- Search Collections -->        
<div class="container bg-white search-collections text-center p-3 rounded">
  <div class="header mt-2">
    <h1 class="fw-bold">Search for collections on Digital Blue Ocean</h1>
    <form action="/dashboard" method="get" class="mb-3">
      <div class="d-flex gap-2">
        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Title">
        <input type="text" class="form-control" name="author" id="author" aria-describedby="author" placeholder="Author">
        <input type="text" class="form-control" name="year" id="year" aria-describedby="year" placeholder="Year">
        <input type="text" class="form-control" name="keyword" id="keyword" aria-describedby="keyword" placeholder="Keyword">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
      <div class="advanced-search mt-2" style="display: none;">
        <div class="d-flex gap-2 justify-content-center">
          <input type="text" class="form-control w-25" name="status" id="status" aria-describedby="status" placeholder="Status">
          <input type="text" class="form-control w-25" name="publication" id="publication" aria-describedby="publication" placeholder="Publication">
        </div>
      </div>
    </form>
    <button type="button" class="btn btn-primary text-white" onclick="toggleAdvancedSearch()">+ Advanced Search</button>
  </div>
</div>

<script>
  function toggleAdvancedSearch() {
    const advancedSearch = document.querySelector('.advanced-search');
    advancedSearch.style.display = (advancedSearch.style.display === 'none') ? 'block' : 'none';
  }
</script>