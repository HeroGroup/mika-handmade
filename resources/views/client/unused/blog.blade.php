@extends('layouts.client.app')
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="blog-page-banner common-banner-section" style="background-image:url(assets/client/images/blog-banner.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12"> 
                        <div class="common-banner-content">
                            <ul class="blog-cat">
                                <li class="active">Featured</li>
                                <li><b>Category:</b> Fashion</li>
                                <li><b>Date:</b> 12 Mar, 2022</li>
                            </ul> 
                            <div class="section-title">
                                <h2>Top sneakers trends <b>for 2022 year</b></h2>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard...</p>
                            <a href="#" class="btn">
                                <span class="btn-txt">read MORE</span> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
        <section class="blog-grid-section padding-top padding-bottom tabs-wrapper">
            <div class="container">
                <div class="section-title">
                    <div class="subtitle">ALL  BLOGS</div>
                    <h2>From  <b> our blog</b></h2>
                </div>
                <div class="blog-head-row d-flex justify-content-between">
                    <div class="blog-col-left"> 
                        <ul class="d-flex tabs">
                            <li class="tab-link active" data-tab="blog-1"><a href="javascript:;">All</a></li>
                            <li class="tab-link" data-tab="blog-2"><a href="javascript:;">Shoes </a> </li>        
                            <li class="tab-link" data-tab="blog-3"><a href="javascript:;">Senakers</a></li>          
                            <li class="tab-link" data-tab="blog-4"><a href="javascript:;">Sport shoes</a></li>        
                            <li class="tab-link" data-tab="blog-5"><a href="javascript:;">Trekking shoes</a></li>   
                        </ul>
                    </div>
                    <div class="blog-col-right d-flex align-items-center justify-content-end">
                        <span class="select-lbl">Sort by</span>
                        <select>
                            <option>Lastest</option>
                            <option>new</option>
                        </select>
                    </div>
                </div>
                <div class="tabs-container">
                    <div id="blog-1" class="tab-content active">  
                        <div class="blog-grid-row row"> 

                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                <div class="blog-itm-inner">
                                    <div class="blog-img">
                                        <a href="/article">
                                            <img src="assets/client/images/blog.png">
                                            <span class="blg-lbl">ARTICLES</span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-content-top">
                                            <h4><a href="/article">Best gadgets for hand made artist</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy.</p>
                                        </div>
                                        <div class="blog-contnt-bottom">
                                            <a href="/article" class="link-btn">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>  
                    </div>
                    <div id="blog-2" class="tab-content">   
                    </div>
                    <div id="blog-3" class="tab-content">   
                    </div>
                    <div id="blog-4" class="tab-content">   
                    </div>
                    <div id="blog-5" class="tab-content">   
                    </div> 
                </div>
            </div>
        </section> 
    </div>
    <!---wrapper end here-->

    @endsection