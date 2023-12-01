<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "legal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!empty($_GET['search'])) {
  $search = $_GET['search'];
  $sql = "SELECT * FROM `new_lawyer_registration_form` WHERE `Location` LIKE '%$search%' || `full_name` LIKE '%$search%' || `practice_areas` LIKE '%$search%' || `organisation` LIKE '%$search%' ";
} else {
  $sql = "SELECT * FROM `new_lawyer_registration_form`";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="./chatwithlawyer.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mogra:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Microsoft Sans Serif:wght@400&display=swap" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <style>
    .lawyers {
      margin-top: 150px;
      width: 100vw;
      display: grid;
      grid-template-columns: auto auto;
      place-items: center;

    }

    .lawyer-div {
      position: relative;
      border-radius: var(--br-xl);
      background-color: var(--color-whitesmoke);
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      width: 600px;
      height: 160px;
      padding: 2rem 0rem 0rem 1.5rem;
      display: flex;
      margin: 0;
      margin-bottom: 5rem;
    }

    .lawyer-img-div {
      border: 1px solid #5b2c2c;
      border-radius: 50%;
      width: 81px;
      height: 76px;
      margin-right: 2rem;
    }

    .lawyer-img-div img {
      height: 100%;
      width: 100%;
      object-fit: fill;
      border-radius: 50%;
    }

    .lawyer-body {
      height: 100%;
      margin-top: 10px;
      width: calc(100% - 130px);
    }

    .lawyer-body h6 {
      font-size: 22px;
      font-weight: 500;
      font-family: var(--font-mogra);
      margin: 0;
      margin-bottom: 5px;
    }

    .lawyer-body p {
      margin: 0;
      font-size: 16px;
      font-family: var(--font-microsoft-sans-serif);
      text-transform: capitalize;
      line-height: 20px;
    }

    .book-button {
      position: absolute;
      top: calc(100% - 75px);
      left: 40%;
      border: 1px solid var(--color-maroon);
      border-radius: var(--br-xl);
      background-color: var(--color-snow);
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      width: 259px;
      height: 47px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 25px;
      font-weight: 500;
      font-family: var(--font-mogra);
    }

    .book-button a {
      color: black;
      text-decoration: none;
    }

    .alert {
      height: 60px;
      font-size: 20px;
    }
  </style>
</head>

<body>
  <div class="legal-experts">
    <div class="legal-resources-hub">LEGAL RESOURCES HUB</div>
    <div class="legal-experts-child"></div>
    <div class="glossary">Glossary</div>
    <div class="about-us">About us</div>
    <div class="login">Login</div>
    <a class="login" href="userlogin.html">Login</a>
    <div class="home">Home</div>
    <a class="glossary" href="glossary.html">Glossary</a>
    <a class="about-us" href="aboutus.html">About us</a>

    <a class="home" href="index.html">Home</a>

    <img class="image-46-icon" alt="" src="./images/hammer.jpeg" />

    <!-- <div class="legal-experts-item"></div>
      <img class="legal-experts-inner" alt="" src="./images/color img.png" /> -->

    <!-- <a
        class="advocate-shubham-borkar-container"
        href="https://www.linkedin.com/in/shubhamborkar/overlay/about-this-profile/"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">Advocate Shubham Borkar</p>
      </a>
      <div class="exp-7-years">EXP-7 YEARS</div>
      <div class="lawyer-at-r">Lawyer at R K Dewan & Co.</div>
      <a class="exp-7-years" href="aboutpageoflawyer.html"></a>
      <div class="pune-maharashtra-india">Pune, Maharashtra, India</div>
      <img
        class="legal-experts-inner"
        alt=""
        src="./images/color img.png"
        href=""
      />

      <a
        class="advocate-shubham-borkar-container"
        href="https://www.linkedin.com/in/shubhamborkar/overlay/about-this-profile/"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">Advocate Shubham Borkar</p>
      </a>
      <div class="exp-7-years">EXP-7 YEARS</div>
      <div class="lawyer-at-r">Lawyer at R K Dewan & Co.</div>
      <div class="pune-maharashtra-india">Pune, Maharashtra, India</div>
      <div class="book-1"></div>
      <div class="book-consultation">Book Consultation</div>

      <a class="book-consultation" href="bookconsultation.html"></a>
      <a class="book-consultation1" href="bookconsultation.html"></a>
      <a class="book-consultation2" href="bookconsultation.html"></a>
      <a class="book-consultation3" href="bookconsultation.html"></a>
      <a class="book-consultation4" href="bookconsultation.html"></a>
      <a class="book-consultation5" href="bookconsultation.html"></a>
      <a class="book-consultation6" href="bookconsultation.html"></a>
      <a class="book-consultation7" href="bookconsultation.html"></a>
      <a class="book-consultation8" href="bookconsultation.html"></a>
      <a class="book-consultation9" href="bookconsultation.html"></a>

      <div class="rectangle-div"></div>
      <div class="book-2"></div>
      <div class="book-consultation1">Book Consultation</div>

      <a class="book-consultation1" href="bookconsultation.html"></a>
      <div class="legal-experts-child1"></div>
      <div class="book-3"></div>
      <div class="book-consultation2">Book Consultation</div>
      <a class="book-consultation2" href="bookconsultation.html"></a>
      <div class="legal-experts-child2"></div>
      <div class="exp-7-years2">EXP-7 YEARS</div>
      <div class="lawyer-at-r2">Lawyer at R K Dewan & Co.</div>
      <div class="pune-maharashtra-india2">Pune, Maharashtra, India</div>
      <div class="exp-7-years2">EXP-7 YEARS</div>
      <div class="lawyer-at-r2">Lawyer at R K Dewan & Co.</div>
      <div class="pune-maharashtra-india2">Pune, Maharashtra, India</div>
      <div class="book-4"></div>
      <div class="book-consultation3">Book Consultation</div>
      <a class="book-consultation3" href="bookconsultation.html"></a>
      <div class="exp-10-years">EXP-10 YEARS</div>
      <img class="img-4-icon" alt="" src="./images/color img.png" />

      <a
        class="kushal-mor"
        href="https://www.linkedin.com/in/kushalmor/overlay/about-this-profile/?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base%3ByzTekkgYSl%2B1yi%2F20RlehQ%3D%3D"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">Kushal Mor</p>
      </a>
      <div class="ajay-gautam">
        <p class="advocate-shubham-borkar">Ajay Gautam</p>
        <p class="advocate-shubham-borkar">&nbsp;</p>
      </div>
      <img class="img-3-icon" alt="" src="./images/color img.png" />

      <div class="delhi-india">Delhi, India</div>
      <div class="advocate-supreme-court">
        Advocate Supreme Court of India | Lawyer Supreme Court of India
      </div>
      <div class="legal-experts-child3"></div>
      <div class="book-5"></div>
      <div class="book-consultation4">Book Consultation</div>
      <a class="book-consultation4" href="bookconsultation.html"></a>
      <div class="legal-experts-child4"></div>
      <div class="book-6"></div>
      <div class="book-consultation5">Book Consultation</div>
      <a class="book-consultation5" href="bookconsultation.html"></a>
      <img class="img-5-icon" alt="" src="./images/color img.png" />

      <a
        class="surjendu-sankar-das-container"
        href="https://www.linkedin.com/in/surjendu-sankar-das-aor-a8b831100/overlay/about-this-profile/"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">Surjendu Sankar Das, AOR</p>
      </a>
      <div class="exp-14-years">EXP-14 YEARS</div>
      <div class="advocate-on-record">
        Advocate on Record, Supreme Court; Counsel; Arbitration Practitioner
      </div>
      <div class="delhi-india1">Delhi, India</div>
      <div class="exp-5-years">EXP-5 YEARS</div>
      <a
        class="raman-yadav"
        href="https://www.linkedin.com/in/raman-yadav-9761b6100/overlay/about-this-profile/"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">Raman Yadav</p>
      </a>
      <div class="advocate-at-supreme">Advocate at Supreme Court of India</div>
      <div class="new-delhi-india">New Delhi, India</div>
      <img class="img-6-icon" alt="" src="./images/color img.png" />

      <div class="legal-experts-child5"></div>
      <div class="book-7"></div>
      <div class="book-consultation6">Book Consultation</div>
      <a class="book-consultation6" href="bookconsultation.html"></a>
      <div class="legal-experts-child6"></div>
      <div class="book-8"></div>
      <div class="book-consultation7">Book Consultation</div>
      <a class="book-consultation7" href="bookconsultation.html"></a>
      <div class="exp-20-years">EXP-20 YEARS</div>
      <div class="sukumar-advocate-supreme-container">
        <p class="advocate-shubham-borkar">
          <a
            class="sukumar-advocate-supreme-cou1"
            href="https://www.linkedin.com/in/sukumar-advocate-supreme-court-of-india-1b086421/overlay/about-this-profile/"
            target="_blank"
          >
            <span class="sukumar-advocate-supreme"
              >Sukumar, Advocate .Supreme Court of India</span
            >
          </a>
        </p>
        <p class="advocate-shubham-borkar">&nbsp;</p>
      </div>
      <div class="exp-25-years">EXP-25 YEARS</div>
      <a
        class="rsevvilam-parithi-ramalingam-container"
        href="https://www.linkedin.com/in/r-sevvilam-parithi-ramalingam-547280129/overlay/about-this-profile/"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">R.Sevvilam Parithi Ramalingam</p>
      </a>
      <div class="advocate-at-ailc-all">
        ADVOCATE at AILC-ALL INDIA LAWYERS COUNCIL NEW DELHI
      </div>
      <div class="tamil-nadu-india">Tamil Nadu, India</div>
      <div class="delhi-india2">Delhi, India</div>
      <img class="img-7-icon" alt="" src="./images/color img.png" />

      <img class="img-8-icon" alt="" src="./images/color img.png" />

      <a
        class="rahul-shyam-bhandari-container"
        href="https://www.linkedin.com/in/rahul-bhandarishyam/overlay/about-this-profile/"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">Rahul Shyam Bhandari</p>
      </a>
      <div class="img2"></div>
      <div class="advocate-on-record1">
        Advocate- On- Record at Supreme Court of India
      </div>
      <div class="delhi-india3">Delhi, India</div>
      <div class="exp-5-years1">EXP-5 YEARS</div>
      <div class="legal-experts-child7"></div>
      <div class="book-9"></div>
      <div class="book-consultation8">Book Consultation</div>
      <a class="book-consultation8" href="bookconsultation.html"></a>
      <div class="legal-experts-child8"></div>
      <div class="book-10"></div>
      <div class="book-consultation9">Book Consultation</div>
      <a class="book-consultation9" href="bookconsultation.html"></a>
      <div class="exp-5-years2">EXP-5 YEARS</div>
      <div class="delhi-india4">Delhi, India</div>
      <div class="exp-5-years3">EXP-5 YEARS</div>
      <a
        class="rahul-shyam-bhandari-container1"
        href="https://www.linkedin.com/in/rahul-bhandarishyam/overlay/about-this-profile/"
        target="_blank"
      >
        <p class="advocate-shubham-borkar">Rahul Shyam Bhandari</p>
      </a>
      <div class="advocate-on-record2">
        Advocate- On- Record at Supreme Court of India
      </div>
      <div class="delhi-india5">Delhi, India</div>
      <img class="img-10-icon" alt="" src="./images/color img.png" />

      <div class="ayushi-dwivedi-advocate-container">
        <p class="advocate-shubham-borkar">
          <a
            class="sukumar-advocate-supreme-cou1"
            href="https://www.linkedin.com/in/ayushi-dwivedi-advocate-b43031165/overlay/about-this-profile/"
            target="_blank"
          >
            <span class="sukumar-advocate-supreme"
              >Ayushi Dwivedi (Advocate)</span
            >
          </a>
        </p>
        <p class="advocate-shubham-borkar">&nbsp;</p>
      </div>
      <div class="img-9"></div>
    </div> -->

    <?php if (!empty($_GET['success']) && $_GET['success'] == "true") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong> Your Consultation Booking request sent successfully...
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>

    <div class="lawyers">

      <?php if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
          ?>
          <div class="lawyer-div">
            <div class="lawyer-img-div">
              <img src="./images/profile_images/<?php echo $row['profile_image']; ?>" alt="profile image">
            </div>
            <div class="lawyer-body">
              <h6><?php echo $row['full_name']; ?></h6>
              <p><?php echo $row['Location']; ?></p>
              <p><?php echo $row['practice_areas']; ?></p>
              <p>Exp - <?php echo $row['experience_in_areas'] ?> Years</p>
              <div class="book-button">
                <a href="./bookconsultation.html?id=<?php echo $row['id']; ?>">Book Consultation</a>
              </div>
            </div>
          </div>
        <?php }
      } ?>

    </div>
</body>

</html>