
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
    <div class="page-content">
        <div>

            <div class="section" id="portfolio">
                <div class="container">
                    <div class="row">
                    </div>

                    <div class="tab-content gallery mt-5">
                        <div class="tab-pane active" id="web-development">
                            <h5><b>Details Project</b></h5>
                            <div class="ml-auto mr-auto">
                                <div class="row">
                                    @foreach ($project->projectgalleries()->get() as $ppg)
                                    @foreach ($ppg->gallery()->get() as $ppgg)
                                    <div class="col-md-12 d-flex flex-wrap mt-5">
                                        <h6> <b> {{ old('title', $ppgg->title) }}</b> </h6> 
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <a href="#web-development">
                                                <figure class="cc-effect"><img src="{{ Storage::url('public/galleries/').$ppgg->image }}" class="p-3" alt="Image">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            
            
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
