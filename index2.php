<!DOCTYPE html> <!-- The new doctype -->
<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Coding A CSS3 &amp; HTML5 One Page Template | Tutorialzine demo</title>
        
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        
        <!-- Internet Explorer HTML5 enabling code: -->
        
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        
        <style type="text/css">
        .clear {
          zoom: 1;
          display: block;
        }
        </style>

        
        <![endif]-->
        
    </head>
    
    <body>
    	
    	<section id="page"> <!-- Defining the #page section with the section tag -->
    
            <header> <!-- Defining the header section of the page with the appropriate tag -->
            
                <hgroup>
                    <h1>Your Logo</h1>
                    <h3>and a fancy slogan</h3>
                </hgroup>
                                
                <nav> <!-- The nav link semantically marks your main site navigation -->
                    <ul>
                        <li><a href="#article1">Photoshoot</a></li>
                        <li><a href="#article2">Sweet Tabs</a></li>
                        <li><a href="#article3">Navigation Menu</a></li>
                    </ul>
                </nav>
            
            </header>
            
            <section id="articles"> <!-- A new section with the articles -->

				<!-- Article 1 start -->

                <div class="line"></div>  <!-- Dividing line -->
                
                <article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
                    <h2>Photoshoot Effect</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    
                    	<figure> <!-- The figure tag marks data (usually an image) that is part of the article -->
	                    	<a href="http://tutorialzine.com/2010/02/photo-shoot-css-jquery/"><img src="http://tutorialzine.com/img/featured/641.jpg" width="620" height="340" /></a>
                        </figure>
                        
                        <p>In this tutorial, we are creating a photo shoot effect with our just-released PhotoShoot jQuery plug-in. With it you can convert a regular div on the page into a photo shooting stage simulating a camera-like feel.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus quam quis nibh fringilla sit amet consectetur lectus malesuada. Sed nec libero erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mi nisi, rhoncus ut vestibulum ac, sollicitudin quis lorem. Duis felis dui, vulputate nec adipiscing nec, interdum vel tortor. Sed gravida, erat nec rutrum tincidunt, metus mauris imperdiet nunc, et elementum tortor nunc at eros. Donec malesuada congue molestie. Suspendisse potenti. Vestibulum cursus congue sem et feugiat. Morbi quis elit odio. </p>
                    </div>
                </article>
                
				<!-- Article 1 end -->


				<!-- Article 2 start -->

                <div class="line"></div>
                
                <article id="article2">
                    <h2>Sweet AJAX Tabs</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    	<figure>
	                    	<a href="http://tutorialzine.com/2010/01/sweet-tabs-jquery-ajax-css/"><img src="http://tutorialzine.com/img/featured/633.jpg" width="620" height="340" /></a>
                        </figure>
                        
                        <p>Here we are making sweet AJAX-powered tabs with CSS3 and the newly released version 1.4 of jQuery.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus quam quis nibh fringilla sit amet consectetur lectus malesuada. Sed nec libero erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mi nisi, rhoncus ut vestibulum ac, sollicitudin quis lorem. Duis felis dui, vulputate nec adipiscing nec, interdum vel tortor. Sed gravida, erat nec rutrum tincidunt, metus mauris imperdiet nunc, et elementum tortor nunc at eros. Donec malesuada congue molestie. Suspendisse potenti. Vestibulum cursus congue sem et feugiat. Morbi quis elit odio. </p>
                    </div>
                </article>
                
				<!-- Article 2 end -->

				<!-- Article 3 start -->

                <div class="line"></div>
                
                <article id="article3">
                    <h2>Halftone Navigation Menu</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    	<figure>
	                    	<a href="http://tutorialzine.com/2010/01/halftone-navigation-menu-jquery-css/"><img src="http://tutorialzine.com/img/featured/610.jpg" width="620" height="340" /></a>
                        </figure>
                        
                        <p>Today we are making a CSS3 & jQuery halftone-style navigation menu, which will allow you to display animated halftone-style shapes in accordance with the navigation links, and will provide a simple editor for creating additional shapes as well.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus quam quis nibh fringilla sit amet consectetur lectus malesuada. Sed nec libero erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mi nisi, rhoncus ut vestibulum ac, sollicitudin quis lorem. Duis felis dui, vulputate nec adipiscing nec, interdum vel tortor. Sed gravida, erat nec rutrum tincidunt, metus mauris imperdiet nunc, et elementum tortor nunc at eros. Donec malesuada congue molestie. Suspendisse potenti. Vestibulum cursus congue sem et feugiat. Morbi quis elit odio. </p>
                    </div>
                </article>
                
				<!-- Article 3 end -->


            </section>

        <footer> <!-- Marking the footer section -->

           <div class="line"></div>
           
           <p>Copyright 2010 - YourSite.com</p> <!-- Change the copyright notice -->
           
           <a href="#" class="up">Go UP</a>
           <a href="http://tutorialzine.com/2010/02/html5-css3-website-template/" class="by">Template by Tutorialzine</a>
           

        </footer>
            
		</section> <!-- Closing the #page section -->
        
        <!-- JavaScript Includes -->
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script src="jquery.scrollTo-1.4.2/jquery.scrollTo-min.js"></script>
        <script src="script.js"></script>
    </body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>