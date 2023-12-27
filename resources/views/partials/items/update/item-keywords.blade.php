<section class="container edit-item mt-4 bg-white rounded">
  <form action="{{ route('update-item-keywords', ['deposit' => $post->slug ]) }}" method="post" id="updateItemKeywords">
    @method('put')
    @csrf
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

    <!-- Keywords -->
    <div id="keywordsContainer" class="mt-3 text-center">
      <h5>List Keyword</h5>
      <u>Click item</u>
      @foreach($post->keywords as $item)
          <div>
              <input type="checkbox" class="btn-check" name="keyword[]" id="{{ 'btn-check-' . $item->name }}" autocomplete="off" value="{{ old('keyword[]', $item->name) }}" checked>
              <label class="btn" for="{{ 'btn-check-' . $item->name }}">{{ old('keyword[]', $item->name) }}</label>
          </div>
      @endforeach
      <!-- Keywords will be dynamically added here -->
    </div>
    <!-- akhir Keywords -->

    <!-- Menambahkan keyword baru -->
    <div class="container mt-3">
      <h5 class="fw-bold text-center">Add New Keyword:</h5>
      <div class="d-flex justify-content-center align-items-center flex-column mt-3">
        <div class="mb-3">
          <label for="newKeyword" class="form-label text-center">New Keyword:</label>
          <input type="text" class="form-control" id="newKeyword" placeholder="Enter new keyword">
        </div>
        <div class="mb-3">
          <label for="selectCategory" class="form-label">Select Category:</label>
          <select class="form-select" name="categories" id="selectCategory">        
            @foreach ($categories as $item)
            @if (old('categories_id', $post->categories_id == $item->id))
            <option value="{{ $item->slug }}" selected>{{ $item->name }}</option>  
            @else                
            <option value="{{ $item->slug }}">{{ $item->name }}</option>
            @endif
            @endforeach
          </select>
        </div>
        <button type="button" class="btn btn-primary" onclick="addNewKeyword()">Add Keyword</button>
      </div>
    </div>
    <!-- akhir Keywords Baru-->    

    <script>
      function addNewKeyword() {
        var newKeywordInput = document.getElementById('newKeyword');
        var selectCategory = document.getElementById('selectCategory');

        var newKeywordValue = newKeywordInput.value;
        var categoryValue = selectCategory.options[selectCategory.selectedIndex].text;

        var checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'btn-check';
        checkbox.name = 'keyword[]';
        checkbox.id = 'btn-check-' + newKeywordValue;
        checkbox.autocomplete = 'off';
        checkbox.value = newKeywordValue; // Set the checkbox value

        var label = document.createElement('label');
        label.className = 'btn';
        label.htmlFor = 'btn-check-' + newKeywordValue;
        label.textContent = newKeywordValue + ' (' + categoryValue + ')';

        var div = document.createElement('div');
        div.appendChild(checkbox);
        div.appendChild(label);

        var keywordsContainer = document.getElementById('keywordsContainer');
        keywordsContainer.appendChild(div);

        newKeywordInput.value = '';
      }

    </script>


    <!-- Footer Button -->
    <div class="footer-button p-4 d-flex justify-content-center gap-3">
      <a href="#" class="btn btn-warning text-white" onclick="window.history.back();">Previous</a>
      <a href="#" class="btn btn-warning text-white" onclick="document.getElementById('updateItemKeywords').submit();">Next</a>                
    </div>        
    <!-- Akhir Footer Button -->    
  </form>
</section>