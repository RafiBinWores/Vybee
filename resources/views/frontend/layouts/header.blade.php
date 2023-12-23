<header>
    <div class="header-top">
        <div class="content-margins">
            <div class="row">
                <div class="col-md-5 hidden-xs hidden-sm">
                    <div class="entry"><b>contact us:</b> <a href="tel:+35235551238745">+3 (523) 555 123
                            8745</a></div>
                    <div class="entry"><b>email:</b> <a href="mailto:office@exzo.com">office@exzo.com</a></div>
                </div>
                <div class="col-md-7 col-md-text-right">
                    <div class="entry"><a class="open-popup" data-rel="1"><b>login</b></a>&nbsp; or &nbsp;<a
                            class="open-popup" data-rel="2"><b>register</b></a></div>
                    <div class="entry hidden-xs hidden-sm"><a href="#"><i class="fa fa-heart-o"
                                aria-hidden="true"></i></a></div>
                    <div class="entry hidden-xs hidden-sm cart">
                        <a href="cart.html">
                            <b class="hidden-xs">Your bag</b>
                            <span class="cart-icon">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                <span class="cart-label">5</span>
                            </span>
                            <span class="cart-title hidden-xs">$1195.00</span>
                        </a>

                    </div>
                    <div class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="content-margins">
            <div class="row">
                <div class="col-xs-3 col-sm-1">
                    <a id="logo" href="index1.html"><img src="{{ asset('front-assets/img/logo-2.png') }}"
                            alt="" /></a>
                </div>
                <div class="col-xs-9 col-sm-11 text-right">
                    <div class="nav-wrapper">
                        <div class="nav-close-layer"></div>
                        <nav>
                            <ul>
                                <li class="active">
                                    <a href="index1.html">Home</a>
                                </li>
                                <li>
                                    <a href="">All Category</a>
                                    <div class="menu-toggle"></div>
                                    <ul>
                                        @if (getCategories()->isNotEmpty())
                                            @foreach (getCategories() as $category)
                                                <li>
                                                    <a href="">{{ $category->name }}</a>
                                                    <div class="menu-toggle"></div>
                                                    @if ($category->sub_category->isNotEmpty())
                                                        <ul>
                                                            @foreach ($category->sub_category as $subCategory)
                                                                <li><a href="">{{ $subCategory->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                                <li>
                                    <a href="products1.html">products</a>
                                </li>
                                <li>
                                    <a href="blog3.html">blog</a>
                                </li>

                                <li><a href="contact1.html">contact</a></li>
                            </ul>
                            <div class="navigation-title">
                                Navigation
                                <div class="hamburger-icon active">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="header-bottom-icon toggle-search"><i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <div class="header-bottom-icon visible-rd"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                    <div class="header-bottom-icon visible-rd">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <span class="cart-label">5</span>
                    </div>
                </div>
            </div>
            <div class="header-search-wrapper">
                <div class="header-search-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                <form>
                                    <div class="search-submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <input type="submit" />
                                    </div>
                                    <input class="simple-input style-1" type="text" value=""
                                        placeholder="Enter keyword" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="button-close"></div>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="header-empty-space"></div>
