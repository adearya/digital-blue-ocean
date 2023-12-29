<section class="container edit-item mt-4 bg-white rounded">
  <form action="{{ route('update-item-submission-center', ['deposit' => $post->slug ]) }}" method="post" id="updateItemSubmissionCenter" enctype="multipart/form-data">
    @method('put')
    @csrf
    <!-- Header Button -->
    <h1 class="container header-tittle pt-4 fw-bold">Edit Item</h1>
    <div class="container header-button d-flex flex-wrap justify-content-center gap-2">
      <a href="/edit-item-submission-center" class="btn btn-warning text-white mt-4 col-md-3 col-6">Submission Center</a>
      <button type="" class="btn mt-4 d-none d-md-block">></button>
      <a href="/edit-item-keywords" class="btn btn-warning text-white mt-4 col-md-3 col-6">Keywords</a>
      <button type="" class="btn mt-4 d-none d-md-block">></button>
      <a href="/edit-item-deposits" class="btn btn-warning text-white mt-4 col-md-3 col-6">Deposits</a>
    </div>            
    <!-- Akhir Header Button -->

    <!-- Submission Center -->
    <div class="container bg-main-content-submissioncenter mt-3 p-5">

      <!-- Item Type - Submission Center -->
      <div class="d-flex">
      <div class="container justify-content-center bg-white mt-5 rounded p-3 d-flex d-md-flex flex-wrap align-items-center">
        <h5 class="me-3 fw-bold">ITEM TYPE:</h5>
        <div class="dropdown">
          <select class="form-select bg-primary text-white" name="itemTypes" onchange="changeTextItemType(this.value)">            
            @foreach ($itemTypes as $item)
            @if (old('item_types_id', $post->item_types_id == $item->id))                
            <option value="{{ $item->name }}" selected>{{ $item->name }}</option>
            @else
            <option value="{{ $item->name }}">{{ $item->name }}</option>
            @endif    
            @endforeach
          </select>
        </div>
      </div>

      <script>
        function changeTextItemType(text) {
          document.querySelector('.dropdown select').value = text;
        }
      </script>
      <!-- Akhir Item Type - Submission Center -->      

      <!-- Language - Submission Center -->
      <div class="container justify-content-center bg-white mt-5 rounded p-3 d-flex d-md-flex flex-wrap align-items-center">
        <h5 class="me-3 fw-bold">LANGUAGE:</h5>
        <div class="dropdown">
          <select class="form-select bg-primary text-white" name="languages">            
            @foreach ($languages as $item)                
            @if (old('languages_id', $post->languages_id == $item->id))
            <option value="{{ $item->name }}" selected>{{ $item->name }}</option>    
            @else                
            <option value="{{ $item->name }}">{{ $item->name }}</option>
            @endif
            @endforeach
          </select>
        </div>
      </div>
      </div>        

      <script>
        function changeTextLanguage(text) {
          document.getElementById('languageDropdown').innerText = text;
        }
      </script>    
      <!-- Akhir Language - Submission Center -->

      <!-- Content Title - Submission Center -->
      <div class="container mt-5 bg-white p-3 rounded">
        <h5 class="fw-bold">Title</h5>                
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}">        
      </div>
      <!-- Akhir Content Title - Submission Center -->      

      <!-- Content Abstract - Submission Center -->
      <div class="container mt-5 bg-white p-3 rounded">        
        <h5 class="fw-bold">Abstract</h5>
        <textarea class="form-control" name="abstract" id="abstract" rows="10">{{ old('abstract', $post->abstract ) }}</textarea>        
      </div>
      <!-- Akhir Content Abstract - Submission Center -->

      <!-- Content Author - Submission Center -->
