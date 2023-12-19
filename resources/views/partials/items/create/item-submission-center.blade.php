<section class="container edit-item mt-4 bg-white rounded">
  <form action="/dashboard/manage-deposit/item-submission-center" method="post" id="storeItemSubmissionCenter"" enctype="multipart/form-data">
    @csrf
    <!-- Header Button -->
    <h1 class="container header-tittle pt-4 fw-bold">Create Item</h1>
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
              <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                <option value="{{ $item->name }}">{{ $item->name }}</option>
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
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter your title">        
      </div>
      <!-- Akhir Content Title - Submission Center -->

      <!-- Content Link - Submission Center -->
      <div class="container mt-5 bg-white p-3 rounded">
        <h5 class="fw-bold">Link</h5>                
        <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter your link for this page">
      </div>
      <!-- Akhir Content Title - Submission Center -->

      <!-- Content Abstract - Submission Center -->
      <div class="container mt-5 bg-white p-3 rounded">        
        <h5 class="fw-bold">Abstract</h5>
        <textarea class="form-control" name="abstract" id="abstract" rows="10"></textarea>        
      </div>
      <!-- Akhir Content Abstract - Submission Center -->

      <!-- Content Author - Submission Center -->
<div class="container bg-white mt-5 p-3">
  <h5 class="text-center fw-bold">Author's</h5>
  <div class="row" id="authorsContainer">
      <!-- Existing Author inputs -->      
      <div class="col-md-3">
          <div class="text-center">
              <label for="firstName">First Name</label>
              <div class="input-group mb-2">
                  <span class="input-group-text">1</span>
                  <input type="text" class="form-control" name="firstName[]" placeholder="Enter your first name">
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="text-center">
              <label for="lastName">Last Name</label>
              <div class="input-group mb-2">                  
                  <input type="text" class="form-control" name="lastName[]" placeholder="Enter your last name">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
              <label for="email">Email</label>
              <div class="input-group mb-2">                  
                  <input type="text" class="form-control" name="email[]" placeholder="Enter your email">
              </div>
          </div>
      </div>      
  </div>
  <h5 class="text-center fw-bold">Author's Company</h5>
  <div id="authorsCompanyContainer">
      <!-- Existing Author's Company inputs -->
      
      <div class="input-group mb-2">
          <span class="input-group-text">1</span>          
          <input type="text" class="form-control" name="authorCompany[]" placeholder=" Enter the author's company ">
      </div>
      
  </div>
  <div class="text-center mt-3">
    <button type="button" class="btn btn-primary" onclick="addAuthorsInput()">More Input</button>
  </div>
</div>

