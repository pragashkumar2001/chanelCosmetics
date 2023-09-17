<?php
include_once '../../configs/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("./shared/head.php");
?>

<body>
  <style>
    .about-section {
      background: url(../../assets/images/about.jpg) no-repeat left;
      background-size: 85%;
      background-color: #fdfdfd;
      overflow: hidden;
      padding: 100px 0;
    }

    .inner-container {
      width: 55%;
      float: right;
      background-color: #fdfdfd;
      padding: 150px;
    }

    .inner-container h1 {
      margin-bottom: 30px;
    }

    .text {
      font-size: 13px;
      color: #545454;
      line-height: 30px;
      text-align: justify;
      margin-bottom: 40px;
    }

    .skills {
      display: flex;
      justify-content: space-between;
      font-weight: 700;
      font-size: 13px;
    }

    @media screen and (max-width:1200px) {
      .inner-container {
        padding: 80px;
      }
    }

    @media screen and (max-width:1000px) {
      .about-section {
        background-size: 100%;
        padding: 100px 40px;
      }

      .inner-container {
        width: 100%;
      }
    }

    @media screen and (max-width:600px) {
      .about-section {
        padding: 0;
      }

      .inner-container {
        padding: 60px;
      }
    }
  </style>


  <?php
  include("./shared/navbar.php");
  ?>
  <section>
    <div class="about-section">
      <div class="inner-container">
        <h1>About Us</h1>
        <p class="text">
        Fashion Hub was founded by Pragash Kumar in 2022. I was 21 years old with no fashion background or training but a lot of hustle and drive! Starting with an inventory of 10 products and packing packages on the floor of my apartment, I never imagined how far I would get but one thing was for sure we weren't going to let anything stop us!!!</p>
        <div class="skills">
          <span>Fashion Hub Speciality </span>
          <span>Trending Fashion</span>
          <span>Trending Styles</span>
        </div>
      </div>
    </div>

  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>