<div class="container bg-white mt-5 p-3">
  <h5 class="text-center fw-bold">Author's</h5>
  <div class="row" id="authorsContainer">
      <!-- Existing Author inputs -->
      @foreach($post->authors as $index => $author)
      <div class="col-md-3">
          <div class="text-center">
              @if ($index === 0)
              <label for="firstName">First Name</label>
              @endif
              <div class="input-group mb-2">
                  <span class="input-group-text">{{ $index + 1 }}.</span>
                  <input type="text" class="form-control" name="firstName[]" value="{{ old('firstName[]', $author->firstName) }}">
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="text-center">
              @if ($index === 0)
              <label for="lastName">Last Name</label>
              @endif
              <div class="input-group mb-2">                  
                  <input type="text" class="form-control" name="lastName[]" value="{{ old('lastName[]', $author->lastName) }}">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
              @if ($index === 0)
              <label for="email">Email</label>
              @endif
              <div class="input-group mb-2">                  
                  <input type="text" class="form-control" name="email[]" value="{{ old('email[]', $author->email) }}">
              </div>
          </div>
      </div>
      @endforeach
  </div>
  <h5 class="text-center fw-bold">Author's Company</h5>
  <div id="authorsCompanyContainer">
      <!-- Existing Author's Company inputs -->
      @foreach($post->authors as $index => $author)
      <div class="input-group mb-2">
          <span class="input-group-text">{{ $index + 1 }}.</span>
          <input type="text" class="form-control" name="authorCompany[]" placeholder="Enter the author's company" value="{{ old('authorCompany[]', $author->authorCompany) }}">
      </div>
      @endforeach
  </div>
  <div class="text-center mt-3">
    <button type="button" class="btn btn-primary" onclick="addAuthorsInput()">Add</button>
    <button type="button" class="btn btn-primary" onclick="removeAuthorsInput()">Remove</button>
  </div>
</div>

