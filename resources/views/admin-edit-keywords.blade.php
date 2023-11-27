@extends("layouts.layout-dashboard")

@section("tittle", "Edit Keywords")

@section("content")

<section class="container admin-status mt-4 bg-white rounded p-3">
    <!-- Header Button -->
    <h1 class="container header-title pt-4 fw-bold text-center">Admin</h1>
    <div class="container header-button d-flex justify-content-center gap-2">
        <a href="/admin-status" class="btn btn-warning text-white mt-4 col">Status</a>
        <a href="/admin-create-user" class="btn btn-warning text-white mt-4 col">Create User</a>
        <a href="/admin-edit-keywords" class="btn btn-warning text-white mt-4 col">Edit Keywords</a>
    </div>
    <!-- Akhir Header Button -->

    <!-- Background Main Admin Status -->
    <div class="container bg-main-content mt-3 p-4">
        <!-- Keyword -->
        <div class="container">
            <h2 class="fw-bold mb-3">Edit Category Keywords</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="keywordTable">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Keywords</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table rows for keywords will be added here -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Akhir Keyword -->

        <div class="d-flex">

        <!-- Form untuk menambahkan category baru -->
        <div class="container mt-4">
            <h5 class="fw-bold text-center">Add New Category:</h5>
            <form id="addCategoryForm" class="d-flex justify-content-center align-items-center flex-column mt-3">
                <div class="mb-3">
                    <input type="text" class="form-control" id="newCategory" placeholder="Enter new category">
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
        <!-- Akhir Form untuk menambahkan category baru -->

        <!-- Form untuk menambahkan keyword baru -->
        <div class="container mt-4">
            <h5 class="fw-bold text-center">Add New Keyword:</h5>
            <form id="addKeywordForm" class="d-flex justify-content-center align-items-center flex-column mt-3">
                <div class="d-flex gap-3">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="newKeyword" placeholder="Enter new keyword">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="selectCategory">
                            <!-- Options for categories will be added here -->
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Keyword</button>
            </form>
        </div>
        <!-- Akhir Form untuk menambahkan keyword baru -->
        
        </div>
    </div>
    <!-- Background Main Akhir Admin Status -->
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to add new category
        document.getElementById('addCategoryForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const newCategoryInput = document.getElementById('newCategory').value;

            if (newCategoryInput.trim() !== '') {
                const categoryTable = document.getElementById('keywordTable');

                const newRow = document.createElement('tr');
                const categoryCell = document.createElement('td');
                const keywordCell = document.createElement('td');

                categoryCell.textContent = newCategoryInput;
                keywordCell.textContent = ''; // Tambahkan ini untuk menampilkan kolom kosong

                newRow.appendChild(categoryCell);
                newRow.appendChild(keywordCell);

                categoryTable.querySelector('tbody').appendChild(newRow);

                // Clear the input field
                document.getElementById('newCategory').value = '';
            } else {
                alert('Please enter a category.');
            }
        });

        // Function to add new keyword
        document.getElementById('addKeywordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const newKeywordInput = document.getElementById('newKeyword').value;
            const selectedCategory = document.getElementById('selectCategory').value;

            if (newKeywordInput.trim() !== '') {
                const keywordTable = document.getElementById('keywordTable');

                const newRow = document.createElement('tr');
                const categoryCell = document.createElement('td');
                const keywordCell = document.createElement('td');

                categoryCell.textContent = selectedCategory;
                keywordCell.textContent = newKeywordInput;

                newRow.appendChild(categoryCell);
                newRow.appendChild(keywordCell);

                keywordTable.querySelector('tbody').appendChild(newRow);

                // Clear the input fields
                document.getElementById('newKeyword').value = '';
                document.getElementById('selectCategory').selectedIndex = 0;
            } else {
                alert('Please enter a keyword.');
            }
        });
    });
</script>

@endsection
