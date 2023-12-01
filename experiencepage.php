<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "legal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT * FROM `share_experiences`";
$result = $conn->query($sql);
$experiences = array();
$i = 0;
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $experiences[$i] = $row;
    $case_id = $row['id'];
    $sql2 = "SELECT * FROM `reply_to_experiences` WHERE `case_id` = $case_id ";
    $result2 = $conn->query($sql2);
    $j = 0;
    while ($reply = mysqli_fetch_assoc($result2)) {
      $experiences[$i]['reply'][$j] = $reply['reply'];
      $j++;
    }
    $i++;
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />


  <link rel="stylesheet" href="./experiencepage.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mogra:wght@400&display=swap" />
  <style>
    .experience-page {
      width: 100vw;
    }

    .experience-page h1 {
      font-size: 40px;
      font-weight: 500;
      font-family: var(--font-mogra);
      text-align: center;
    }

    .form-div {
      width: 60%;
      margin: auto;
    }

    .form-div h3 {
      font-size: 28px;
      font-weight: 500;
      font-family: var(--font-mogra);
      margin: 15px;
    }

    .form-div input {
      border: 1px solid var(--color-black);
      background-color: var(--color-gainsboro);
      border-radius: var(--br-xl);
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      box-sizing: border-box;
    }

    .case-title-input {
      width: 100%;
      height: 50px;
    }

    .case-description-input {
      width: 100%;
      height: 150px;
    }

    .submit-button,
    .reply-button {
      border: 1px solid var(--color-black);
      padding: 0;
      margin-top: 15px;
      background-color: var(--color-gainsboro);
      border-radius: var(--br-xl);
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      box-sizing: border-box;
      width: 130px;
      height: 45px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: var(--font-size-6xl);
      font-family: var(--font-mogra);
      cursor: pointer;
    }

    .reply-button {
      margin-bottom: 40px;
    }

    .shared-experience-div {
      width: 60%;
      margin: auto;
    }

    .shared-experience {
      border: 1px solid var(--color-black);
      background-color: var(--color-gainsboro);
      border-radius: var(--br-xl);
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      box-sizing: border-box;
      width: 100%;
      padding: 15px;
    }

    .shared-experience h3 {
      font-family: var(--font-mogra);
      font-size: 20px;
      font-weight: 500;
      margin: 10px 0px;
    }

    .shared-experience p {
      font-family: var(--font-microsoft-sans-serif);
      font-size: 15px;
      font-weight: 500;
      margin: 0;
    }

    .reply-form {

      border-radius: 10px;

      padding-right: 1rem;
    }

    .reply-form input {
      width: 100%;
      border: 1px solid var(--color-black);
      min-height: 35px;
      border-radius: 10px;
      margin-top: 10px;
      padding-left: 10px;

    }
  </style>
</head>

<body>
  <div class="share-your-case-experience" style="height:150px;">
    <div class="legal-resources-hub">LEGAL RESOURCES HUB</div>
    <div class="share-your-case-experience-child"></div>
    <div class="glossary">Glossary</div>
    <div class="about-us">About us</div>
    <div class="login">Login</div>
    <div class="home">Home</div>

    <a class="glossary" href="glossary.html"></a>
    <a class="about-us" href="aboutus.html"></a>
    <a class="login" href="userlogin.html"></a>
    <a class="home" href="index.html"></a>


    <img class="image-46-icon" alt="" src="./images/hammer.jpeg" />
  </div>
  <!-- <div class="share-your-case">Share Your Case Experiences</div>
      <div class="recently-shared-experiences">Recently shared Experiences</div>
      <input
        class="case-titele-box"
        name="Case_title"
        id="case tite box"
        placeholder="Case title"
        type="text"
      />

      <input
        class="case-description-box"
        name="Enter_case_description"
        id="case description box"
        placeholder="Enter case description"
        type="text"
      />

      <input class="recently-shared-box" type="text" />

      <div class="case-title">Case Title :</div>
      <div class="case-description">Case description :</div>
      <button class="post-box" onclick="submit_form();"></button>
      <button class="reply-button-box"></button>
      <div class="post">Post</div>
      <div class="reply">Reply</div>
    </form> -->
  <div class="experience-page">
    <form class="experience-form" id="share-your-case-experience-form" action="./shareexperiences.php" method="post">
      <h1>Share your own Experiences</h1>
      <div class="form-div">
        <h3>Case Title : </h3>
        <input type="text" name="Case_title" placeholder="Case title" class="case-title-input">
        <h3>Case Description : </h3>
        <input type="text" name="Enter_case_description" placeholder="Enter case description"
          class="case-description-input">
        <div class="submit-button" onclick="submit_form();">Post</div>
      </div>
    </form>
    <div class="shared-experience-div">
      <h1>Recently Shared Experiences</h1>
      <!-- <div class="shared-experience">
        <h3>Case Title : asdfdsfdfdsfasdf</h3>
        <h3>Case Description : </h3>
        <p>This is a test description</p>
      </div>
      <div class="reply-button">Reply</div> -->
      <?php $i = 0;
      foreach ($experiences as $e) { ?>
        <div class="shared-experience">
          <h3>Case Title : <?php echo $e['case_title']; ?></h3>
          <h3>Case Description : </h3>
          <p><?php echo $e['case_description']; ?></p>
          <?php if (isset($e['reply'])) { ?>
            <h3>Replies : </h3>
            <ul>
              <?php foreach ($e['reply'] as $r) { ?>
                <li><?php echo $r; ?></li>
              <?php }
          } ?>
          </ul>
          <form action="./shareexperiences.php" method="POST" class="reply-form" id="reply-form-<?php echo $i; ?>">
            <input type="hidden" name="case_id" value="<?php echo $e['id']; ?>">
            <input type="text" name="reply" placeholder="Add Reply" required>
          </form>
        </div>
        <div class="reply-button" onclick="submit_reply('<?php echo $i; ?>');">Reply</div>
        <?php $i++;
      } ?>
    </div>
  </div>
</body>

</html>
<script>
  function submit_form() {
    document.getElementById("share-your-case-experience-form").submit();
  }

  function submit_reply(index) {
    document.getElementById(`reply-form-${index}`).submit();
  }
</script>