<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Shoping Cart</title>
    <!--<link rel="stylesheet" href="css/less/style.css">-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>

<body>
<div class="wrapper">
    <div class="content">

        <header class="header">
            <div class="header-flex ">
                <div class="header-left">
                    <a class="logo" href="index.php"> <img src="img/logo.png" alt="logo">BRAN<span
                            class="special-D">D</span></a>
                    <form class="form" action="#">
                        <div class="browse"><span class="browse-text">Browse</span><i class="fa fa-caret-down"></i>
                            <div class="browse-mega-box">
                                <div class="browse-mega-flex">
                                    <h3>Women</h3>
                                    <ul class="browse-mega-menu">
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#">Tops</a></li>
                                        <li><a href="#">Sweaters/Knits</a></li>
                                        <li><a href="#">Jackets/Coats</a></li>
                                        <li><a href="#">Blazers</a></li>
                                        <li><a href="#">Denim</a></li>
                                        <li><a href="#">Leggings/Pants</a></li>
                                        <li><a href="#">Skirts/Shorts</a></li>
                                        <li><a href="#">Accessories </a></li>
                                    </ul>
                                    <h3>Men</h3>
                                    <ul class="browse-mega-menu">
                                        <li><a href="#">Tees/Tank tops</a></li>
                                        <li><a href="#"> Shirts/Polos </a></li>
                                        <li><a href="#">Sweaters</a></li>
                                        <li><a href="#">Sweatshirts/Hoodies</a></li>
                                        <li><a href="#">Blazers</a></li>
                                        <li><a href="#">Jackets/vests</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input class="search" type="search" placeholder="Search for Item...">
                        <button class="submit-search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="header-right">
                    <div class="cart-position">
                        <a href="#"><img src="img/cart.svg" alt="cart"> </a>
                        <div class="cart">
                            <div class="goods"><img src="img/Layer_43.jpg" alt="thing">
                                <div class="cart-text">
                                    <p class="name-goods">Rebox Zane</p>
                                    <div class="star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star-half"></i></div>
                                    <p class="price">1&nbsp;x $250</p>
                                </div>
                                <i class="fas fa-times-circle"></i></div>
                            <div class="goods"><img src="img/Layer_44.jpg" alt="thing">
                                <div class="cart-text">
                                    <p class="name-goods">Rebox Zane</p>
                                    <div class="star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star-half"></i></div>
                                    <p class="price">1&nbsp;x $250</p>
                                </div>
                                <i class="fas fa-times-circle"></i></div>
                            <div class="flex-text-between">
                                <p>TOTAL</p>
                                <p>$500.00</p>
                            </div>
                            <div class="checkout"><a class="checkout-text"
                                                     href="checkout.php"><span>Checkout</span></a></div>
                            <div class="go-to-card"><a class="go-to-card-text"
                                                       href="#"><span>Go&nbsp;to&nbsp;cart</span></a></div>
                        </div>
                    </div>
                    <div class="account">
                        <a class="account-text" href="#"> <span>My&nbsp;Account</span><i
                                class="fa fa-caret-down"></i></a>
                    </div>
                </div>
            </div>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">Man</a></li>
                <li><a href="#">Women</a>
                    <div class="mega-box">
                        <div class="mega-flex">
                            <h3>Women</h3>
                            <ul class="mega-menu">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Sweaters/Knits</a></li>
                                <li><a href="#">Jackets/Coats</a></li>
                                <li><a href="#">Blazers</a></li>
                                <li><a href="#">Denim</a></li>
                                <li><a href="#">Leggings/Pants</a></li>
                                <li><a href="#">Skirts/Shorts</a></li>
                                <li><a href="#">Accessories </a></li>
                            </ul>
                        </div>
                        <div class="mega-flex">
                            <h3>Women</h3>
                            <ul class="mega-menu">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Sweaters/Knits</a></li>
                                <li><a href="#">Jackets/Coats</a></li>
                            </ul>
                            <h3>Women</h3>
                            <ul class="mega-menu">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Sweaters/Knits</a></li>
                            </ul>
                        </div>
                        <div class="mega-flex">
                            <h3>Women</h3>
                            <ul class="mega-menu">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Sweaters/Knits</a></li>
                                <li><a href="#">Jackets/Coats</a></li>
                            </ul>
                            <a class="mega-menu-link" href="#"><img src="img/Layer_42.jpg" alt="choose-menu">
                                <p class="mega-menu-text">Super sale!</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">Accoseriese</a></li>
                <li><a href="#">Featured</a></li>
                <li><a href="#">Hot Deals</a></li>
            </ul>
        </nav>
        <div class="breadcrumb">
            <div class="breadcrumb-text">
                <h3>New Arrivals</h3>
                <div class="breadcrumb-link"><a href="index.php">Home</a>/ <a href="#">Men </a>/ <a href="#"><span>New Arrivals</span>
                </a></div>
            </div>
        </div>
        <section class="shoping-cart">
            <div class="product-details">
                <p class="product-details-text">Product Details</p>
                <div class="left-product-details">
                    <p class="product-details-text">unite Price</p>
                    <p class="product-details-text special-position-text-shoping-cart">Quantity</p>
                    <p class="product-details-text">shipping</p>
                    <p class="product-details-text  special-position-text-shoping-cart-subtotal">Subtotal</p>
                    <p class="product-details-text">ACTION</p>

                </div>
            </div>
            <div class="img-product-item">
                <div class="img-info-product">
                    <img src="img/shoping-cart1.jpg" alt="product">
                    <div class="info-description-product">
                        <p class="description-product">Mango People T-shirt</p>
                        <div class="description-product__smal">
                            <p><span class="special-color-shoping-cart">Color:</span> Red</p>
                            <p><span class="special-color-shoping-cart">Size:</span> Xll </p>
                        </div>
                    </div>
                </div>
                <div class="other-info">
                    <p class="price-shoping-cart position-shoping-cart">$150</p>
                    <form action="#">
                        <input class="border-input price-shoping-cart position-input" type="number" min="0" value="2">
                    </form>
                    <p class="price-shoping-cart position-text-p">FREE</p>
                    <p class="price-shoping-cart position-subtoal">$300</p>
                    <i class="fas fa-times-circle positin-action hover-element"></i>
                </div>
            </div>
            <div class="img-product-item">
                <div class="img-info-product">
                    <img src="img/shoping-cart2.jpg" alt="product">
                    <div class="info-description-product">
                        <p class="description-product">Mango People T-shirt</p>
                        <div class="description-product__smal">
                            <p><span class="special-color-shoping-cart">Color:</span> Red</p>
                            <p><span class="special-color-shoping-cart">Size:</span> Xll </p>
                        </div>
                    </div>
                </div>
                <div class="other-info">
                    <p class="price-shoping-cart position-shoping-cart">$150</p>
                    <form action="#">
                        <input class="border-input price-shoping-cart position-input" type="number" min="0" value="2">
                    </form>
                    <p class="price-shoping-cart position-text-p">FREE</p>
                    <p class="price-shoping-cart position-subtoal">$300</p>
                    <i class="fas fa-times-circle positin-action hover-element"></i>
                </div>
            </div>
            <div class="img-product-item">
                <div class="img-info-product">
                    <img src="img/shoping-cart3.jpg" alt="product">
                    <div class="info-description-product">
                        <p class="description-product">Mango People T-shirt</p>
                        <div class="description-product__smal">
                            <p><span class="special-color-shoping-cart">Color:</span> Red</p>
                            <p><span class="special-color-shoping-cart">Size:</span> Xll </p>
                        </div>
                    </div>
                </div>
                <div class="other-info">
                    <p class="price-shoping-cart position-shoping-cart">$150</p>
                    <form action="#">
                        <input class="border-input price-shoping-cart position-input" type="number" min="0" value="2">
                    </form>
                    <p class="price-shoping-cart position-text-p">FREE</p>
                    <p class="price-shoping-cart position-subtoal">$300</p>
                    <i class="fas fa-times-circle positin-action hover-element"></i>
                </div>
            </div>
            <div class="button-shoping-cart">
                <a href="#" class="button-text-grey">cLEAR SHOPPING CART</a>
                <a href="#" class="button-text-grey">cONTINUE sHOPPING</a>
            </div>
        </section>

        <section class="addres-discount-check">
            <div class="shipping-addres">
                <h3 class="text-in-addres-discount-check">Shipping Adress</h3>
                <div class="shipping-addres__position">
                    <select class="select addres-style addres-style__width" name="country" id="country">
                        <option value="Bangladesh">
                            Bangladesh
                        </option>
                        <option value="USA">
                            USA
                        </option>
                        <option value="Russia">
                            Russia
                        </option>
                    </select>
                    <form class="special-number position-in-addres" action="#">
                        <input type="text" class="border-input-text text-style-addres-discount-check addres-style"
                               placeholder="State">
                        <input type="number" class="border-input-text text-style-addres-discount-check addres-style "
                               placeholder="Postcode / Zip">
                    </form>
                </div>
                <div class="shipping-addres__position-special">
                    <a href="#" class="button-text-grey style-get-a-quote">get a&nbsp;quote</a></div>
            </div>
            <div class="discount">
                <h3 class="text-in-addres-discount-check">coupon discount</h3>
                <p class="p-style-discount">Enter your coupon code if&nbsp;you have one</p>
                <form class="special-number " action="#">
                    <input type="text" class="border-input-text text-style-addres-discount-check addres-style"
                           placeholder="State">
                </form>
                <div class="discount__position-special">
                    <a href="#" class="button-text-grey style-get-a-quote special-style-coupon">Apply coupon</a>
                </div>
            </div>
            <div class="proccesed-check">
                <div class="position-proccesed-check">
                    <p class="p-in-proccesed">Sub total <span>$900</span></p>
                    <p class="p-in-grand-total">GRAND TOTAL <span>$900</span></p>
                    <div class="container-for-button">
                        <a href="#" class="button-proccesed-to-checkout">proceed to&nbsp;checkout</a>
                    </div>
                </div>
            </div>

        </section>


    </div>
    <footer class="footer">
        <section class="short-info">
            <div class=" short-info-text">
                <div class="short-info-discription-img"><img src="img/img-face.png" alt="">
                    <div class="short-info-text-discription">
                        <p class="short-info-quote">&laquo;Vestibulum quis porttitor dui! Quisque viverra nunc&nbsp;mi,
                            a&nbsp;pulvinar purus condimentum&nbsp;a. Aliquam condimentum mattis neque sed pretium&raquo;</p>
                        <p class="short-info-name">Bin Burhan</p>
                        <p class="short-info-">Dhaka, Bd</p>
                        <div class="swap">
                            <a class="swap1" href="#"></a>
                            <a class="swap2" href="#"></a>
                            <a class="swap1" href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="subscribe-container">
                    <div class="subscride">
                        <h5>Subscribe</h5>
                        <p>FOR OUR NEWLETTER AND PROMOTION</p>
                    </div>
                    <div class="email-subscribe">
                        <form action="#">
                            <input class="email-subscribe-form" type="email" placeholder="Enter Your Email">
                            <input class="email-button" type="submit" value="Subscribe"></form>
                    </div>
                </div>
            </div>
            <div class="img-backdround"></div>
        </section>
        <div class="footer-info">
            <div class="footer-info1">
                <a class="logo logo-margin-bottom" href="#"> <img src="img/logo.png" alt="logo">BRAN<span
                        class="special-D">D</span></a>
                <div class="footer-text">
                    <p class="p-margin-bottom">Objectively transition extensive data rather than cross functional
                        solutions. Monotonectally syndicate multidisciplinary materials before go&nbsp;forward benefits.
                        Intrinsicly syndicate an&nbsp;expanded array of&nbsp;processes and cross-unit partnerships. </p>
                    <p>Efficiently plagiarize 24/365 action items and focused infomediaries. Distinctively seize
                        superior initiatives for wireless technologies. Dynamically optimize. </p>
                    <!--
                                     <p class="p-margin-bottom">Objectively strategize seamless relationships via resource sucking testing procedures. Proactively cultivate next-generation results for value-added methodologies. Dynamically plagiarize unique methodologies after performance based methodologies. Monotonectally empower stand-alone mindshare rather than ubiquitous opportunities. Dynamically orchestrate resource sucking scenarios after alternative synergy.</p>

                                     <p>Compellingly envisioneer corporate methods of empowerment before standards compliant technologies. Objectively facilitate progressive.</p>
                    -->
                </div>
            </div>
            <div class="company">
                <h6 class="footer-h6">COMPANY</h6>
                <ul class="choose">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">How It&nbsp;Works</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="information">
                <h6 class="footer-h6">INFORMATION</h6>
                <ul class="choose">
                    <li><a href="#">Tearms &amp;&nbsp;Condition</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">How to&nbsp;Buy</a></li>
                    <li><a href="#">How to&nbsp;Sell</a></li>
                    <li><a href="#">Promotion</a></li>
                </ul>
            </div>
            <div class="shop-category">
                <h6 class="footer-h6">SHOP CATEGORY</h6>
                <ul class="choose">
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Child</a></li>
                    <li><a href="#">Apparel</a></li>
                    <li><a href="#">Brows All</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="footer-copyright-text">
                <div class="copyright">
                    <p>&copy;&nbsp;2017 Brand All Rights Reserved.</p>
                </div>
                <div class="social-site">
                    <a href="#">
                        <div class="icon"><i class="fab fa-facebook-f"></i></div>
                    </a>
                    <a href="#">
                        <div class="icon"><i class="fab fa-twitter"></i></div>
                    </a>
                    <a href="#">
                        <div class="icon"><i class="fab fa-linkedin-in"></i></div>
                    </a>
                    <a href="#">
                        <div class="icon"><i class="fab fa-pinterest-p"></i></div>
                    </a>
                    <a href="#">
                        <div class="icon"><i class="fab fa-google-plus-g"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>

</html>