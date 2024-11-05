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
                <div class="blog_wrap mb-5">
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}">
                                        <img src="assets/images/blog/5.jpg" class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="{{ route('frontend.blogs.details', 'slug') }}">Conquering Cash Flow:
                                            Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}">
                                        <img src="assets/images/blog/5.jpg" class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="{{ route('frontend.blogs.details', 'slug') }}">Conquering Cash Flow:
                                            Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}">
                                        <img src="assets/images/blog/6.jpg" class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="{{ route('frontend.blogs.details', 'slug') }}">Conquering Cash Flow:
                                            Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}">
                                        <img src="assets/images/blog/5.jpg" class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="{{ route('frontend.blogs.details', 'slug') }}">Conquering Cash Flow:
                                            Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}">
                                        <img src="assets/images/blog/5.jpg" class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="{{ route('frontend.blogs.details', 'slug') }}">Conquering Cash Flow:
                                            Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}">
                                        <img src="assets/images/blog/6.jpg" class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="{{ route('frontend.blogs.details', 'slug') }}">Conquering Cash Flow:
                                            Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog item -->
                    <div class="blog_list mb-4">
                        <div class="row bg-light position-relative align-items-center">
                            <div class="col-lg-3">
                                <div class="blog_img text-center text-lg-start">
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}">
                                        <img src="assets/images/blog/5.jpg" class="flex-shrink-0 me-3 img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="blog_article">
                                    <h5>
                                        <a href="{{ route('frontend.blogs.details', 'slug') }}">Conquering Cash Flow:
                                            Guidelines for Alleviating
                                            Financial
                                            Stress in Your Franchise Business</a>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id voluptatum earum
                                        impedit blanditiis ratione neque praesentium explicabo corporis labore cum
                                        voluptatibus quo beatae repudiandae, officiis at temporibus. Tempore, vitae
                                        maiores?</p>
                                    <a href="{{ route('frontend.blogs.details', 'slug') }}" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- pagination -->

                </div>
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
