
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aslan Resume</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/css/aos.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css?ver=1.1.0') }}" rel="stylesheet">
    <noscript>
      <style type="text/css">
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
</head>

<body id="top">
    <header>
        <div class="profile-page sidebar-collapse">
            <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
                <div class="container">
                    <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip"><b>Aslan Resume</b></a>
                        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Experience</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="page-content">
        <div>
            <div class="profile-page">
                <div class="wrapper">
                    <div class="page-header page-header-small" filter-color="green">
                        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('frontend/aslan-portfolio.jpg') }}')"></div>
                        <div class="container">
                            <div class="content-center">
                                @foreach ($abouts as $about)
                                <div class="cc-profile-image ">
                                    <a href="#"><img src="{{ Storage::url('public/abouts/').$about->image }}" alt="Image" /></a>
                                </div>
                                @endforeach
                                <div class="h2 title">👨‍🚀 Sulaslan Setiawan 🧑🏻‍🚀 </div>
                                <p class="category text-white">Software Engineer</p>
                                <a class="btn btn-primary" onclick="alert('Private !');" style="width:200px;" data-aos="zoom-in" data-aos-anchor="data-aos-anchor"> <b>Download CV 📁</b>  </a>
                                <!-- <p class="category text-white">Junior Web Developer</p><a class="btn btn-primary" style="width:200px;" href="https://docs.google.com/document/d/1yF5MGBLtBjHCJYCdDxM0_pzpQMgSubLL0ocEZRGzIJI/edit#heading=h.6wymnhinx9q5"  data-aos="zoom-in" data-aos-anchor="data-aos-anchor" disabled> <b>See / Download My CV</b> </a> -->
                                <!-- <button type="button" class="btn btn-info" onclick="alert('hello'); setLocation('https://example.com');">Info</button> -->

                            </div>
                        </div>
                        <div class="section">
                            <div class="container">
                                <div class="button-container">
                                    @foreach ($socialmedias as $socialmedia)
                                    <a class="btn btn-default btn-round btn-lg btn-icon " style="content: url('images/svg/github.png');" href="{{ $socialmedia->url }}" rel="tooltip" title="Follow me on {{ $socialmedia->title }}"><i class="fa fa-facebook"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section" id="portfolio">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="h4 text-center mb-4 title">Portfolio
                                <p style="font-size:12px;">(klik icon untuk melihat project lain)</p>
                            </div>
                            <div class="nav-align-center">

                                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                    @foreach ($portfolios as $portfolio)
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#{{ $portfolio->title }}" role="tablist"><i class="fa fa-{{ $portfolio->icon }}" aria-hidden="true"></i></a></li>
                                    @endforeach
                                </ul>


                            </div>
                        </div>
                    </div>

                    <div class="tab-content gallery mt-5">

                        <div class="tab-pane active" id="web-development">
                            <h5><b>Keywords : Website, PHP, Laravel, Codeigniter, ReactJs</b></h5>
                            <div class="ml-auto mr-auto">
                                <div class="row">
                                    @foreach ($projects as $project)
                                    <div class="col-md-12 d-flex flex-wrap mt-5">
                                        <h6> <b> {{ $project->title }} (klik gambar untuk melihat detail project)</b> </h6> 
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#web-development">
                                                <figure class="cc-effect"><img src="{{ Storage::url('public/projects/').$project->image }}" class="p-3" alt="Image">
                                                    <figcaption>
                                                        <div class="h4">{{ $project->title }}</div>
                                                        <a href="{{ route('projects.show', $project->id) }}"></a>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            <div class="">
                                                <h6>Project Start : <span class="badge text-bg-info">Info</span>  </h6>
                                                    <hr>
                                                <h6>Technology : </h6>
                                                    @foreach ($project->projectgalleries()->get() as $ppg)
                                                        @foreach ($ppg->technology()->get() as $ppgt)
                                                        <a href="{{ ($ppgt->description) }}">
                                                            <img src="{{ Storage::url('public/technologies/').$ppgt->image }}" class="rounded" style="width: 100px;height:50px">
                                                        </a>
                                                        @endforeach
                                                    @endforeach
                                                    <hr>
                                                <h6>Link DEMO: </h6>
                                                    @foreach ($project->projectgalleries()->get() as $ppg)
                                                        @foreach ($ppg->url()->get() as $ppgu)
                                                            <img src="{{ Storage::url('public/urls/').$ppgu->image }}" class="rounded" style="width: 100px;height:50px">
                                                        @endforeach
                                                    @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="graphic-design" role="tabpanel">
                            <h2>Keywords : Desktop, .NET, VB.Net</h2>
                            <div class="ml-auto mr-auto">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#graphic-design">
                                                <figure class="cc-effect"><img src="images/desktop/d1/d1.6.png" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">Project Desktop App 1</div>
                                                        <a href="pages/desktop/d1/index.html"></a>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#graphic-design">
                                                <figure class="cc-effect"><img src="images/desktop/desktop2.png" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">Project Desktop App 2</div>
                                                        <p>Project Desktop App 2</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#graphic-design">
                                                <figure class="cc-effect"><img src="images/desktop/d2/1.png" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">Project Desktop App 3</div>
                                                        <p>Project Desktop App 3</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#graphic-design">
                                                <figure class="cc-effect"><img src="images/desktop/desktop4.png" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">Project Desktop App 4</div>
                                                        <p>Project Desktop App 4</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="adobe" role="tabpanel">
                            <div class="ml-auto mr-auto">
                                <h2>Keywords : Adobe Photoshop, Adobe Illustrator, Figma</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#Photography">
                                                <figure class="cc-effect"><img src="images/photoshop/1/1.png" alt="Image" />
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#Photography">
                                                <figure class="cc-effect"><img src="images/photoshop/2/2.png" alt="Image" />
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Photography" role="tabpanel">
                            <div class="ml-auto mr-auto">
                                <h2>Android : Flutter</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#Photography">
                                                <figure class="cc-effect"><img src="images/android/android1.jpg" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">Project android 1</div>
                                                        <p>Project android 1</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#Photography">
                                                <figure class="cc-effect"><img src="images/android/android2.jpg" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4"> Project android 2</div>
                                                        <p>Project android 2</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#Photography">
                                                <figure class="cc-effect"><img src="images/android/android3.jpg" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">Project android 3</div>
                                                        <p>Project android 3</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#Photography">
                                                <figure class="cc-effect"><img src="images/android/android4.jpg" alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">Project android 4</div>
                                                        <p>Project android 4</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="languages" role="tabpanel">
                            <h2>Keywords: English, Japanese, Mandarin</h2>
                            <div class="ml-auto mr-auto">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#graphic-design">
                                                <figure class="cc-effect"><img src="images/languages/english/SULASLAN-SETIAWAN-1.png" alt="Image" />
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#graphic-design">
                                                <figure class="cc-effect"><img src="images/languages/english/SULASLAN-SETIAWAN-2.png" alt="Image" />
                                                </figure>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="section" id="about">
                <div class="container">
                    <div class="card" data-aos="fade-up" data-aos-offset="10">
                        @foreach ($abouts as $about)
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="card-body">
                                    <div class="h4 mt-0 title">About</div>
                                    <p>{{ $about->bio }}</p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card-body">
                                    <div class="h4 mt-0 title">Basic Information</div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                                        <div class="col-sm-8">{{ $about->email }}</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><strong class="text-uppercase">Phone/WA:</strong></div>
                                        <div class="col-sm-8">(+62) {{ $about->phone }}</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
                                        <div class="col-sm-8">{{ $about->address }}</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><strong class="text-uppercase">Language:</strong></div>
                                        <div class="col-sm-8">
                                            <p>
                                                <a href="" style="content: url('images/united-states.png');width: 30px; height: 30px;"></a>{{ $about->language }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @foreach ($experiences as $experience)
            <div class="section" id="experience">
                <div class="container cc-experience">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body cc-experience-header">
                                    <p>{{ $experience->work_start }} - {{ $experience->work_end }}</p>
                                    <div class="h5">{{ $experience->status }}</div>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">{{ $experience->company_name }}</div>
                                    <p>{{ $experience->work_position }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            
            
        </div>
    </div>
    <script src="{{ asset('frontend/js/core/jquery.3.2.1.min.js?ver=1.1.0') }}"></script>
    <script src="{{ asset('frontend/js/core/popper.min.js?ver=1.1.0') }}"></script>
    <script src="{{ asset('frontend/js/core/bootstrap.min.js?ver=1.1.0') }}"></script>
    <script src="{{ asset('frontend/js/now-ui-kit.js?ver=1.1.0') }}"></script>
    <script src="{{ asset('frontend/js/aos.js?ver=1.1.0') }}"></script>
    <script src="{{ asset('frontend/scripts/main.js?ver=1.1.0') }}"></script>
    <script>
        $('#link').hover(function() {
            $('#title').text($('#link').attr('title'));
        });
    </script>

    <script>
        function myFunction() {
            document.getElementById("demo").innerHTML = "Hello World";
        }
    </script>

</body>

</html>