<script>
  let counter = {{ count($post->authors) }}; // Initial counter value

  function addAuthorsInput() {
      counter++;

      // Create new elements for Author
      const authorsContainer = document.getElementById('authorsContainer');

      const col1 = document.createElement('div');
      col1.classList.add('col-md-3', 'text-center', 'mb-10');
      col1.innerHTML = `          
        <div class="input-group mb-2">
          <span class="input-group-text">${counter}.</span>
          <input type="text" class="form-control" name="firstName[]" placeholder="Enter your first name">                  
        </div>`;
      const col2 = document.createElement('div');
      col2.classList.add('col-md-3');
      col2.innerHTML = `
          <div class="text-center">              
              <div class="input-group">
                  <input type="text" class="form-control" name="lastName[]" placeholder="Enter your last name">                  
              </div>
          </div>`;

      const col3 = document.createElement('div');
      col3.classList.add('col-md-6');
      col3.innerHTML = `
          <div class="text-center">              
              <div class="input-group">                  
                  <input type="text" class="form-control" name="email[]" placeholder="Enter your email">                  
              </div>
          </div>`;

      authorsContainer.appendChild(col1);
      authorsContainer.appendChild(col2);
      authorsContainer.appendChild(col3);

      // Create new element for Author's Company
      const companyContainer = document.getElementById('authorsCompanyContainer');
      const newInputGroup = document.createElement('div');
      newInputGroup.classList.add('input-group', 'mb-2');
      newInputGroup.innerHTML = `
          <span class="input-group-text">${counter}.</span>
          <input type="text" class="form-control" name="authorCompany[]" placeholder="Enter the author's company">
      `
      companyContainer.appendChild(newInputGroup);
  }

  function removeAuthorsInput() {
  // Jangan hapus elemen jika counter sudah di 1
  if (counter > 1) {
    // Kurangi counter
    counter--;

    // Dapatkan container elemen authorsContainer
    const authorsContainer = document.getElementById('authorsContainer');

    // Hapus tiga elemen anak terakhir
    for (let i = 0; i < 3; i++) {
      authorsContainer.removeChild(authorsContainer.lastElementChild);
    }

    // Dapatkan container elemen authorsCompanyContainer
    const companyContainer = document.getElementById('authorsCompanyContainer');

    // Hapus elemen anak terakhir
    companyContainer.removeChild(companyContainer.lastElementChild);
  }
}
</script>


      <!-- Publications Detail - Submission Center -->
      <div class="container publication-details bg-white mt-5 p-3">
        <h3 class="text-center fw-bold">Publication Details</h3>
    
        <!-- Refereed - Publication Details -->
        <div class="container content-refereed-publicationdetails d-flex flex-column mt-5">
          <h5 class="fw-bold">REFEREED :</h5>
          <div class="d-block flex-wrap">
            @foreach ($refereeds as $item)
            @if (old('refereeds_id', $post->refereeds_id == $item->id))
            <div class="form-check">
              <label class="form-check-label" for="refereeds1">
                <input class="form-check-input" type="radio" name="refereeds" id="refereeds1" value="{{ $item->name }}" checked>{{ $item->name }}
              </label>
            </div>
            @else 
            <div class="form-check">
              <label class="form-check-label" for="refereeds2">
                <input class="form-check-input" type="radio" name="refereeds" id="refereeds2" value="{{ $item->name }}">{{ $item->name }}
              </label>
            </div>             
            @endif
            @endforeach
          </div>
        </div>            
        <!-- Akhir Refereed - Publication Deta -->

        <!-- Status - Publication Details-->
        <div class="container content-status-publicationdetails mt-5">
          <h5 class="fw-bold">STATUS :</h5>
          <div class="d-block flex-wrap">            
            @foreach ($statuses as $item)
            @if (old('statuses_id', $post->statuses_id == $item->id))
              <div class="form-check">
                <label class="form-check-label" for="status1">
                  <input class="form-check-input" type="radio" name="statuses" value="{{ $item->name }}" checked>
                  {{ $item->name }}
                </label>
              </div>                
            @else
              <div class="form-check">
                <label class="form-check-label" for="status1">
                  <input class="form-check-input" type="radio" name="statuses" value="{{ $item->name }}">
                  {{ $item->name }}
                </label>
              </div>
            @endif
            @endforeach                      
          </div>
        </div>            
        <!-- Akhir Status - Publication Deta -->

        <!-- Journal or Publication Title - publication details -->
        <div class="container content-journalorpublicationtittle-publicationdetails mt-5">
          <h5 class="fw-bold">JOURNAL OR PUBLICATION TITLE :</h5>        
          <input type="text" class="form-control" name="journalOrPublicationTitle" id="journalorpublicationtitle" value="{{ old('journal_or_publication_title', $post->journal_or_publication_title) }}">
        </div>
        <!-- Akhir Journal or Publication Title - publication deta -->

        <div class="d-flex">          
          <!-- ISSN - publication details -->
          <div class="container content-issn-publicationdetails mt-5">
            <h5 class="fw-bold text-center">ISSN :</h5>      
            <input type="text" class="form-control" name="issn" id="issn" value="{{ old('issn', $post->issn) }}">      
          </div>
          <!-- akhir ISSN - publication deta -->
  
          <!-- Publisher - publication details -->
          <div class="container content-publisher-publicationdetails mt-5">
            <h5 class="fw-bold text-center">PUBLISHER :</h5>        
            <input type="text" class="form-control" name="publisher" id="publisher" value="{{ old('publisher', $post->publisher) }}">        
          </div>
          <!-- akhir Publisher - publication deta -->        
    
          <!-- Official URL - publication details -->
          <div class="container content-issn-publicationdetails mt-5">
            <h5 class="fw-bold text-center">OFFICIAL URL :</h5>        
            <input type="text" class="form-control" name="officialUrl" id="official_url" value="{{ old('official_url', $post->official_url) }}">        
          </div>
          <!-- akhir Official URL - publication deta-->
        </div>

        <div class="d-flex">          
          <!-- Volume - publication details -->
          <div class="container content-volume-publicationdetails mt-5">
            <h5 class="fw-bold text-center">VOLUME :</h5>        
            <input type="text" class="form-control" name="volume" id="volume" value="{{ old('volume', $post->volume) }}">        
          </div>
          <!-- akhir Volume - publication deta -->
  
          <!-- Number - publication details -->
          <div class="container content-number-publicationdetails mt-5">
            <h5 class="fw-bold text-center">NUMBER :</h5>    
            <input type="text" class="form-control" name="number" id="number" value="{{ old('number', $post->number) }}">    
          </div>
          <!-- akhir Number - publication deta -->
  
          <!-- Page Range - publication details -->
          <div class="container content-pagerange-publicationdetails mt-5">
            <h5 class="fw-bold text-center">PAGE RANGE :</h5>        
            <div class="d-flex">            
              <input type="text" class="form-control" name="fromPage" id="fromPage" value="{{ old('from_page', $post->from_page) }}">          
              <input type="text" class="form-control" name="toPage" id="toPage" value="{{ old('to_page', $post->to_page) }}">        
            </div>
          </div>
          <!-- akhir Page Range - publication deta -->
        </div>

        <!-- date - publication details -->
        <div class="container content-date-publicationdetails mt-5 ">
          <h5 class="fw-bold text-center">DATE :</h5>    
          <div class="d-flex flex-wrap justify-content-center gap-2">            
            <div class="col-md-3">
              <label for="year" class="form-label">Year :</label>
              <input type="text" class="form-control" name="year" id="year" value="{{ old('year', $post->year) }}">
            </div>
            <div class="col-md-3">
              <label for="year" class="form-label">Month :</label>
              <input type="text" class="form-control" name="month" id="month" value="{{ old('month', $post->month) }}">
            </div>
            <div class="col-md-3">
              <label for="year" class="form-label">Day :</label>
              <input type="text" class="form-control" name="day" id="day" value="{{ old('day', $post->day) }}">
            </div>                            
          </div>
        </div>
        <!-- akhir date - publication deta -->

        <!-- Data Type - Publication Details-->
        <div class="container content-datatype-publicationdetails mt-5">
          <h5 class="fw-bold">DATA TYPE :</h5>
          <div class="d-block flex-wrap">
            @foreach ($dataTypes as $item)              
            @if ( old('data_types_id', $post->data_types_id == $item->id ) )                
            <div class="form-check">
              <label class="form-check-label" for="datatype1">
                <input class="form-check-input" type="radio" name="dataTypes" id="{{ $item->name }}" value="{{ $item->name }}" checked>{{ $item->name }}
              </label>
            </div>
            @else                
            <div class="form-check">
              <label class="form-check-label" for="datatype1">
                <input class="form-check-input" type="radio" name="dataTypes" id="{{ $item->name }}" value="{{ $item->name }}">{{ $item->name }}
              </label>
            </div>
            @endif
            @endforeach
          </div>
        </div>            
        <!-- Akhir Data Type - Publication Details -->

      </div>
      <!-- Akhir Publication Detail - Submission Center-->

      <!-- Contact Email Address - Submission Center -->
      <div class="accordion mt-5" id="accordionContactEmail">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingContactEmail">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContactEmail" aria-expanded="true" aria-controls="collapseContactEmail">Email Depositor</button>
          </h2>
          <div id="collapseContactEmail" class="accordion-collapse collapse" aria-labelledby="headingContactEmail" data-bs-parent="#accordionContactEmail">
            <div class="accordion-body">    
              <input type="text" class="form-control" name="emailDepositor" id="contactemailaddress" value="{{ old('email_depositor', $post->email_depositor) }}">    
            </div>
          </div>
        </div>
      </div>    
      <!-- Akhir Contact Email Address - Submission Cen -->

      <!-- References - Submission Center -->
      <div class="accordion mt-5" id="accordionReferences">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingReference">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferences" aria-expanded="true" aria-controls="collapseReferences">Reference</button>
          </h2>
          <div id="collapseReferences" class="accordion-collapse collapse" aria-labelledby="headingReferences" data-bs-parent="#accordionReferences">
            <div class="accordion-body">                
              <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference', $post->reference) }}">                
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir References - Submission Center -->
      
    </div>
    <!-- Akhir Submission Center -->

    <!-- Footer Button -->
    <div class="footer-button p-4 d-flex justify-content-center gap-3">
      <a href="javascript:void(0);" class="btn btn-warning text-white" onclick="cancelAndRemoveSession();">Cancel</a>

<script>
function cancelAndRemoveSession() {
    // Hapus sesi di sini
    // Gantilah 'nama_sesi' dengan nama sesi yang ingin Anda hapus
    sessionStorage.removeItem('post_data');
    localStorage.removeItem('post_data'); // Jika menggunakan localStorage

    // Kembali ke halaman sebelumnya
    window.history.back();
}
</script>
      <a class="btn btn-warning text-white" onclick="document.getElementById('updateItemSubmissionCenter').submit();">Next</a>
    </div>
    <!-- Akhir Footer Button -->

  </form>
  <!-- Akhir Form -->

</section>