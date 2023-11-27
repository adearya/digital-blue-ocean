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
    <!-- akhir Header Button -->

    <!-- Keywords -->
        <div class="container bg-main-content-edit-item-keywords mt-3 p-2">

    <!-- filter keywords -->
        <div class="container mt-3 p-5">
            <div class="container filter-keywords text-center d-flex flex-column align-items-center">
                <!-- Content akan ditambahkan di sini -->
            </div>
        </div>    
    <!-- akhir filter keywords -->

    <!-- search for keywords -->
        <div class="container d-flex justify-content-center align-items-center flex-column">
            <h5 class="fw-bold text-center">Search for keywords:</h5>
            <form class="d-flex gap-2 w-50">
                <input type="text" class="form-control" id="searchforkeywords" placeholder="Enter your keywords">
                <button class="btn btn-primary">Search</button>
            </form>
        </div>    
    <!-- search for keywords -->

    <!-- main content keywords -->
        <div class="container mt-3">
            <div class="container">
                <button class="btn collapsed" data-bs-toggle="collapse" href="#generalList" aria-expanded="false" aria-controls="generalList"> + General</button>
                <div class="collapse" id="generalList">
                    <div class="d-flex flex-column p-2">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Education</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Business</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Economy</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Innovation</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Implementation</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Learning</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Management</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Health</p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <button class="btn collapsed" data-bs-toggle="collapse" href="#technologiesList" aria-expanded="false" aria-controls="technologiesList"> + Technologies</button>
                <div class="collapse" id="technologiesList">
                    <div class="d-flex flex-column p-2">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Artificial Intelligence</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Machine Learning</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Deep Learning</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Gamification</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Information Technologies</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Virtual Reality</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Augmented Reality</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-outline-primary add-keyword" onclick="addKeyword(this)">ADD</button>
                            <p class="ms-2 mb-0">Blockchain</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function addKeyword(button) {
                const filterKeywordsContainer = document.querySelector('.filter-keywords');
                const text = button.nextElementSibling.textContent;

                const keywordContainer = document.createElement('div');
                keywordContainer.classList.add('d-flex', 'align-items-center', 'mb-2');

                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-outline-primary', 'remove-keyword', 'me-2');
                removeButton.textContent = 'Remove';
                removeButton.onclick = function () {
                    filterKeywordsContainer.removeChild(keywordContainer);
                    button.style.display = 'block'; // Setelah menghapus, kembalikan tombol Add menjadi tampil
                };

                const paragraph = document.createElement('p');
                paragraph.textContent = text;

                keywordContainer.appendChild(removeButton);
                keywordContainer.appendChild(paragraph);

                filterKeywordsContainer.appendChild(keywordContainer);
                button.style.display = 'none'; // Sembunyikan tombol Add ketika sudah di-klik
            }
        </script>
    <!-- akhir main content keywords -->

    <!-- Form untuk menambahkan keyword baru -->
        <div class="container mt-3">
            <h5 class="fw-bold text-center">Add New Keyword:</h5>
            <form class="d-flex justify-content-center align-items-center flex-column mt-3">
                <div class="mb-3">
                    <label for="newKeyword" class="form-label">New Keyword:</label>
                    <input type="text" class="form-control" id="newKeyword" placeholder="Enter new keyword">
                </div>
                <div class="mb-3">
                    <label for="selectCategory" class="form-label">Select Category:</label>
                    <select class="form-select" id="selectCategory">
                        <option value="general">General</option>
                        <option value="technologies">Technologies</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary" onclick="addNewKeyword()">Add Keyword</button>
            </form>
        </div>

        <script>
            function addNewKeyword() {
                const newKeywordInput = document.getElementById('newKeyword').value;
                const category = document.getElementById('selectCategory').value;

                // Menambahkan keyword baru ke dalam daftar sesuai kategori yang dipilih
                if (newKeywordInput.trim() !== '') {
                    const targetList = category === 'general' ? document.getElementById('generalList') : document.getElementById('technologiesList');

                    const keywordItem = document.createElement('div');
                    keywordItem.classList.add('d-flex', 'align-items-center', 'mt-2');

                    const addButton = document.createElement('button');
                    addButton.classList.add('btn', 'btn-outline-primary', 'add-keyword');
                    addButton.textContent = 'ADD';
                    addButton.setAttribute('onclick', 'addKeyword(this)');

                    const newKeywordText = document.createElement('p');
                    newKeywordText.classList.add('ms-2', 'mb-0');
                    newKeywordText.textContent = newKeywordInput;

                    keywordItem.appendChild(addButton);
                    keywordItem.appendChild(newKeywordText);

                    // Menambahkan keyword baru ke dalam daftar yang dipilih
                    targetList.querySelector('.p-2').appendChild(keywordItem); // Menggunakan querySelector untuk menemukan konten div p-2 di dalam targetList
                } else {
                    alert('Please enter a keyword.');
                }
            }
        </script>

        </div>
    <!-- akhir Keywords -->

    <!-- Footer Button -->
            <div class="footer-button p-4 d-flex justify-content-center gap-3">
                <a href="/edit-item-submission-center" class="btn btn-warning text-white">Previous</a>
                <a href="/save-and-return-page" class="btn btn-warning text-white">Save and Return</a>
                <a href="/edit-item-deposits" class="btn btn-warning text-white">Next</a>
            </div>        
        <!-- Akhir Footer Button -->    
        </section>


@endsection