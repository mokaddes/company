@extends('frontend.layouts.app')
@section('title')
{{ $settings->site_name ?? 'Page header' }}
@endsection

@section('meta')
<meta property="og:title" content="" />
<meta property="og:description" content="" />
<meta property="og:image" content="" />
@endsection

@push('style')
@endpush

@section('content')
<!-- ======================= breadcrumb start  ============================ -->
<div class="breadcrumb_sec">
    <div class="container">
        <div class="breadcrumb_nav text-center">
            <h5>Get acquainted with frachising</h5>
            <h2>Blog</h2>
        </div>
    </div>
</div>
<!-- ======================= breadcrumb end  ============================ -->

<!-- ======================= blog start  ============================ -->
<div class="blog_sec mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog_details">
                    <div class="details_img mb-3">
                        <img src="{{ asset('assets') }}/images/blog/8.jpg" class="w-100" alt="img">
                    </div>
                    <div class="details_content">
                        <h2>Tips For Owning A Health And Wellness Franchise</h2>
                        <p>Personalized health and wellness services have been in high demand for decades. People
                            want them because they provide a high level of customization for their unique needs.
                            They also prefer service providers who understand what they need and will hold them
                            accountable for their health and wellness goals. And they’ll want these services well
                            into the future.</p>
                        <p>In fact, Americans are prioritizing their well-being more now than ever before and the
                            franchise industry is responding. Health and wellness franchises are growing rapidly,
                            fueled by new consumers who are spending more money on improving and maintaining their
                            health and well-being.</p>

                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                            McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                            the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                            the cites of the word in classical literature, discovered the undoubtable source. Lorem
                            Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                            Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                            theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                            "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                            McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                            the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                            the cites of the word in classical literature, discovered the undoubtable source. Lorem
                            Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                            Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                            theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                            "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                            McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                            the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                            the cites of the word in classical literature, discovered the undoubtable source. Lorem
                            Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                            Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                            theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                            "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                    </div>
                </div>

                <!-- related post -->
                <div class="related_post blog_wrap mt-5">
                    <div class="title mb-5">
                        <h3>You may also like...</h3>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets') }}/images/blog/5.jpg"
                                            class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="blog-details.html">Conquering Cash Flow: Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="blog-details.html" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets') }}/images/blog/2.jpg"
                                            class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="blog-details.html">Conquering Cash Flow: Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="blog-details.html" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('assets') }}/images/blog/3.jpg"
                                            class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="blog-details.html">Conquering Cash Flow: Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="blog-details.html" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- related post -->


            </div>
            <div class="col-lg-3">
                <div class="blog_sidebar position-sticky" style="top:1rem;">
                    <div class="heading text-center">
                        <h3>Categories</h3>
                    </div>
                    <div class="sidebar_content">
                        <div class="category_list">
                            <ul>
                                <li><a href="#">Automotive Franchises</a></li>
                                <li><a href="#">Business Coaching Franchises</a></li>
                                <li><a href="#">Buying a Franchise</a></li>
                                <li><a href="#">Choosing the Right Franchise</a></li>
                                <li><a href="#">Cleaning Services</a></li>
                                <li><a href="#">Coffee Franchise</a></li>
                                <li><a href="#">Educational Franchises</a></li>
                                <li><a href="#">Focus on Just One Franchise</a></li>
                                <li><a href="#">Food Truck Franchises</a></li>
                                <li><a href="#">Franchise Brand</a></li>
                                <li><a href="#">Franchise Marketing</a></li>
                                <li><a href="#">Automotive Franchises</a></li>
                                <li><a href="#">Business Coaching Franchises</a></li>
                                <li><a href="#">Buying a Franchise</a></li>
                                <li><a href="#">Choosing the Right Franchise</a></li>
                                <li><a href="#">Cleaning Services</a></li>
                                <li><a href="#">Coffee Franchise</a></li>
                                <li><a href="#">Educational Franchises</a></li>
                                <li><a href="#">Focus on Just One Franchise</a></li>
                                <li><a href="#">Food Truck Franchises</a></li>
                                <li><a href="#">Franchise Brand</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======================= blog end  ============================ -->
@endsection
@push('style')
@endpush