<script>
  let counter = 1; // Initial counter value

  function addAuthorsInput() {
      counter++;

      // Create new elements for Author
      const authorsContainer = document.getElementById('authorsContainer');

      const col1 = document.createElement('div');
      col1.classList.add('col-md-3');
      col1.innerHTML = `
          <div class="text-center mb-4">              
              <div class="input-group mb-2">
                  <span class="input-group-text">${counter}.</span>
                  <input type="text" class="form-control" name="firstName[]" placeholder="Enter your first name">
              </div>
          </div>`;

      const col2 = document.createElement('div');
      col2.classList.add('col-md-3');
      col2.innerHTML = `
          <div class="text-center mb-4">              
              <div class="input-group mb-2">                  
                  <input type="text" class="form-control" name="lastName[]" placeholder="Enter your last name">
              </div>
          </div>`;

      const col3 = document.createElement('div');
      col3.classList.add('col-md-6');
      col3.innerHTML = `
          <div class="text-center">              
              <div class="input-group mb-2">                  
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
          <input type="text" class="form-control" name="authorCompany[]" placeholder="Enter the author's company">`;

      companyContainer.appendChild(newInputGroup);
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
              <div class="form-check">
                <label class="form-check-label" for="refereed1">
                  <input class="form-check-input" type="radio" name="refereeds" value="{{ $item->name }}" checked>
                  {{ $item->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>            
        <!-- Akhir Refereed - Publication Deta -->

        <!-- Status - Publication Details-->
        <div class="container content-status-publicationdetails mt-5">
          <h5 class="fw-bold">STATUS :</h5>
          <div class="d-block flex-wrap">            
            @foreach ($statuses as $item)                  
              <div class="form-check">
                <label class="form-check-label" for="status1">
                  <input class="form-check-input" type="radio" name="statuses" value="{{ $item->name }}" checked>
                  {{ $item->name }}
                </label>
              </div>
            @endforeach                      
          </div>
        </div>            
        <!-- Akhir Status - Publication Deta -->

        <!-- Journal or Publication Title - publication details -->
        <div class="container content-journalorpublicationtittle-publicationdetails mt-5">
          <h5 class="fw-bold">JOURNAL OR PUBLICATION TITLE :</h5>        
          <input type="text" class="form-control" name="journalOrPublicationTitle" id="journalorpublicationtitle" placeholder="Enter your journal or publication tittle">        
        </div>
        <!-- Akhir Journal or Publication Title - publication deta -->
        
        <div class="d-flex">          
          <!-- ISSN - publication details -->
          <div class="container content-issn-publicationdetails mt-5">
            <h5 class="fw-bold">ISSN :</h5>      
            <input type="text" class="form-control" name="issn" id="issn" placeholder="Enter your issn journal">      
          </div>
          <!-- akhir ISSN - publication deta -->
  
          <!-- Publisher - publication details -->
          <div class="container content-publisher-publicationdetails mt-5">
            <h5 class="fw-bold">PUBLISHER :</h5>        
            <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Enter your publisher journal">        
          </div>
          <!-- akhir Publisher - publication deta -->        
    
          <!-- Official URL - publication details -->
          <div class="container content-issn-publicationdetails mt-5">
            <h5 class="fw-bold">OFFICIAL URL :</h5>        
            <input type="text" class="form-control" name="officialUrl" id="official_url" placeholder="Enter your official url journal">        
          </div>
          <!-- akhir Official URL - publication deta-->
        </div>

          <!-- Volume - publication details -->
          <div class="container content-volume-publicationdetails mt-5">
            <h5 class="fw-bold">VOLUME :</h5>        
            <input type="text" class="form-control" name="volume" id="volume" placeholder="Enter your volume journal">        
          </div>
          <!-- akhir Volume - publication deta -->
  
          <!-- Number - publication details -->
          <div class="container content-number-publicationdetails mt-5">
            <h5 class="fw-bold">NUMBER :</h5>    
            <input type="text" class="form-control" name="number" id="number" placeholder="Enter your number journal">    
          </div>
          <!-- akhir Number - publication deta -->

        <!-- Page Range - publication details -->
        <div class="container content-pagerange-publicationdetails mt-5">
          <h5 class="fw-bold">PAGE RANGE :</h5>        
          <input type="text" class="form-control" name="fromPage" id="fromPage" placeholder="from page">
          <h3>-</h3>
          <input type="text" class="form-control" name="toPage" id="toPage" placeholder="to page">        
        </div>
        <!-- akhir Page Range - publication deta -->

        <!-- date - publication details -->
        <div class="container content-date-publicationdetails mt-5">
          <h5 class="fw-bold">DATE :</h5>    
          <div class="col-md-3">
            <label for="year" class="form-label">Year :</label>
            <input type="text" class="form-control" name="year" id="year" placeholder="Input Year">
          </div>
          <div class="col-md-3">
            <label for="year" class="form-label">Month :</label>
            <input type="text" class="form-control" name="month" id="month" placeholder="Input month">
          </div>
          <div class="col-md-3">
            <label for="year" class="form-label">Day :</label>
            <input type="text" class="form-control" name="day" id="day" placeholder="Input day">
          </div>                            
        </div>
        <!-- akhir date - publication deta -->

        <!-- Data Type - Publication Details-->
        <div class="container content-datatype-publicationdetails mt-5">
          <h5 class="fw-bold">DATA TYPE :</h5>
          <div class="d-block flex-wrap">
            @foreach ($dataTypes as $item)              
              <div class="form-check">
                <label class="form-check-label" for="datatype1">
                  <input class="form-check-input" type="radio" name="dataTypes" id="{{ $item->name }}" value="{{ $item->name }}" checked>
                  {{ $item->name }}
                </label>
              </div>
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
              <input type="text" class="form-control" name="emailDepositor" id="contactemailaddress" placeholder="Enter your email depositor">    
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
              <input type="text" class="form-control" name="reference" id="reference" placeholder="Enter your references">                
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir References - Submission Center -->
      
    </div>
    <!-- Akhir Submission Center -->

    <!-- Footer Button -->
    <div class="footer-button p-4 d-flex justify-content-center gap-3">
      <a href="/save-and-return-page" class="btn btn-warning text-white">Save and Return</a>      
      <a class="btn btn-warning text-white" onclick="document.getElementById('storeItemSubmissionCenter').submit();">Next</a>
    </div>
    <!-- Akhir Footer Button -->

  </form>
  <!-- Akhir Form -->

</section>