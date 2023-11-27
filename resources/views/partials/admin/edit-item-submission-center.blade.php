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
    <!-- Akhir Header Button -->
    
    <!-- Submission Center -->
        <div class="container bg-main-content-submissioncenter mt-3 p-5">
        
    <!-- Item Type - Submission Center -->
        <div class="container justify-content-center bg-white rounded p-3 d-flex">
            <h5 class="me-3 fw-bold">ITEM TYPE:</h3>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose Item Type
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextItemType('Article')">Article</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextItemType('Book Section')">Book Section</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextItemType('Book')">Book</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextItemType('Thesis')">Thesis</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextItemType('Conference of Workshop Item')">Conference of Workshop Item</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextItemType('Other')">Other</a></li>
                </ul>
            </div>
        </div>
        
        <script>
            function changeTextItemType(text) {
                document.querySelector('.btn.btn-primary.dropdown-toggle').innerText = text;
            }
        </script>
    <!-- Akhir Item Type - Submission Center -->

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
                <form>
                    <div class="mb-3">
                        <label for="localFile" class="form-label">Choose File</label>
                        <input type="file" class="form-control" id="localFile" accept=".pdf, .doc, .docx">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="uploadLink">
                <form>
                    <div class="mb-3">
                        <label for="fileLink" class="form-label">File Link</label>
                        <input type="url" class="form-control" id="fileLink" placeholder="Enter file link">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    <!-- Akhir Upload Item - Submission Center -->

    <!-- Language - Submission Center -->
        <div class="container justify-content-center bg-white mt-5 rounded p-3 d-flex">
            <h5 class="me-3 fw-bold">LANGUAGE:</h5>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose language
                </button>
                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextLanguage('English')">English</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="changeTextLanguage('Indonesia')">Indonesia</a></li>
                </ul>
            </div>
        </div>
        
        <script>
            function changeTextLanguage(text) {
                document.getElementById('languageDropdown').innerText = text;
            }
        </script>    
    <!-- Akhir Language - Submission Center -->

    <!-- Content Tittle - Submission Center -->
        <div class="container mt-5 bg-white p-3 rounded">
            <h5 class="fw-bold">Title</h5>
            <form>
                <div class="">
                    <input type="text" class="form-control" id="titleInput" placeholder="Enter your title">
                </div>
            </form>
        </div>
    <!-- Akhir Content Tittle - Submission Center -->

    <!-- Content Abstract - Submission Center -->
        <div class="container mt-5 bg-white p-3 rounded">
            <h5 class="fw-bold">Abstract</h5>
            <form>
                <input type="text" class="form-control" id="abstractInput" placeholder="Enter your abstract">
            </form>
        </div>
    <!-- Akhir Content Abstract - Submission Center -->

    <!-- Content Author - Submission Center -->
        <div class="container bg-white mt-5 p-3">
            <h5 class="text-center fw-bold">Author's</h5>
            <div class="row">
                <div class="col-md-3">
                    <div class="text-center">
                        <label for="givenName1">Given Name</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text">1.</span>
                        <input type="text" class="form-control" id="givenName1" placeholder="Enter your given name">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">2.</span>
                        <input type="text" class="form-control" id="givenName2" placeholder="Enter your given name">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">3.</span>
                        <input type="text" class="form-control" id="givenName3" placeholder="Enter your given name">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">4.</span>
                        <input type="text" class="form-control" id="givenName4" placeholder="Enter your given name">
                    </div>
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="text-center">
                        <label for="familyName1">Family Name</label>
                        <input type="text" class="form-control mb-2" id="familyName1" placeholder="Enter your family name">
                        <input type="text" class="form-control mb-2" id="familyName2" placeholder="Enter your family name">
                        <input type="text" class="form-control mb-2" id="familyName3" placeholder="Enter your family name">
                        <input type="text" class="form-control mb-2" id="familyName4" placeholder="Enter your family name">
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="text-center">
                        <label for="email1">Email</label>
                        <input type="text" class="form-control mb-2" id="email1" placeholder="Enter your email">
                        <input type="text" class="form-control mb-2" id="email2" placeholder="Enter your email">
                        <input type="text" class="form-control mb-2" id="email3" placeholder="Enter your email">
                        <input type="text" class="form-control mb-2" id="email4" placeholder="Enter your email">
                    </div>
                </div>
            </div>
    
            <div class="text-center mt-3">
                <button type="button" class="btn btn-primary" onclick="authors()">More Input</button>
            </div>
        </div>
        
        <script>
            let counter = 4; // Initial counter value
        
            function authors() {
                counter++;
        
                // Create new elements
                const givenNameClone = createInputElement(`givenName${counter}`, 'Enter your given name');
                const familyNameClone = createInputElement(`familyName${counter}`, 'Enter your family name', false);
                const emailClone = createInputElement(`email${counter}`, 'Enter your email', false);
        
                // Append the new elements to their respective sections
                const container = document.querySelector('.row');
        
                const col1 = document.createElement('div');
                col1.classList.add('col-md-3');
                col1.appendChild(givenNameClone);
        
                const col2 = document.createElement('div');
                col2.classList.add('col-md-3');
                col2.appendChild(familyNameClone);
        
                const col3 = document.createElement('div');
                col3.classList.add('col-md-6');
                col3.appendChild(emailClone);
        
                container.appendChild(col1);
                container.appendChild(col2);
                container.appendChild(col3);
            }
        
            function createInputElement(id, placeholder, includeInputGroupText = true) {
                const container = document.createElement('div');
                container.classList.add('text-center', 'mb-2');
        
                const inputGroup = document.createElement('div');
                inputGroup.classList.add('input-group');
        
                if (includeInputGroupText) {
                    const inputGroupText = document.createElement('span');
                    inputGroupText.classList.add('input-group-text');
                    inputGroupText.textContent = `${counter}.`;
                    inputGroup.appendChild(inputGroupText);
                }
        
                const input = document.createElement('input');
                input.type = 'text';
                input.classList.add('form-control');
                input.id = id;
                input.placeholder = placeholder;
        
                // Construct the elements
                inputGroup.appendChild(input);
                container.appendChild(inputGroup);
        
                return container;
            }           
        </script>
    <!-- Akhir Content Author - Submission Center -->

    <!-- Author's Company - Submission Center -->
        <div class="container bg-white mt-5 p-3">
            <h5 class="text-center fw-bold">Author's Company</h5>
            <div id="authorsCompanyContainer">
                <div class="input-group mb-2">
                    <span class="input-group-text">1.</span>
                    <input type="text" class="form-control" id="authorsCompany1" placeholder="Enter the author's company">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">2.</span>
                    <input type="text" class="form-control" id="authorsCompany2" placeholder="Enter the author's company">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">3.</span>
                    <input type="text" class="form-control" id="authorsCompany3" placeholder="Enter the author's company">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">4.</span>
                    <input type="text" class="form-control" id="authorsCompany4" placeholder="Enter the author's company">
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="button" class="btn btn-primary" id="moreInputButton">More Input</button>
            </div>
        </div>
        
        <script>
            let counterr = 4; // Initial counter value
        
            document.getElementById('moreInputButton').addEventListener('click', function() {
                counterr++;
        
                const container = document.getElementById('authorsCompanyContainer');
                const newInputGroup = document.createElement('div');
                newInputGroup.classList.add('input-group', 'mb-2');
                newInputGroup.innerHTML = `
                    <span class="input-group-text">${counterr}.</span>
                    <input type="text" class="form-control" id="authorsCompany${counterr}" placeholder="Enter the author's company">`;
                container.appendChild(newInputGroup);
            });
        </script>
    <!-- Akhir Author's Company - Submission Center -->

    <!-- Publications Detail - Submission Center -->
        <div class="container publication-details bg-white mt-5 p-3">
            <h3 class="text-center fw-bold">Publication Details</h3>
                
            <!-- Refereed - Publication Details -->
            <div class="container content-refereed-publicationdetails d-flex gap-3 mt-5">
                <h5 class="fw-bold">REFEREED :</h5>
                <div class="d-block">
                    <div class="form-check">
                        <label class="form-check-label" for="refereed1">
                        <input class="form-check-input" type="radio" name="refereed" id="refereed1" value="option1" checked>
                            Yes, this version has been refereed.
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="refereed2">
                        <input class="form-check-input" type="radio" name="refereed" id="refereed2" value="option2">
                            No, this version has not been refereed.
                        </label>
                    </div>
                </div>
            </div>    
            <!-- Akhir Refereed - Publication Details -->

            <!-- Status - Publication Details-->
                <div class="container content-status-publicationdetails d-flex gap-5 mt-5">
                    <h5 class="fw-bold">STATUS :</h5>
                    <div class="d-block">
                <div class="form-check">
                    <label class="form-check-label" for="status1">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="option1" checked>
                        Published
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="status2">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="option2">
                        In Press
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="status3">
                    <input class="form-check-input" type="radio" name="status" id="status3" value="option2">
                        Submitted
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="status4">
                    <input class="form-check-input" type="radio" name="status" id="status4" value="option2">
                        Unpublished
                    </label>
                </div>
                </div>
                </div>
            <!-- Akhir Status - Publication Details -->

            <!-- Journal or Publication Tittle - publication details -->
                <div class="container content-journalorpublicationtittle-publicationdetails mt-5">
                    <h5 class="fw-bold">JOURNAL OR PUBLICATION TITTLE :</h5>
                    <form>
                        <input type="text" class="form-control" id="journalorpublicationtittle" placeholder="Enter your journal or publication tittle">
                    </form>
                </div>
            <!-- Akhir Journal or Publication Tittle - publication details -->

            <!-- ISSN - publication details -->
            <div class="container content-issn-publicationdetails mt-5">
                <h5 class="fw-bold">ISSN :</h5>
                <form>
                    <input type="text" class="form-control" id="issnpublicationdetails" placeholder="Enter your issn journal">
                </form>
            </div>
            <!-- akhir ISSN - publication details -->

            <!-- Publisher - publication details -->
                <div class="container content-publisher-publicationdetails mt-5">
                    <h5 class="fw-bold">PUBLISHER :</h5>
                    <form>
                        <input type="text" class="form-control" id="publisherpublicationdetails" placeholder="Enter your publisher journal">
                    </form>
                </div>
            <!-- akhir Publisher - publication details -->

            {{-- upload image cover --}}
            <div class="container mt-5 bg-white rounded upload-item p-3">
                <h5 class="text-center fw-bold text-header-content">ADD A COVER JOURNAL (OPSIONAL)</h5>
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
                    <form>
                        <div class="mb-3">
                            <label for="localFile" class="form-label">Choose File</label>
                            <input type="file" class="form-control" id="localFile" accept=".png, .jpeg">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="uploadLink">
                    <form>
                        <div class="mb-3">
                            <label for="fileLink" class="form-label">File Link</label>
                            <input type="url" class="form-control" id="fileLink" placeholder="Enter file link">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            {{-- akhir upload image cover --}}

            <!-- Official URL - publication details -->
                <div class="container content-issn-publicationdetails mt-5">
                    <h5 class="fw-bold">OFFICIAL URL :</h5>
                    <form>
                        <input type="text" class="form-control" id="issnpublicationdetails" placeholder="Enter your official url journal">
                    </form>
                </div>
            <!-- akhir Official URL - publication details -->

            <!-- Volume - publication details -->
                <div class="container content-volume-publicationdetails mt-5">
                    <h5 class="fw-bold">VOLUME :</h5>
                    <form>
                        <input type="text" class="form-control" id="volumepublicationdetails" placeholder="Enter your volume journal">
                    </form>
                </div>
            <!-- akhir Volume - publication details -->

            <!-- Number - publication details -->
                <div class="container content-number-publicationdetails mt-5">
                    <h5 class="fw-bold">NUMBER :</h5>
                    <form>
                        <input type="text" class="form-control" id="numberpublicationdetails" placeholder="Enter your number journal">
                    </form>
                </div>
            <!-- akhir Number - publication details -->

            <!-- Page Range - publication details -->
                <div class="container content-pagerange-publicationdetails mt-5">
                    <h5 class="fw-bold">PAGE RANGE :</h5>
                    <form class="d-flex gap-3">
                        <input type="text" class="form-control" id="pagerangepublicationdetails1" placeholder="from page">
                        <h3>-</h3>
                        <input type="text" class="form-control" id="pagerangepublicationdetails2" placeholder="to page">
                    </form>
                </div>
            <!-- akhir Page Range - publication details -->

            <!-- date - publication details -->
                <div class="container content-date-publicationdetails mt-5">
                    <h5 class="fw-bold">DATE :</h5>
                    <form class="d-flex gap-2">
                        <h5>Year:</h5>
                        <input type="text" class="form-control" id="datepublicationdetails1" placeholder="Select Year">
                        <h5>Month:</h5>
                        <select class="form-select" id="datepublicationdetails2">
                            <option value="">Select Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <h5>Date:</h5>
                        <select class="form-select" id="datepublicationdetails3">
                            <option value="">Select Date</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>                    
                    </form>
                </div>
            <!-- akhir date - publication details -->

            <!-- Data Type - Publication Details-->
                <div class="container content-datatype-publicationdetails d-flex gap-5 mt-5">
                    <h5 class="fw-bold">DATA TYPE :</h5>
                    <div class="d-block">
                <div class="form-check">
                    <label class="form-check-label" for="datatype1">
                    <input class="form-check-input" type="radio" name="datatype" id="datatype1" value="option1" checked>
                        UNSPECIFIED
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="datatype2">
                    <input class="form-check-input" type="radio" name="datatype" id="datatype2" value="option2">
                        Publication
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="datatype3">
                    <input class="form-check-input" type="radio" name="datatype" id="datatype3" value="option2">
                        Submission
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="datatype4">
                    <input class="form-check-input" type="radio" name="datatype" id="datatype4" value="option2">
                        Completion
                    </label>
                </div>
                </div>
                </div>
            <!-- Akhir Data Type - Publication Details -->
        </div>
    <!-- Akhir Publication Detail - Submission Center -->

    <!-- Contact Email Address - Submission Center -->
        <div class="accordion mt-5" id="accordionContactEmail">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingContactEmail">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContactEmail" aria-expanded="true" aria-controls="collapseContactEmail">
                        Contact Email Address
                    </button>
                </h2>
                <div id="collapseContactEmail" class="accordion-collapse collapse" aria-labelledby="headingContactEmail" data-bs-parent="#accordionContactEmail">
                    <div class="accordion-body">
                        <form>
                            <input type="text" class="form-control" id="contactemailaddress" placeholder="Enter your contact email address">
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    <!-- Akhir Contact Email Address - Submission Center -->

    <!-- References - Submission Center -->
        <div class="accordion mt-5" id="accordionReferences">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingReferences">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferences" aria-expanded="true" aria-controls="collapseReferences">
                        References
                    </button>
                </h2>
                <div id="collapseReferences" class="accordion-collapse collapse" aria-labelledby="headingReferences" data-bs-parent="#accordionReferences">
                    <div class="accordion-body">
                        <form>
                            <input type="text" class="form-control" id="references" placeholder="Enter your references">
                        </form>
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
            <a href="/edit-item-keywords" class="btn btn-warning text-white">Next</a>
        </div>
    <!-- Akhir Footer Button -->
    </section>


@endsection