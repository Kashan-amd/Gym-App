@extends('navbar')
@section('content')


    <!-- page wrap
    ================================================== -->
    <div class="s-pagewrap">

        <!-- # intro 
        ================================================== -->
        <section id="intro" class="s-intro target-section">

            <div class="row">
                <div class="column">
                    <div class="s-intro__top-block">
                        <span class="s-intro__bg"></span>

                        <h1 class="s-intro__text">
                        We create personalized plans and routines that are tailored to the individual's needs and abilities<span>.</span>
                        </h1>

                        <a href="#services" class="s-intro__scroll-down smoothscroll">
                            <span>Scroll Down</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:rotate(180deg);-ms-filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=2)"><path d="M21 11L6.414 11 11.707 5.707 10.293 4.293 2.586 12 10.293 19.707 11.707 18.293 6.414 13 21 13z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row row-x-center s-intro__about-wrap">
                <div class="column s-intro__about">
                    <h2 class="s-intro__about-title">Hello, We Are Gym Bros.</h2>

                    <p>
                    Our gym web app provides a diverse range of diet, exercise, and nutrition plans to cater to the unique needs and goals of our users. Whether you're looking to lose weight, build muscle, or simply improve your overall health and fitness, we have a variety of customized plans to help you achieve your desired results.

                    </p>

                </div>
            </div>

            <div class="row about-stats stats block-lg-one-whole block-md-one-half block-mob-whole text-center" data-animate-block>
                
                <div class="column stats__item" data-animate-el>
                    <div class="stats__count" data-counter={{ $countPlans }}><span>{{ $countPlans }}</span>+</div>
                    <h5>Our Plans</h5>
                    <p>
                    </p>
                </div>
                <div class="column stats__item" data-animate-el>
                    <div class="stats__count" data-counter={{ $countCategories }}><span>{{ $countCategories }}</span>+</div>
                    <h5>Categories</h5>
                    <p>
                   
                    </p>
                </div>
                <div class="column stats__item" data-animate-el>
                    <div class="stats__count" data-counter={{ $countUser }}><span>{{ $countUser }}</span>+</div>
                    <h5>Our Customers</h5>
                    <p>
                   
                    </p>
                </div>
    
            </div> <!-- end about-stats -->

        </section> <!-- end s-intro -->

        <!-- ## works
        ================================================== -->
        <section id="works" class="s-works target-section">

            <div class="row section-header section-header--dark has-bottom-sep">
                <div class="column lg-12">
                    <h3 class="text-pretitle">Popular Plans</h3>
                    <h1 class="text-display-title">Here are some of our optimal plans. Feel free to check them out.</h1>
                </div>
            </div> <!-- end section-header -->

            <div class="row folio-list block-lg-one-third block-tab-one-half block-stack-on-550 collapse" data-animate-block>
                @foreach($planDetails as $key)
                <div class="column">
                    <div class="folio-item" data-animate-el>
                        <div class="folio-item__thumb">
                            <a class="folio-item__thumb-link" href="{{ url('/storage/upload/'.$key->file_name) }}" title="Plan" data-size="1050x700">
                            <img src="{{ url('/storage/upload/'.$key->file_name) }}" alt="plan image" class="image_pro"></td>
                            </a>
                        </div>
                        <div class="folio-item__info">
                            <div class="folio-item__cat">Plan</div>
                            <h4 class="folio-item__title">{{ $key->plan_name }}</h4>
                        </div>
                        <!-- <a href="" title="More Details" class="folio-item__project-link">More Details</a> -->
                        <div class="folio-item__caption">
                            <p>{{ $key->duration }} Plan</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- folio-list -->

            <div class="row clients-outer" data-animate-block>
                <div class="column lg-12">

                    <h3 class="text-clients-title" data-animate-el>
                        ...
                    </h3>

                </div>
            </div>

            <div class="video-block">
                
                <span class="video-block__bg-right"></span>
                <div class="video-block__content">

                        <h3 class="u-add-bottom" style="color:black">Calculate Your Body Mass Index</h3>
                          
                        <div>
                            <input class="u-fullwidth" type="number" step="0.25" name="weight" placeholder="Weight in Kg" id="weight" style="text-align:center;color:black; font-size:25px" required>
                        </div>
                        <div>
                            <input class="u-fullwidth" type="number" step="0.25" name="height" placeholder="Height in Meters" id="height" style="text-align:center;color:black; font-size:25px" required>
                        </div>
                        <input class="btn--primary u-fullwidth" onclick="calculateBMI()" type="button" value="Calculate BMI">
                         
                    <p class="">
                        <h6 style="color:black">Your Body Mass Index is:<br><br> <label style="color:black; font-size:20px" id="bmi_value"></label></h6>
                    </p>
                    <p style="color:black"><a class="btn--primary" href="{{ route('register') }}" >Sign-In</a> to save your progress</p>
                </div>
            </div> <!-- end video-block -->

            <!-- <div class="row testimonials" data-animate-block>
                <div class="column lg-12">
    
                    <div class="swiper-container testimonial-slider" data-animate-el>
    
                        <div class="swiper-wrapper">

                            <div class="testimonial-slider__slide swiper-slide">
                                <div class="testimonial-slider__author">
                                    <img src="images/avatars/user-02.jpg" alt="Author image" class="testimonial-slider__avatar">
                                    <cite class="testimonial-slider__cite">
                                        <strong>Tim Cook</strong>
                                        <span>CEO, Apple</span>
                                    </cite>
                                </div>
                                <p>
                                Molestiae incidunt consequatur quis ipsa autem nam sit enim magni. Voluptas tempore rem. 
                                Explicabo a quaerat sint autem dolore ducimus ut consequatur neque. Nisi dolores quaerat fuga rem nihil nostrum.
                                Laudantium quia consequatur molestias.
                                </p>
                            </div> 
            
                            <div class="testimonial-slider__slide swiper-slide">
                                <div class="testimonial-slider__author">
                                    <img src="images/avatars/user-03.jpg" alt="Author image" class="testimonial-slider__avatar">
                                    <cite class="testimonial-slider__cite">
                                        <strong>Sundar Pichai</strong>
                                        <span>CEO, Google</span>
                                    </cite>
                                </div>
                                <p>
                                Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                                Nisi eaque consequatur. Voluptatem dignissimos ut ducimus accusantium perspiciatis.
                                Quasi voluptas eius distinctio. Atque eos maxime.
                                </p>
                            </div> 
            
                            <div class="testimonial-slider__slide swiper-slide">
                                <div class="testimonial-slider__author">
                                    <img src="images/avatars/user-01.jpg" alt="Author image" class="testimonial-slider__avatar">
                                    <cite class="testimonial-slider__cite">
                                        <strong>Satya Nadella</strong>
                                        <span>CEO, Microsoft</span>
                                    </cite>
                                </div>
                                <p>
                                Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.  
                                Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.
                                Voluptatem dignissimos ut.
                                </p>
                            </div> 
        
                        </div> 
    
                        <div class="swiper-pagination"></div>
    
                    </div> 
    
                </div> 
            </div> -->

        </section> 

    <script>
        function calculateBMI()
        { 
            var weight = document.getElementById('weight').value;
            var height = document.getElementById('height').value;
            var request = new XMLHttpRequest();
            request.open("GET", "/bmi/"+weight+"/"+height, false);
            request.send();
            console.log(request.response);
            document.getElementById('bmi_value').innerHTML = parseFloat(request.response).toFixed(2);
        }
    </script>
@endsection