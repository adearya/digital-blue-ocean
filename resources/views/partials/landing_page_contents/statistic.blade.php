<section class="viewboard">
    <div class="container mt-5 mb-3 text-white fw-normal">
        Latest Collections
    </div>
        <div class="container bg-white p-2 content1 rounded">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-spacing table-borderless">
                            <tr>
                                <th>Article Name</th>
                                <th class="text-center">Views</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td class="text-center">{{ $post->views_count }}</td>
                                <td class="text-center"><a href="{{ route('single_post', ['slug' => $post->slug]) }}">More Detail</a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <div class="explore-more">
                                        <a class="me-3" href="">EXPLORE MORE</a>
                                        <img src="assets/img/Vector.svg" alt="">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="content1-right d-flex justify-content-center flex-wrap">
                        <div class="kotak kotak1"></div>
                        <div class="kotak kotak2"></div>
                        <div class="kotak kotak3"></div>
                        <div class="kotak kotak4"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 d-flex top-download-items-and-top-author text-white fw-normal">
            <div class="container top-download-items">
                Top Download Items
            </div>
            <div class="container top-author ms-4">
                Top Author
            </div>
        </div>
        <div class="container p-2 content2 rounded">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-spacing bg-white rounded">
                            <tr>
                                <th>Search Terms</th>
                                <th class="text-center">Download</th>
                            </tr>
                            <tr>
                                <td>Learning scikit-learn: Machine Learning in Python</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td>Development of the Global Film Industry</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td>Data Analytics with Hadoop</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td>Data Analysis with R</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td>CYBERSPACE and CYBERSECURITY</td>
                                <td class="text-center">10</td>
                            </tr>
                        </table>
                    </div>
                </div>

            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-spacing bg-white rounded">
                        <tr>
                            <th>Search Terms</th>
                            <th class="text-center">Searches</th>
                        </tr>
                        <tr>
                            <td>Girinzio, Iqbal Desam</td>
                            <td class="text-center">24</td>
                        </tr>
                        <tr>
                            <td>Hanma, Zaki</td>
                            <td class="text-center">20</td>
                        </tr>
                        <tr>
                            <td>Situmorang, Hery</td>
                            <td class="text-center">18</td>
                        </tr>
                        <tr>
                            <td>Nurtino, Tio</td> 
                            <td class="text-center">15</td>
                        </tr>
                        <tr>
                            <td>Nuriman, Arbi</td>
                            <td class="text-center">11</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>