<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrek - Contact Us</title>
    <link rel="stylesheet" href="assests/main/main.css">
</head>
<body>
    <header>
        <?php include 'assests/header-footer/header.php'; ?>
    </header>
    <section class="contact-section">
        <img src="assests/media/Employee.jpg" alt="" class="background">
        <div class="overlay1"></div>
        <div class="contact">
            <div class="contact-content">
                <div class="contact-heading">
                    <h1>Connect With Us</h1>
                    <p>Please fill out the form and one of our team members will be in touch.</p>
                 </div>
                <div class="contact-info">
                    <div class="c-info">
                        <h2>Email Us Directly:</h2>
                        <a href="">ecotrek01@gmail.com</a>
                    </div>
                    <div class="c-info">
                        <h2>Give Us A Call:</h2>
                        <a href="">+91 12345 67890</a>
                    </div>
                    <div class="c-info">
                        <h2>Our Headquarters:</h2>
                        <a href="">1 East Philadelphia Ave Boyertown, PA 19512</a>
                    </div>
                </div>
                <div class="icons">
                    <h2>Follow us on Social Media:</h2>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/" target = "blank"><img src="assests/media/instagram1.png" alt=""></a>
                        <a href="https://www.facebook.com/" target = "blank"><img src="assests/media/facebook1.png" alt=""></a>
                        <a href="https://www.youtube.com/" target = "blank"><img src="assests/media/youtube1.png" alt=""></a>
                        <a href="https://www.twitter.com/" target = "blank"><img src="assests/media/twitter1.png" alt=""></a>
                        <a href="https://www.linkedin.com/" target = "blank"><img src="assests/media/linkedin1.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <h1>How Can We Help You?</h1>
                <p>"<span>*</span>" indicates required fields</p>
                <form action="process_contact.php" method="post">

                    <div class="form-row">
                        <div class="form-group">
                            <label for="first-name">First Name <span>*</span></label>
                            <input type="text" id="first-name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name <span>*</span></label>
                            <input type="text" id="last-name" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="company">Company <span>*</span></label>
                            <input type="text" id="company" name="company" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country <span>*</span></label>
                            <select id="country" name="country" required>
                                <option value="" disabled selected>Select Your Country</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                                <option value="India">India</option>
                                <option value="Canada">Canada</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="message">Description <span>*</span></label>
                        <textarea id="message" name="message" placeholder="Your message..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send Message</button>

                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get("status") === "success") {
                let alertBox = document.createElement("div");
                alertBox.innerText = "Message sent successfully!";
                alertBox.style.position = "fixed";
                alertBox.style.top = "20px";
                alertBox.style.left = "50%";
                alertBox.style.transform = "translateX(-50%)";
                alertBox.style.backgroundColor = "#228B22";
                alertBox.style.color = "white";
                alertBox.style.padding = "15px 25px";
                alertBox.style.borderRadius = "5px";
                alertBox.style.boxShadow = "0 4px 6px rgba(0,0,0,0.1)";
                alertBox.style.zIndex = "1000";
                document.body.appendChild(alertBox);
                setTimeout(() => {
                    alertBox.remove();
                    window.history.replaceState({}, document.title, window.location.pathname); // Remove query param
                }, 3000);
            }
        });
    </script>
    <?php include 'assests/header-footer/footer.php'; ?>
</body>
</html>