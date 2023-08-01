<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Turisticka Ruma</title>
    <!-- favion -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="img/favicon-16x16.png"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/znamenitosti.css')}}" />
    <!-- link to font awesome -->
    <link
      media="all"
      rel="stylesheet"
      href="{{asset('vendors/font-awesome/css/font-awesome.css')}}"
    />
    <!-- link to material icon font -->
    <link
      media="all"
      rel="stylesheet"
      href="{{asset('vendors/material-design-icons/material-icons.css')}}"
    />
    <!-- link to custom icomoon fonts -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('css/fonts/icomoon/icomoon.css')}}"
    />
    <!-- link to wow js animation -->
    <link media="all" rel="stylesheet" href="{{asset('vendors/animate/animate.css')}}" />
    <!-- include bootstrap css -->
    <link media="all" rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <!-- include main css -->
    <link media="all" rel="stylesheet" href="{{asset('css/main.css')}}" />
  </head>
  <body>
    <div class="preloader" id="pageLoad">
      <div class="holder">
        <div class="coffee_cup"></div>
      </div>
    </div>
    <!-- main wrapper -->
    <div id="wrapper">
      <div class="page-wrapper">
        <!-- main header -->
        <header id="header">
          <div class="container-fluid">
            <!-- logo -->
            <div class="logo">
              <a href="index.html">
                <img class="normal" src="{{asset('img/logos/logo.svg')}}" alt="Entrada" />
                <img
                  class="gray-logo"
                  src="{{asset('img/logos/logo-gray.svg')}}"
                  alt="Entrada"
                />
              </a>
            </div>
            <!-- main navigation -->
            <nav class="navbar navbar-default">
              <div class="navbar-header">
                <button
                  type="button"
                  class="navbar-toggle nav-opener"
                  data-toggle="collapse"
                  data-target="#nav"
                >
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- main menu items and drop for mobile -->
              <div class="collapse navbar-collapse" id="nav">
                <!-- main navbar -->
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Home <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <ul>
                        <li><a href="/">Home - Icon Bar</a></li>
                        <li>
                          <a href="home-search-bar.html">Home - Tour Search</a>
                        </li>
                        <li>
                          <a href="home-icon-search.html"
                            >Home - Icon + Search</a
                          >
                        </li>
                        <li>
                          <a href="home-revolution.html">Home - Revolution</a>
                        </li>
                        <li>
                          <a href="home-parallax.html">Home - Parallax</a>
                        </li>
                        <li>
                          <a href="home-html5-video.html">Home - HTML5 Video</a>
                        </li>
                        <li>
                          <a href="home-static-image.html"
                            >Home - Static Image</a
                          >
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Tour Listing <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <ul>
                        <li>
                          <a href="grid-view-2-column.html"
                            >Grid View - 2 Column</a
                          >
                        </li>
                        <li>
                          <a href="grid-view-3-column.html"
                            >Grid View - 3 Column</a
                          >
                        </li>
                        <li>
                          <a href="grid-view-4-column.html"
                            >Grid View - 4 Column</a
                          >
                        </li>
                        <li>
                          <a href="grid-view-sidebar.html"
                            >Grid View - Sidebar</a
                          >
                        </li>
                        <li>
                          <a href="grid-view-full-width.html"
                            >Grid View - Full Width</a
                          >
                        </li>
                        <li>
                          <a href="list-view-normal.html">List View - Normal</a>
                        </li>
                        <li>
                          <a href="list-view-detail.html">List View - Detail</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li><a href="tour-detail.html">Tour Detail</a></li>
                  <li class="dropdown has-mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Activities <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <div class="drop-wrap">
                        <div class="drop-holder">
                          <div class="row">
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="hiking-camping.html"
                                    ><img
                                      src="img/generic/img-01.jpg"
                                      height="228"
                                      width="350"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="hiking-camping.html"
                                      >Hiking/Camping</a
                                    ></strong
                                  >
                                  <p>
                                    A good backpacker minimizes their impact on
                                    the environment, including staying on
                                    established trails, not disturbing
                                    vegetation, and carrying garbage out.
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="jungle-safari.html"
                                    ><img
                                      src="img/generic/img-02.jpg"
                                      height="215"
                                      width="370"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="jungle-safari.html"
                                      >Jungle Safari</a
                                    ></strong
                                  >
                                  <p>
                                    In the past, the trip was often a big-game
                                    hunt, but today, safari often refers to
                                    trips to observe and photograph wildlife—or
                                    hiking and sight-seeing as well.
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="city-tour.html"
                                    ><img
                                      src="img/generic/img-03.jpg"
                                      height="215"
                                      width="370"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="city-tour.html"
                                      >Urban City Tour</a
                                    ></strong
                                  >
                                  <p>
                                    The type of urban city tour considered here
                                    is a full, partial-day, or longer tour of a
                                    historical, or cultural or artistic site in
                                    one or more tourist destinations.
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="col">
                                <div class="img-wrap">
                                  <a href="family-fun.html"
                                    ><img
                                      src="img/generic/img-04.jpg"
                                      height="215"
                                      width="370"
                                      alt="image description"
                                  /></a>
                                </div>
                                <div class="des">
                                  <strong class="title"
                                    ><a href="family-fun.html"
                                      >Family Fun</a
                                    ></strong
                                  >
                                  <p>
                                    A community area is available on Trafalgar’s
                                    website offering members the opportunity to
                                    interact with fellow travelers by joining
                                    groups, contributing to forums.
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown has-mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Pages <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <div class="drop-wrap">
                        <div class="five-col">
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >General</strong
                            >
                            <ul class="header-link">
                              <li><a href="about.html">About Us</a></li>
                              <li><a href="error.html">404 Error</a></li>
                              <li>
                                <a href="tour-detail.html">Tour Detail</a>
                              </li>
                              <li><a href="megamenu.html">Megamenu</a></li>
                              <li><a href="contact.html">Contact</a></li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Layout</strong
                            >
                            <ul class="header-link">
                              <li>
                                <a href="layout-fullwidth.html"
                                  >Full Width Page</a
                                >
                              </li>
                              <li>
                                <a href="layout-fullwidth-wide.html"
                                  >Full Width Wide</a
                                >
                              </li>
                              <li>
                                <a href="layout-left-sidebar.html"
                                  >Left Sidebar</a
                                >
                              </li>
                              <li>
                                <a href="layout-right-sidebar.html"
                                  >Right Sidebar</a
                                >
                              </li>
                              <li>
                                <a href="layout-both-sidebar.html"
                                  >Both Sidebar</a
                                >
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Booking</strong
                            >
                            <ul class="header-link">
                              <li><a href="login.html">Login/Register</a></li>
                              <li>
                                <a href="my-wishlist.html">My Wishlist</a>
                              </li>
                              <li><a href="my-cart.html">My Cart</a></li>
                              <li><a href="checkout.html">Checkout</a></li>
                              <li>
                                <a href="confirmation.html">Confirmation</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener"
                              >Header Styles</strong
                            >
                            <ul class="header-link">
                              <li>
                                <a href="header-top-bar.html"
                                  >Header - Top Bar</a
                                >
                              </li>
                              <li>
                                <a href="header-centered.html"
                                  >Header - Centered</a
                                >
                              </li>
                              <li>
                                <a href="header-default-white.html"
                                  >Header - White</a
                                >
                              </li>
                              <li>
                                <a href="header-dark.html">Header - Dark</a>
                              </li>
                              <li>
                                <a href="header-transparent.html"
                                  >Header - Transparent</a
                                >
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <strong class="title sub-link-opener">Misc</strong>
                            <ul class="header-link">
                              <li><a href="icon-font.html">Icon Fonts</a></li>
                              <li>
                                <a href="home-boxed.html">Boxed Layout</a>
                              </li>
                              <li><a href="home-image-bg.html">Image BG</a></li>
                              <li>
                                <a href="home-pattern-bg.html">Pattern BG</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Blog <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <ul>
                        <li><a href="blog-default.html">Blog Default</a></li>
                        <li>
                          <a href="blog-left-sidebar.html">Left Sidebar</a>
                        </li>
                        <li>
                          <a href="blog-right-sidebar.html">Right Sidebar</a>
                        </li>
                        <li><a href="blog-fullwidth.html">Full Width</a></li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="dropdown has-mega-dropdown mega-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      >Elements <b class="icon-angle-down"></b
                    ></a>
                    <div class="dropdown-menu">
                      <div class="drop-wrap">
                        <div class="row">
                          <div class="col-sm-4">
                            <ul class="header-link">
                              <li>
                                <a href="elements-animations.html"
                                  >Animations</a
                                >
                              </li>
                              <li>
                                <a href="elements-blockquotes.html"
                                  >Blockquotes</a
                                >
                              </li>
                              <li>
                                <a href="elements-buttons.html">Buttons</a>
                              </li>
                              <li>
                                <a href="elements-carousel.html">Carousel</a>
                              </li>
                              <li>
                                <a href="elements-counters.html">Counters</a>
                              </li>
                              <li>
                                <a href="elements-modal-boxes.html"
                                  >Modal Boxes</a
                                >
                              </li>
                              <li>
                                <a href="elements-paginations.html"
                                  >Paginations</a
                                >
                              </li>
                            </ul>
                          </div>
                          <div class="col-sm-4">
                            <ul class="header-link">
                              <li>
                                <a href="elements-columns.html">Columns</a>
                              </li>
                              <li>
                                <a href="elements-data-tables.html"
                                  >Data Tables</a
                                >
                              </li>
                              <li>
                                <a href="elements-date-picker.html"
                                  >Date Pickers</a
                                >
                              </li>
                              <li>
                                <a href="elements-dividers.html">Dividers</a>
                              </li>
                              <li>
                                <a href="elements-icon-boxes.html"
                                  >Icon Boxes</a
                                >
                              </li>
                              <li><a href="icon-font.html">Icon Fonts</a></li>
                              <li>
                                <a href="elements-accordions.html"
                                  >Accordions</a
                                >
                              </li>
                            </ul>
                          </div>
                          <div class="col-sm-4">
                            <ul class="header-link">
                              <li>
                                <a href="elements-headings.html">Headings</a>
                              </li>
                              <li>
                                <a href="elements-galleries.html">Galleries</a>
                              </li>
                              <li>
                                <a href="elements-labels-badges.html"
                                  >Labels/Badges</a
                                >
                              </li>
                              <li>
                                <a href="elements-media-option.html"
                                  >Media Options</a
                                >
                              </li>
                              <li>
                                <a href="elements-search-options.html"
                                  >Search Options</a
                                >
                              </li>
                              <li>
                                <a href="elements-social-icons.html"
                                  >Social Icons</a
                                >
                              </li>
                              <li>
                                <a href="elements-responsive.html"
                                  >Responsive/Visibility</a
                                >
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="visible-xs visible-sm">
                    <a href="login.html">
                      <span class="icon icon-user"></span>
                      <span class="text">Login</span>
                    </a>
                  </li>
                  <li class="hidden-xs hidden-sm v-divider">
                    <a href="login.html">
                      <span class="icon icon-user"></span>
                    </a>
                  </li>
                  <li
                    class="visible-xs visible-sm nav-visible dropdown last-dropdown v-divider"
                  >
                    <a href="my-cart.html" data-toggle="dropdown">
                      <span class="icon icon-cart"></span>
                      <span class="text hidden-md hidden-lg">Cart</span>
                      <span class="text hidden-xs hidden-sm">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-md">
                      <div class="drop-wrap cart-wrap">
                        <strong class="title">Shopping Cart</strong>
                        <ul class="cart-list">
                          <li>
                            <div class="img">
                              <a href="#">
                                <img
                                  src="img/listing/img-16.jpg"
                                  height="165"
                                  width="170"
                                  alt="image description"
                                />
                              </a>
                            </div>
                            <div class="text-holder">
                              <span class="amount">x 2</span>
                              <div class="text-wrap">
                                <strong class="name"
                                  ><a href="#">Weekend in Paradise</a></strong
                                >
                                <span class="price">$199</span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="img">
                              <a href="#">
                                <img
                                  src="img/listing/img-17.jpg"
                                  height="165"
                                  width="170"
                                  alt="image description"
                                />
                              </a>
                            </div>
                            <div class="text-holder">
                              <span class="amount">x 4</span>
                              <div class="text-wrap">
                                <strong class="name"
                                  ><a href="#">Water Sports in Spain</a></strong
                                >
                                <span class="price">$199</span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="img">
                              <a href="#">
                                <img
                                  src="img/listing/img-18.jpg"
                                  height="165"
                                  width="170"
                                  alt="image description"
                                />
                              </a>
                            </div>
                            <div class="text-holder">
                              <span class="amount">x 4</span>
                              <div class="text-wrap">
                                <strong class="name"
                                  ><a href="#">Beach Party in Greece</a></strong
                                >
                                <span class="price">$199</span>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <div class="footer">
                          <a href="my-cart.html" class="btn btn-primary"
                            >View cart</a
                          >
                          <span class="total">$3300</span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li
                    class="dropdown hidden-xs hidden-sm last-dropdown v-divider"
                  >
                    <a href="#"
                      ><span class="text">EN</span>
                      <span class="icon-angle-down"></span
                    ></a>
                    <div class="dropdown-menu dropdown-sm">
                      <div class="drop-wrap lang-wrap">
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <span class="text">English</span>
                            </a>
                          </div>
                        </div>
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <span class="text">German</span>
                            </a>
                          </div>
                        </div>
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <span class="text">Russian</span>
                            </a>
                          </div>
                        </div>
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <span class="text">Czech</span>
                            </a>
                          </div>
                        </div>
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <span class="text">Chinese</span>
                            </a>
                          </div>
                        </div>
                        <div class="lang-row">
                          <div class="lang-col">
                            <a href="#">
                              <span class="text">Danish</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="visible-md visible-lg nav-visible v-divider">
                    <a href="#" class="search-opener"
                      ><span class="icon icon-search"></span
                    ></a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          <!-- search form -->
          <form class="search-form" action="#">
            <fieldset>
              <a href="#" class="search-opener hidden-md hidden-lg">
                <span class="icon-search"></span>
              </a>
              <div class="search-wrap">
                <a href="#" class="search-opener close">
                  <span class="icon-cross"></span>
                </a>
                <div class="trip-form trip-form-v2 trip-search-main">
                  <div class="trip-form-wrap">
                    <div class="holder">
                      <label>Departing</label>
                      <div class="select-holder">
                        <div
                          id="datepicker"
                          class="input-group date"
                          data-date-format="mm-dd-yyyy"
                        >
                          <input class="form-control" type="text" readonly />
                          <span class="input-group-addon"
                            ><i class="icon-drop"></i
                          ></span>
                        </div>
                      </div>
                    </div>
                    <div class="holder">
                      <label>Returning</label>
                      <div class="select-holder">
                        <div
                          id="datepicker1"
                          class="input-group date"
                          data-date-format="mm-dd-yyyy"
                        >
                          <input class="form-control" type="text" readonly />
                          <span class="input-group-addon"
                            ><i class="icon-drop"></i
                          ></span>
                        </div>
                      </div>
                    </div>
                    <div class="holder">
                      <label for="select-region">Select Region</label>
                      <div class="select-holder">
                        <select
                          class="trip-select trip-select-v2 region"
                          name="region"
                          id="select-region"
                        >
                          <option value="select">Africa</option>
                          <option value="select">Arctic</option>
                          <option value="select">Asia</option>
                          <option value="select">Europe</option>
                          <option value="select">Oceanaia</option>
                          <option value="select">Polar</option>
                        </select>
                      </div>
                    </div>
                    <div class="holder">
                      <label for="select-activity">Select Activity</label>
                      <div class="select-holder">
                        <select
                          class="trip-select trip-select-v2 acitvity"
                          name="activity"
                          id="select-activity"
                        >
                          <option value="Holiday Type">Holiday Type</option>
                          <option value="Holiday Type">Beach Holidays</option>
                          <option value="Holiday Type">Weekend Trips</option>
                          <option value="Holiday Type">Summer and Sun</option>
                          <option value="Holiday Type">Water Sports</option>
                          <option value="Holiday Type">Scuba Diving</option>
                        </select>
                      </div>
                    </div>
                    <div class="holder">
                      <label for="price-range">Price Range</label>
                      <div class="select-holder">
                        <select
                          class="trip-select trip-select-v2 price"
                          name="activity"
                          id="price-range"
                        >
                          <option value="Price Range">Price Range</option>
                          <option value="Price Range">$1 - $499</option>
                          <option value="Price Range">$500 - $999</option>
                          <option value="Price Range">$1000 - $1499</option>
                          <option value="Price Range">$1500 - $2999</option>
                          <option value="Price Range">$3000+</option>
                        </select>
                      </div>
                    </div>
                    <div class="holder">
                      <button class="btn btn-trip btn-trip-v2" type="submit">
                        Find Tours
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </header>
        <!-- main banner -->
        <section
          class="banner banner-inner parallax"
          data-stellar-background-ratio="0.5"
          id="blog-default"
        >
          <div class="banner-text">
            <div class="center-text">
              <div class="container">
                <h1>THE TRAVEL BLOG</h1>
                <strong class="subtitle"
                  >The most detailed and modern Adventure theme!</strong
                >
                <!-- breadcrumb -->
                <nav class="breadcrumbs">
                  <ul>
                    <li><a href="/">HOME</a></li>
                    <li><span>Blog</span></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <!-- main container -->
        <main id="main">
          <div class="content-with-sidebar common-spacing content-left">
            <div class="container">
              <div id="two-columns" class="row">
                <div id="content" class="col-sm-8 col-md-9">
                  <div class="blog-holder">
                    <!-- blog list -->
                    <div class="blog-list list-view">
                     @php
                      function limit_words($string, $word_limit) {
                          $words = explode(' ', $string);

                          if (count($words) > $word_limit) {
                              return implode(' ', array_slice($words, 0, $word_limit)) . '...';
                          }

                          return implode(' ', $words);
                      }
                    @endphp
                    @foreach($news as $item)
                    
                      <article class="article blog-article">
                        
                        <div class="thumbnail">
                          <div class="img-wrap">
                            <img
                                src="{{ asset('storage/'. $item->image) }}"
                                height="240"
                                width="350"
                                alt="image description"
                            />
                          </div>
                          <div class="description">
                            <header class="heading">
                              <h3>
                                <a href="#"
                                  >{{$item->title}}</a
                                >
                              </h3>
                            </header>
                            <p>
                              
                              {{limit_words($item->content, 35)}}
                            </p>
                            <footer class="meta">
                              <div class="footer-sub">
                                <div class="rate-info">{{$item->category_name }}</div>
                                <div class="rate-info">
                                  Kreator: {{$item->created_by}}
                                </div>
                                <div class="comment">
                                  <a href="#">{{$item->created_at}}</a>
                                </div>
                              </div>
                            </footer>
                            <div class="link-view">
                              <a href="{{ route('news.show', ['id' => $item->id]) }}">Pročitaj više</a>
                            </div>
                          </div>
                        </div>
                        
                      </article>
                    
                      @endforeach
                      
                    </div>
                  </div>
                  <!-- pagination wrap -->
                  <nav class="pagination-wrap bg-gray">
                    {{ $news->links('pagination.custom') }}
                   
                  </nav>
                </div>
                <!-- sidebar -->
                <aside id="sidebar" class="col-sm-4 col-md-3 sidebar">
                  <div class="sidebar-holder">
                    <div class="accordion">
                      <div class="accordion-group">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a
                              role="button"
                              data-toggle="collapse"
                              href="#collapse1"
                              aria-expanded="true"
                              aria-controls="collapse1"
                              >Kategorije</a
                            >
                          </h4>
                        </div>
                        <div
                          id="collapse1"
                          class="panel-collapse collapse in"
                          role="tabpanel"
                        >
                          <div class="panel-body">
                            <ul
                              class="side-list category-side-list hovered-list"
                            >@foreach($count as $category)
                           
                            <li>
                                <a href="{{ route('news.category', ['categoryId' => $category->category_id]) }}">
                           
                                  <span class="text">{{$category->category_name}}</span>
                                  <span class="count">{{$category->news_count }}</span></a
                             
                                </a>
                              </li>
                             @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a
                              role="button"
                              data-toggle="collapse"
                              href="#collapse2"
                              aria-expanded="true"
                              aria-controls="collapse2"
                              >RECENT POSTS</a
                            >
                          </h4>
                        </div>
                        <div
                          id="collapse2"
                          class="panel-collapse collapse in"
                          role="tabpanel"
                        >
                          <div class="panel-body">
                            <ul class="side-list post-list hovered-list">
                              <li>
                                <a href="#">
                                  <time datetime="2011-06-19"
                                    >14th Jan 2016</time
                                  >
                                  <span class="text-block">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <time datetime="2011-06-19"
                                    >14th Jan 2016</time
                                  >
                                  <span class="text-block">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <time datetime="2011-06-19"
                                    >14th Jan 2016</time
                                  >
                                  <span class="text-block">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed
                                  </span>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a
                              role="button"
                              data-toggle="collapse"
                              href="#collapse3"
                              aria-expanded="true"
                              aria-controls="collapse3"
                              >TAGS</a
                            >
                          </h4>
                        </div>
                        <div
                          id="collapse3"
                          class="panel-collapse collapse in"
                          role="tabpanel"
                        >
                          <div class="panel-body">
                            <ul class="side-list horizontal-list hovered-list">
                              <li>
                                <a href="#">
                                  <span class="icon-beach"></span>
                                  <span class="popup"> beach </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <span class="icon-jungle"></span>
                                  <span class="popup"> jungle </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <span class="icon-desert"></span>
                                  <span class="popup"> desert </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <span class="icon-mountain"></span>
                                  <span class="popup"> mountain </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <span class="icon-rural"></span>
                                  <span class="popup"> rural </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <span class="icon-urban"></span>
                                  <span class="popup"> urban </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <span class="icon-snow-ice"></span>
                                  <span class="popup"> snow ice </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <span class="icon-water-sea"></span>
                                  <span class="popup"> water </span>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a
                              role="button"
                              data-toggle="collapse"
                              href="#collapse4"
                              aria-expanded="true"
                              aria-controls="collapse4"
                              >GALLERY</a
                            >
                          </h4>
                        </div>
                        <div
                          id="collapse4"
                          class="panel-collapse collapse in"
                          role="tabpanel"
                        >
                          <div class="panel-body">
                            <ul
                              class="side-list gallery-side-list horizontal-list"
                            >
                              <li>
                                <a href="#">
                                  <img
                                    src="img/blog/thumb-01.jpg"
                                    height="60"
                                    width="60"
                                    alt="image description"
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="img/blog/thumb-02.jpg"
                                    height="60"
                                    width="60"
                                    alt="image description"
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="img/blog/thumb-03.jpg"
                                    height="60"
                                    width="60"
                                    alt="image description"
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="img/blog/thumb-04.jpg"
                                    height="60"
                                    width="60"
                                    alt="image description"
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="img/blog/thumb-05.jpg"
                                    height="60"
                                    width="60"
                                    alt="image description"
                                  />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img
                                    src="img/blog/thumb-06.jpg"
                                    height="60"
                                    width="60"
                                    alt="image description"
                                  />
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a
                              role="button"
                              data-toggle="collapse"
                              href="#collapse5"
                              aria-expanded="true"
                              aria-controls="collapse5"
                              >SUBSCRIBE</a
                            >
                          </h4>
                        </div>
                        <div
                          id="collapse5"
                          class="panel-collapse collapse in"
                          role="tabpanel"
                        >
                          <div class="panel-body">
                            <form class="subscribe-form">
                              <fieldset>
                                <div class="form-group">
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Full Name"
                                  />
                                </div>
                                <div class="form-group">
                                  <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email Address"
                                  />
                                </div>
                                <div class="form-group">
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Local Town"
                                  />
                                </div>
                                <div class="btn-holder">
                                  <button type="submit" class="btn btn-default">
                                    SUBSCRIBE
                                  </button>
                                </div>
                              </fieldset>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a
                              role="button"
                              data-toggle="collapse"
                              href="#collapse6"
                              aria-expanded="true"
                              aria-controls="collapse6"
                              >community poll</a
                            >
                          </h4>
                        </div>
                        <div
                          id="collapse6"
                          class="panel-collapse collapse in"
                          role="tabpanel"
                        >
                          <div class="panel-body">
                            <strong class="title"
                              >What shoes do your prefer on hiking
                              trips?</strong
                            >
                            <ul class="side-list check-list">
                              <li>
                                <label for="check1" class="custom-checkbox">
                                  <input id="check1" type="checkbox" />
                                  <span class="check-input"></span>
                                  <span class="check-label">Hiking Boots</span>
                                </label>
                              </li>
                              <li>
                                <label for="check2" class="custom-checkbox">
                                  <input id="check2" type="checkbox" />
                                  <span class="check-input"></span>
                                  <span class="check-label"
                                    >Sleeping Shoes</span
                                  >
                                </label>
                              </li>
                              <li>
                                <label for="check3" class="custom-checkbox">
                                  <input id="check3" type="checkbox" />
                                  <span class="check-input"></span>
                                  <span class="check-label">Riding Shoes</span>
                                </label>
                              </li>
                              <li>
                                <label for="check4" class="custom-checkbox">
                                  <input id="check4" type="checkbox" />
                                  <span class="check-input"></span>
                                  <span class="check-label">Golf Shoes</span>
                                </label>
                              </li>
                              <li>
                                <label for="check5" class="custom-checkbox">
                                  <input id="check5" type="checkbox" />
                                  <span class="check-input"></span>
                                  <span class="check-label"
                                    >No Shoes at All</span
                                  >
                                </label>
                              </li>
                            </ul>
                            <strong class="sub-link"
                              ><a href="#">VOTE</a></strong
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </aside>
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- main footer -->
      <footer id="footer">
        <div class="container">
          <!-- newsletter form -->
          <form
            action="php/subscribe.html"
            id="signup"
            method="post"
            class="newsletter-form"
          >
            <fieldset>
              <div class="input-holder">
                <input
                  type="email"
                  class="form-control"
                  placeholder="Email Address"
                  name="subscriber_email"
                  id="subscriber_email"
                />
                <input type="submit" value="GO" />
              </div>
              <span class="info" id="subscribe_message"
                >To receive news, updates and tour packages via email.</span
              >
            </fieldset>
          </form>
          <!-- footer links -->
          <div class="row footer-holder">
            <nav class="col-sm-4 col-lg-2 footer-nav active">
              <h3>About Entrada</h3>
              <ul class="slide">
                <li><a href="#">The Company</a></li>
                <li><a href="#">Our Values</a></li>
                <li><a href="#">Responsiblity</a></li>
                <li><a href="#">Our Mission</a></li>
                <li><a href="#">Opportunity</a></li>
                <li><a href="#">Safety Concerns</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>Destinations</h3>
              <ul class="slide">
                <li><a href="#">Nepal</a></li>
                <li><a href="#">Thailand</a></li>
                <li><a href="#">Vietnam</a></li>
                <li><a href="#">Fiji Island</a></li>
                <li><a href="#">United States</a></li>
                <li><a href="#">Australia</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>themes</h3>
              <ul class="slide">
                <li><a href="#">Hiking and Camping</a></li>
                <li><a href="#">Trekking Tours</a></li>
                <li><a href="#">Jungle Safaris</a></li>
                <li><a href="#">Bungee Jumping</a></li>
                <li><a href="#">Wildlife &amp; Polar</a></li>
                <li><a href="#">Peak Climbing</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>reservation</h3>
              <ul class="slide">
                <li><a href="#">Booking Conditions</a></li>
                <li><a href="#">My Bookings</a></li>
                <li><a href="#">Refund Policy</a></li>
                <li><a href="#">Includes &amp; Excludes</a></li>
                <li><a href="#">Your Responsibilities</a></li>
                <li><a href="#">Order a Brochure</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav">
              <h3>ask Entrada</h3>
              <ul class="slide">
                <li><a href="#">Why Entrada?</a></li>
                <li><a href="#">Ask an Expert</a></li>
                <li><a href="#">Safety Updates</a></li>
                <li><a href="#">We Help When...</a></li>
                <li><a href="#">Personal Matters</a></li>
              </ul>
            </nav>
            <nav class="col-sm-4 col-lg-2 footer-nav last">
              <h3>contact Entrada</h3>
              <ul class="slide address-block">
                <li class="wrap-text">
                  <span class="icon-tel"></span>
                  <a href="tel:02072077878">(020) 72077878</a>
                </li>
                <li class="wrap-text">
                  <span class="icon-fax"></span>
                  <a href="tel:02088828282">(020) 88828282</a>
                </li>
                <li class="wrap-text">
                  <span class="icon-email"></span>
                  <a href="mailto:info@entrada.com">info@entrada.com</a>
                </li>
                <li>
                  <span class="icon-home"></span>
                  <address>707 London Road Isleworth, Middx TW7 7QD</address>
                </li>
              </ul>
            </nav>
          </div>
          <!-- social wrap -->
          <ul class="social-wrap">
            <li class="facebook">
              <a href="#">
                <span class="icon-facebook"></span>
                <strong class="txt">Like Us</strong>
              </a>
            </li>
            <li class="twitter">
              <a href="#">
                <span class="icon-twitter"></span>
                <strong class="txt">Follow On</strong>
              </a>
            </li>
            <li class="google-plus">
              <a href="#">
                <span class="icon-google-plus"></span>
                <strong class="txt">+1 On Google</strong>
              </a>
            </li>
            <li class="vimeo">
              <a href="#">
                <span class="icon-vimeo"></span>
                <strong class="txt">Share At</strong>
              </a>
            </li>
            <li class="pin">
              <a href="#">
                <span class="icon-pin"></span>
                <strong class="txt">Pin It</strong>
              </a>
            </li>
            <li class="dribble">
              <a href="#">
                <span class="icon-dribble"></span>
                <strong class="txt">Dribbble</strong>
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-bottom">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <!-- copyright -->
                <strong class="copyright"
                  ><i class="fa fa-copyright"></i> Copyright 2016 - Entrada - An
                  Adventure Theme - by <a href="#">Waituk</a></strong
                >
              </div>
              <div class="col-lg-6">
                <ul class="payment-option">
                  <li>
                    <img src="img/footer/visa.png" alt="visa" />
                  </li>
                  <li>
                    <img
                      src="img/footer/mastercard.png"
                      height="20"
                      width="33"
                      alt="master card"
                    />
                  </li>
                  <li>
                    <img
                      src="img/footer/paypal.png"
                      height="20"
                      width="72"
                      alt="paypal"
                    />
                  </li>
                  <li>
                    <img
                      src="img/footer/maestro.png"
                      height="20"
                      width="33"
                      alt="maestro"
                    />
                  </li>
                  <li>
                    <img
                      src="img/footer/bank-transfer.png"
                      height="20"
                      width="55"
                      alt="bank transfer"
                    />
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- scroll to top -->
    <div class="scroll-holder text-center">
      <a href="javascript:" id="scroll-to-top"
        ><i class="icon-arrow-down"></i
      ></a>
    </div>
    <!-- jquery library -->
    <script src="vendors/jquery/jquery-2.1.4.min.js"></script>
    <!-- external scripts -->
    <script src="vendors/bootstrap/javascripts/bootstrap.min.js"></script>
    <script src="vendors/jquery-placeholder/jquery.placeholder.min.js"></script>
    <script src="vendors/match-height/jquery.matchHeight.js"></script>
    <script src="vendors/wow/wow.min.js"></script>
    <script src="vendors/stellar/jquery.stellar.min.js"></script>
    <script src="vendors/validate/jquery.validate.js"></script>
    <script src="vendors/waypoint/waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.min.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendors/jQuery-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="vendors/fancybox/jquery.fancybox.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/jcf/js/jcf.js"></script>
    <script src="vendors/jcf/js/jcf.select.js"></script>
    <script src="vendors/retina/retina.min.js"></script>
    <script src="vendors/bootstrap-datetimepicker-master/dist/js/bootstrap-datepicker.js"></script>
    <!-- mailchimp newsletter subscriber -->
    <script src="js/mailchimp.js"></script>
    <!-- custom script -->
    <script src="js/jquery.main.js"></script>
  </body>
</html>
