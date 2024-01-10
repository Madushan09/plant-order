<?php include('partials-front/menu.php'); ?>

    <!-- plant sEARCH Section Starts Here -->
    <section class="Plants-contact text-center">
        <div class="container">
            
        <h1>CONTACT US</h1>

        </div>
    </section>
    <!-- Plant sEARCH Section Ends Here -->

<section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4047218.222696117!2d78.46115940950288!3d7.857178369647221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2593cf65a1e9d%3A0xe13da4b400e2d38c!2sSri%20Lanka!5e0!3m2!1sen!2slk!4v1641653975582!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</section>

<section class="contact-us">
    <div class="row">

        <div class="contact-col">
            <div>
                <i class="fa fa-home"></i>
                <span>
                    <h5>kandy Road, Nature Hub Buliding</h5>
                    <p>  BahirawaKanda IN</P>
                </span>
            </div>
        
            <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h5> +94 711501278</h5>
                    <p>  Monday to saturday,10AM  to  6PM</P>
                </span>
            </div>
            <div>
                <i class="fa fa-envelope-o"></i>
                <span>
                    <h5>info@NatureHub.com</h5>
                    <p>  Email us your Query</P>
                </span>
            </div>
        </div>
        <div class="contact-col">

        <form action="form-hadler.php" method="post">
           <input type="text"name="name" id="name"placeholder="Enter your name"  required>
           <input type="email" name="email"  id="email"placeholder="Enter your Email address"  required>
           <input type="text"name="place"   id="place"placeholder="Enter your Place"  required>
           <textarea  rows="8" name="message"  id="message" placeholder="Your Feedback" required></textarea>
           <button type="submit" value="submit" class="hero-btn red-btn">Send Message</button>
     </form>
        </div>
    </div>
    <br><br><br>
</section>

<?php include('partials-front/footer.php'); ?>