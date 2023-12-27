        <section class="container edit-item mt-4 bg-white rounded">
          <form action="{{ route('update-item-deposits-dashboard', ['deposit' => $post->slug ]) }}" method="post" id="updateItemDeposits" enctype="multipart/form-data">
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

    <!-- Upload Item - Submission Center -->
    <div class="container mt-5 bg-white rounded upload-item p-3">
      <h5 class="text-center fw-bold text-header-content">ADD A NEW DOCUMENT</h5>
      <p class="text-main-content">To upload a document to this repository, click the Browse button below to select a file and the Upload button to upload it to the archive. You can then add additional files to the document or upload more files to create additional documents. Select the files you want to upload, attach the files by clicking the upload button below, and upload your files to continue the process.</p>
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
            <input type="file" class="form-control" name="fileUpload" id="localFile">              
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
    <!-- Akhir Upload Item - Submission Center -->
    
    {{-- upload image cover --}}
    <div class="container mt-5 bg-white rounded upload-item p-3">
      <h5 class="text-center fw-bold text-header-content">ADD A COVER JOURNAL (OPTIONAL)</h5>
      <p class="text-main-content">To upload an image to this repository, click the 'Browse' button below to select an image file, then click 'Upload' to add it to the archive. You can include additional images within the document or upload more images to create additional documents. Choose the images you wish to upload, attach them by clicking the upload button below, and proceed with the upload to continue the process.</p>
      <ul class="nav nav-tabs justify-content-center mt-4">
        <li class="nav-item">
          <a class="nav-link active" id="localTab" data-bs-toggle="tab" href="#uploadLocal">Upload File from Local</a>
        </li>        
      </ul>
      <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="uploadLocal">            
          <div class="mb-3">
            <label for="localFile" class="form-label">Choose File</label>
            <input type="file" class="form-control" name="image" id="localFile">
          </div>                    
        </div>        
      </div>
    </div>
    <!-- sakhir upload image cov -->
    
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
              
                <a href="#" class="btn btn-dark text-white" onclick="document.getElementById('updateItemDeposits').submit();">DEPOSITS ITEM NOW</a>
              </form>
                <a href="#" class="btn btn-dark text-white">SAVE FOR LATER</a>
            </div> 

        </div>    
    <!-- akhir Main Content Deposits -->
        </div>
    <!-- Akhir Deposits -->

    <!-- Footer Button -->
        <div class="footer-button p-4 d-flex justify-content-center gap-3">
          <a href="#" class="btn btn-warning text-white" onclick="window.history.back();">Previous</a>            
        </div> 
        <!-- akhir Footer Button -->           
    </section>