<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Footer Styles */
        footer {
            background-color: #000000;
            color: #fff;
            padding: 40px 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            gap: 20px;
        }

        .footer-column {
            flex: 1;
            min-width: 250px;
        }

        .footer-column h4 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #13e644;
        }

        .footer-column p,
        .footer-column ul {
            line-height: 1.6;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column ul li a:hover {
            color: #2ce958;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons li {
            list-style: none;
        }

        .social-icons li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            font-size: 14px;
            border-top: 1px solid #444;
            margin-top: 20px;
        }

        .footer-bottom p {
            margin: 0;
        }
        
        .socialIcon{
            height: 40px;
            width: 40px;
        }

       

        /* Responsive Styles */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-column {
                margin-bottom: 30px;
            }
        }
    </style>
</head>

<body>
    <footer>
        <div class="footer-container">
            <div class="footer-column about-us">
                <h4>About Us</h4>
                <p>Atlas is a leading e-commerce platform offering a wide range of products including electronics, fashion, and more. Our mission is to provide a seamless shopping experience with great deals and fast shipping.</p>
            </div>

            <div class="footer-column contact-us">
            <h4>Contact Us</h4>
                <ul>
                    <li>Email: support@atlas.com</li>
                    <li>Phone: +123 456 7890</li>
                    <li>Address: 123 Atlas St, Tech City, TX 75001</li>
                </ul>
            </div>

            <div class="footer-column follow-us">
                <h4>Follow Us</h4>
                <ul class="social-icons">
                   <li><a href="https://github.com/Mukund-Vaghasiya13"><img class="socialIcon" src="../uploads/assets/facebook-brands-solid.svg" alt="facebook" /></a></li>
                   <li><a href="https://github.com/Mukund-Vaghasiya13"><img class="socialIcon" src="../uploads/assets/instagram-brands-solid.svg" alt="instagram" /></a></li>
                   <li><a href="https://github.com/Mukund-Vaghasiya13"><img class="socialIcon" src="../uploads/assets/twitter-brands-solid.svg" alt="twitter" /></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Atlas. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>