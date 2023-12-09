<section class="container edit-item mt-4 bg-white rounded">
  <form action="/dashboard/manage-deposit/item-submission-center" method="post" id="storeItemSubmissionCenter"" enctype="multipart/form-data">
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

      //

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
        <input type="text" class="form-control" name="abstract" id="abstract" placeholder="Enter your abstract">          
      </div>
      <!-- Akhir Content Abstract - Submission Center -->

      <!-- Content Author - Submission Center -->
      <div class="container bg-white mt-5 p-3">
        <h5 class="text-center fw-bold">Author's</h5>
        <div class="row">
          <div class="col-md-3">
            <div class="text-center mb-4">
              <label for="firstnName">First Name</label>
              <div class="input-group mb-2">
                <span class="input-group-text">1.</span>
                <input type="text" class="form-control" name="firstName[]" id="firstnName" placeholder="Enter your first name">
              </div>            
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center mb-4">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control mb-2" name="lastName[]" id="lastName" placeholder="Enter your last name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="text-center">
              <label for="email">Email</label>
              <input type="text" class="form-control mb-2" name="email[]" id="email" placeholder="Enter your email">
            </div>
          </div>
        </div>
        <div class="text-center mt-3">
          <button type="button" class="btn btn-primary" onclick="authors()">More Input</button>
        </div>
      </div>

      <script>
        let counter = 1; // Initial counter value

        function authors() {
          counter++;

          // Create new elements
          const firstNameClone = createInputElement(`firstName${counter}`, 'Enter your first name', 'firstName[]');
          const lastNameClone = createInputElement(`lastName${counter}`, 'Enter your last name', 'lastName[]');
          const emailClone = createInputElement(`email${counter}`, 'Enter your email', 'email[]');

    // Append the new elements to their respective sections
    const container = document.querySelector('.row');

    const col1 = document.createElement('div');
    col1.classList.add('col-md-3');
    col1.appendChild(firstNameClone);

    const col2 = document.createElement('div');
    col2.classList.add('col-md-3');
    col2.appendChild(lastNameClone);

    const col3 = document.createElement('div');
    col3.classList.add('col-md-6');
    col3.appendChild(emailClone);

    container.appendChild(col1);
    container.appendChild(col2);
    container.appendChild(col3);
  }

  function createInputElement(id, placeholder, name) {
    const container = document.createElement('div');
    container.classList.add('text-center', 'mb-4');

    const inputGroup = document.createElement('div');
    inputGroup.classList.add('input-group');

    const inputGroupText = document.createElement('span');
    inputGroupText.classList.add('input-group-text');
    inputGroupText.textContent = `${counter}.`;
    inputGroup.appendChild(inputGroupText);

    const input = document.createElement('input');
    input.type = 'text';
    input.classList.add('form-control');
    input.id = id;
    input.name = name;
    input.placeholder = placeholder;

    // Construct the elements
    inputGroup.appendChild(input);
    container.appendChild(inputGroup);

    return container;
  }           
</script>


      <!-- Author's Company - Submission Center -->
      <div class="container bg-white mt-5 p-3">
        <h5 class="text-center fw-bold">Author's Company</h5>
        <div id="authorsCompanyContainer">
          <div class="input-group mb-2">
            <span class="input-group-text">1.</span>
            <input type="text" class="form-control" name="authorCompany[]" id="authorCompany" placeholder="Enter the author's company">
          </div>
        </div>
        <div class="text-center mt-3">
          <button type="button" class="btn btn-primary" id="moreInputButton">More Input</button>
        </div>
      </div>

      <script>
      let counterr = 1; // Initial counter value

      document.getElementById('moreInputButton').addEventListener('click', function() {
        counterr++;

        const container = document.getElementById('authorsCompanyContainer');
        const newInputGroup = document.createElement('div');
        newInputGroup.classList.add('input-group', 'mb-2');
        newInputGroup.innerHTML = `
            <span class="input-group-text">${counterr}.</span>
            <input type="text" class="form-control" name="authorCompany[]" id="authorsCompany${counterr}" placeholder="Enter the author's company">`;
        container.appendChild(newInputGroup);
      });
      </script>
      <!-- Akhir Author's Company - Submission Center -->

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
                  <input class="form-check-input" type="radio" name="refereeds" checked>
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
                  <input class="form-check-input" type="radio" name="statuses" value="option1" checked>
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

        {{-- upload image cover --}}
        <div class="container mt-5 bg-white rounded upload-item p-3">
          <h5 class="text-center fw-bold text-header-content">ADD A COVER JOURNAL (OPTIONAL)</h5>
          <p class="text-main-content">To upload an image to this repository, click the 'Browse' button below to select an image file, then click 'Upload' to add it to the archive. You can include additional images within the document or upload more images to create additional documents. Choose the images you wish to upload, attach them by clicking the upload button below, and proceed with the upload to continue the process.</p>
          <ul class="nav nav-tabs justify-content-center mt-4">
            <li class="nav-item">
              <a class="nav-link active" id="localTab" data-bs-toggle="tab" href="#uploadLocal">Upload File from Local</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="linkTab" data-bs-toggle="tab" href="#uploadLink">Upload File from Link</a>
            </li>
          </ul>
          <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="uploadLocal">            
              <div class="mb-3">
                <label for="localFile" class="form-label">Choose File</label>
                <input type="file" class="form-control" id="localFile" accept=".png, .jpeg">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Upload</button>
              </div>            
            </div>
            <div class="tab-pane fade" id="uploadLink">            
              <div class="mb-3">
                <label for="fileLink" class="form-label">File Link</label>
                <input type="url" class="form-control" id="fileLink" placeholder="Enter file link">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Upload</button>
              </div>            
            </div>
          </div>
        </div>
        <!-- sakhir upload image cov -->
  
        <!-- Official URL - publication details -->
        <div class="container content-issn-publicationdetails mt-5">
          <h5 class="fw-bold">OFFICIAL URL :</h5>        
          <input type="text" class="form-control" name="officialUrl" id="official_url" placeholder="Enter your official url journal">        
        </div>
        <!-- akhir Official URL - publication deta-->

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