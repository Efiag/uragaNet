<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout - WALIN COFFEE</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css" />
  <script src="https://unpkg.com/scrollreveal"></script>
  <style>
    .checkout-products {
      margin: 20px auto;
      width: 80%;
      max-width: 1000px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 20px;
    }
    .checkout-product-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 10px;
      text-align: center;
    }
    .checkout-product-card img {
      width: 100%;
      border-radius: 8px;
    }
    .checkout-product-card h4 {
      font-size: 16px;
      margin-top: 10px;
    }
    .checkout-product-card p {
      font-size: 14px;
      color: #333;
    }
  </style>
</head>
<body>

<header>
  <div class="logo">
    <img src="image/Uraga.png" alt="Uraganet Coffee Logo" />
  </div>
  <nav class="navbar">
      <div class="nav-links">
          <a href="home.php">Home</a>
          <a href="about.php">About</a>
          <a href="getproduct.php">Our Product</a>
          <a href="getproduct.php">Get Sample</a>
          <a href="gallery.php">Gallery</a>
          <a href="contact.php">Contact</a>
      </div>
      </nav>
  <div class="icon">
  <i class='bx bx-cart-download'><span>(<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</span>
</i>

    <div class="cart-icon">
      <i class='bx bx-menu menu-icon' onclick="toggleMenu()"></i>
    </div>
  </div>
</header>



<!-- Billing Form -->
<div class="checkout-form">
  <h2>Billing Details</h2>
  <form action="place_order.php" method="POST">
    <div class="row">
      <div class="form-group">
        <label>First Name <span>*</span></label>
        <input type="text" name="first_name" required>
      </div>
      <div class="form-group">
        <label>Last Name <span>*</span></label>
        <input type="text" name="last_name" required>
      </div>
    </div>

    <div class="form-group">
      <label>Company Name (optional)</label>
      <input type="text" name="company">
    </div>

    <div class="form-group">
      <label>Country / Region <span>*</span></label>
      <select name="country" required>
        <option value="">Select a country...</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Afghanistan">Afghanistan</option>
  <option value="Albania">Albania</option>
  <option value="Algeria">Algeria</option>
  <option value="Andorra">Andorra</option>
  <option value="Angola">Angola</option>
  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
  <option value="Argentina">Argentina</option>
  <option value="Armenia">Armenia</option>
  <option value="Australia">Australia</option>
  <option value="Austria">Austria</option>
  <option value="Azerbaijan">Azerbaijan</option>
  <option value="Bahamas">Bahamas</option>
  <option value="Bahrain">Bahrain</option>
  <option value="Bangladesh">Bangladesh</option>
  <option value="Barbados">Barbados</option>
  <option value="Belarus">Belarus</option>
  <option value="Belgium">Belgium</option>
  <option value="Belize">Belize</option>
  <option value="Benin">Benin</option>
  <option value="Bhutan">Bhutan</option>
  <option value="Bolivia">Bolivia</option>
  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
  <option value="Botswana">Botswana</option>
  <option value="Brazil">Brazil</option>
  <option value="Brunei">Brunei</option>
  <option value="Bulgaria">Bulgaria</option>
  <option value="Burkina Faso">Burkina Faso</option>
  <option value="Burundi">Burundi</option>
  <option value="Cabo Verde">Cabo Verde</option>
  <option value="Cambodia">Cambodia</option>
  <option value="Cameroon">Cameroon</option>
  <option value="Canada">Canada</option>
  <option value="Central African Republic">Central African Republic</option>
  <option value="Chad">Chad</option>
  <option value="Chile">Chile</option>
  <option value="China">China</option>
  <option value="Colombia">Colombia</option>
  <option value="Comoros">Comoros</option>
  <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
  <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
  <option value="Costa Rica">Costa Rica</option>
  <option value="Croatia">Croatia</option>
  <option value="Cuba">Cuba</option>
  <option value="Cyprus">Cyprus</option>
  <option value="Czech Republic">Czech Republic</option>
  <option value="Denmark">Denmark</option>
  <option value="Djibouti">Djibouti</option>
  <option value="Dominica">Dominica</option>
  <option value="Dominican Republic">Dominican Republic</option>
  <option value="Ecuador">Ecuador</option>
  <option value="Egypt">Egypt</option>
  <option value="El Salvador">El Salvador</option>
  <option value="Equatorial Guinea">Equatorial Guinea</option>
  <option value="Eritrea">Eritrea</option>
  <option value="Estonia">Estonia</option>
  <option value="Eswatini">Eswatini</option>
  <option value="Ethiopia">Ethiopia</option>
  <option value="Finland">Finland</option>
  <option value="France">France</option>
  <option value="Gabon">Gabon</option>
  <option value="Gambia">Gambia</option>
  <option value="Georgia">Georgia</option>
  <option value="Germany">Germany</option>
  <option value="Ghana">Ghana</option>
  <option value="Greece">Greece</option>
  <option value="Grenada">Grenada</option>
  <option value="Guatemala">Guatemala</option>
  <option value="Guinea">Guinea</option>
  <option value="Guinea-Bissau">Guinea-Bissau</option>
  <option value="Guyana">Guyana</option>
  <option value="Haiti">Haiti</option>
  <option value="Honduras">Honduras</option>
  <option value="Hungary">Hungary</option>
  <option value="Iceland">Iceland</option>
  <option value="India">India</option>
  <option value="Indonesia">Indonesia</option>
  <option value="Iran">Iran</option>
  <option value="Iraq">Iraq</option>
  <option value="Ireland">Ireland</option>
  <option value="Israel">Israel</option>
  <option value="Italy">Italy</option>
  <option value="Ivory Coast">Ivory Coast</option>
  <option value="Jamaica">Jamaica</option>
  <option value="Japan">Japan</option>
  <option value="Jordan">Jordan</option>
  <option value="Kazakhstan">Kazakhstan</option>
  <option value="Kenya">Kenya</option>
  <option value="Kiribati">Kiribati</option>
  <option value="Kuwait">Kuwait</option>
  <option value="Kyrgyzstan">Kyrgyzstan</option>
  <option value="Laos">Laos</option>
  <option value="Latvia">Latvia</option>
  <option value="Lebanon">Lebanon</option>
  <option value="Lesotho">Lesotho</option>
  <option value="Liberia">Liberia</option>
  <option value="Libya">Libya</option>
  <option value="Liechtenstein">Liechtenstein</option>
  <option value="Lithuania">Lithuania</option>
  <option value="Luxembourg">Luxembourg</option>
  <option value="Madagascar">Madagascar</option>
  <option value="Malawi">Malawi</option>
  <option value="Malaysia">Malaysia</option>
  <option value="Maldives">Maldives</option>
  <option value="Mali">Mali</option>
  <option value="Malta">Malta</option>
  <option value="Mauritania">Mauritania</option>
  <option value="Mauritius">Mauritius</option>
  <option value="Mexico">Mexico</option>
  <option value="Moldova">Moldova</option>
  <option value="Monaco">Monaco</option>
  <option value="Mongolia">Mongolia</option>
  <option value="Montenegro">Montenegro</option>
  <option value="Morocco">Morocco</option>
  <option value="Mozambique">Mozambique</option>
  <option value="Myanmar">Myanmar</option>
  <option value="Namibia">Namibia</option>
  <option value="Nepal">Nepal</option>
  <option value="Netherlands">Netherlands</option>
  <option value="New Zealand">New Zealand</option>
  <option value="Nicaragua">Nicaragua</option>
  <option value="Niger">Niger</option>
  <option value="Nigeria">Nigeria</option>
  <option value="North Korea">North Korea</option>
  <option value="North Macedonia">North Macedonia</option>
  <option value="Norway">Norway</option>
  <option value="Oman">Oman</option>
  <option value="Pakistan">Pakistan</option>
  <option value="Palestine">Palestine</option>
  <option value="Panama">Panama</option>
  <option value="Papua New Guinea">Papua New Guinea</option>
  <option value="Paraguay">Paraguay</option>
  <option value="Peru">Peru</option>
  <option value="Philippines">Philippines</option>
  <option value="Poland">Poland</option>
  <option value="Portugal">Portugal</option>
  <option value="Qatar">Qatar</option>
  <option value="Romania">Romania</option>
  <option value="Russia">Russia</option>
  <option value="Rwanda">Rwanda</option>
  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
  <option value="Saint Lucia">Saint Lucia</option>
  <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
  <option value="San Marino">San Marino</option>
  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
  <option value="Saudi Arabia">Saudi Arabia</option>
  <option value="Senegal">Senegal</option>
  <option value="Serbia">Serbia</option>
  <option value="Seychelles">Seychelles</option>
  <option value="Sierra Leone">Sierra Leone</option>
  <option value="Singapore">Singapore</option>
  <option value="Slovakia">Slovakia</option>
  <option value="Slovenia">Slovenia</option>
  <option value="Somalia">Somalia</option>
  <option value="South Africa">South Africa</option>
  <option value="South Korea">South Korea</option>
  <option value="South Sudan">South Sudan</option>
  <option value="Spain">Spain</option>
  <option value="Sri Lanka">Sri Lanka</option>
  <option value="Sudan">Sudan</option>
  <option value="Suriname">Suriname</option>
  <option value="Sweden">Sweden</option>
  <option value="Switzerland">Switzerland</option>
  <option value="Syria">Syria</option>
  <option value="Taiwan">Taiwan</option>
  <option value="Tajikistan">Tajikistan</option>
  <option value="Tanzania">Tanzania</option>
  <option value="Thailand">Thailand</option>
  <option value="Timor-Leste">Timor-Leste</option>
  <option value="Togo">Togo</option>
  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
  <option value="Tunisia">Tunisia</option>
  <option value="Turkey">Turkey</option>
  <option value="Turkmenistan">Turkmenistan</option>
  <option value="Uganda">Uganda</option>
  <option value="Ukraine">Ukraine</option>
  <option value="United Arab Emirates">United Arab Emirates</option>
  <option value="United Kingdom">United Kingdom</option>
  <option value="United States">United States</option>
  <option value="Uruguay">Uruguay</option>
  <option value="Uzbekistan">Uzbekistan</option>
  <option value="Vatican City">Vatican City</option>
  <option value="Venezuela">Venezuela</option>
  <option value="Vietnam">Vietnam</option>
  <option value="Yemen">Yemen</option>
  <option value="Zambia">Zambia</option>
  <option value="Zimbabwe">Zimbabwe</option>
      </select>
    </div>

    <div class="form-group">
      <label>Street Address <span>*</span></label>
      <input type="text" name="address" placeholder="House number and street name" required>
      <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
    </div>

    <div class="form-group">
      <label>Town / City <span>*</span></label>
      <input type="text" name="city" required>
    </div>

    <div class="form-group">
      <label>Postal Code <span>*</span></label>
      <input type="text" name="postal" required>
    </div>

    <div class="form-group">
      <label>Phone <span>*</span></label>
      <input type="text" name="phone" required>
    </div>

    <div class="form-group">
      <label>Email Address <span>*</span></label>
      <input type="email" name="email" required>
    </div>

    <div class="form-group">
      <label>Order Notes (optional)</label>
      <textarea name="notes" placeholder="Notes about your order, e.g., special instructions."></textarea>
    </div>

    <button type="submit" class="checkout-btn">Place Order</button>
  </form>
</div>
<!-- Added Product Summary Section -->
<section class="checkout-summary">
  <h2 style="text-align:center; margin-top: 40px;">Your Selected Samples</h2>
  <?php if (empty($cart)): ?>
    <p style="text-align: center;">No products in cart.</p>
  <?php else: ?>
    <div class="checkout-products">
      <?php foreach ($cart as $item): ?>
        <div class="checkout-product-card">
          <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
          <h4><?= htmlspecialchars($item['name']) ?></h4>
          <p>Price: <?= htmlspecialchars($item['price']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>
<footer class="amazing-footer">
  <div class="footer-container">

    <!-- Logo & Inspiration -->
    <div class="footer-section">
      <img src="image/Uraga.png" alt="UragaNet Logo" class="footer-logo" />
      <p class="inspiration">"Brewing change from seed to cup – every bean tells a story."</p>
    </div>

    <!-- Book a Visit -->
    <div class="footer-section visit">
      <h4><i class='bx bx-calendar'></i> Book a Visit</h4>
      <form>
        <input type="date" name="visit-date" class="visit-date" />
        <button type="submit" class="visit-btn">Reserve</button>
      </form>
    </div>

    <!-- Address -->
    <div class="footer-section">
      <h4><i class='bx bx-map'></i> Address</h4>
      <p>Addis Ababa, Ethiopia</p>
      <p><i class='bx bx-envelope'></i> info@uraganetcoffee.com</p>
      <p><i class='bx bx-phone'></i> +251911593684</p>
    </div>

    <!-- Social Media -->
    <div class="footer-section">
      <h4><i class='bx bx-share-alt'></i> Connect With Us</h4>
      <div class="social-icons">
        <a href="#"><i class='bx bxl-facebook'></i></a>
        <a href="#"><i class='bx bxl-instagram'></i></a>
        <a href="#"><i class='bx bxl-twitter'></i></a>
        <a href="#"><i class='bx bxl-linkedin'></i></a>
      </div>
    </div>

  </div>
  <div class="footer-bottom">
    <p>© 2025 UragaNet Coffee. All rights reserved.</p>
  </div>
</footer>
<script>
    const menuIcon = document.getElementById('menu-icon');
    const navLinks = document.getElementById('nav-links');
  
    menuIcon.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });
  </script>
</body>
</html>
