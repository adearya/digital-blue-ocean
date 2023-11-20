<div class="container detail-page mt-4 rounded bg-white">
    <div class="container pt-4 header-text">
        <h1>{{$title}}</h1>
        <h2 class="text-center fw-bold">{{$post->title}}</h2>
        <p class="text-center mt-3">Frensia Tanaga Anaclaudia, Dian Pramana, I Made Arya Budhi Saputra<br>
        APTISI Transactions on Technopreneurship (ATT), Vol 5. No 3. ISSN 2656-8888 (2023)</p>
        <h3>Abstract</h3>
        <p class="main-text">In the Christian Student Brotherhood Student Activity Unit (PMK) ITB Stikom Bali the management of data, information and documentation is still done conventionally, namely hardcopy printing. These documents are vulnerable to being lost, damaged or difficult to find at a later date. Therefore we need a system to be able to manage data, documentation and other information regarding activities in PMK. In developing this activity management application using ReactJS and ExpressJS. This activity management application is expected to be a means of connecting information on activities carried out and making it easier for administrators to be able to store information from activities carried out. There are 5 stages in this research, namely data collection by direct observation of the object under study, literature study and stakeholder interviews. The second stage is an analysis from the user side, the data needed and the existing processes. The third stage is system design using conceptual database design, context diagrams and web architecture. The fourth stage is system implementation using the Javascript programming language with ReactJS on the frontend and ExpressJS on the backend and MongoDB as the database. The last stage is testing the system using the Blackbox testing method which focuses on testing the functionality of the system. The results of this study resulted in a website-based activity management system with predetermined user access as well as a liaison for activity information in the form of activity galleries and activity articles in UKM PMK using ReactJS and ExpressJS.</p>
    </div>
    <div class="container information-text mt-5">
        <p><span class="fw-bold">ITEM TYPE :</span> Article</p>
        <p><span class="fw-bold">KEYWORD :</span>{{$post->category->name}}</p>
        <p><span class="fw-bold">VIEWS :</span>{{$post->views_count}}</p>
        <p><span class="fw-bold">DEPOSITING USER :</span> Admin Digital Blue Ocean</p>
        <p><span class="fw-bold">DATE DEPOSITED :</span> 20 July 2023 07:21</p>
        <p><span class="fw-bold">LAST MODIFIED :</span> 20 July 2023 07:21</p>
    </div>
    <div class="container mt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h3 class="text-center">Login Required (Text)</h3>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/img_articlewriting.svg') }}" alt="img download article" width="80">
                    <p class="mb-0 ms-2">download (787kb)</p>
                </div>
                <p class="text-center mt-2">Restricted to Registered users only - Published Version <br>
                    Official Url: <a href="https://att.aptisi.or.id/index.php/att/article/view/313" class="text-break">https://att.aptisi.or.id/index.php/att/article/view/313</a>
                </p>
            </div>
        </div>
    </div>             
</div>