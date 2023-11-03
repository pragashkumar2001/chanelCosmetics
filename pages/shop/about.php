<?php
include_once '../../configs/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("./shared/head.php");
?>

<body>

<?php
  include("./shared/navbar.php");
  ?>
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

   
  
.contact-info-area {
    position: relative;
    display: block;
    width: 100%;
}
.about-section .container{
  width: 100%;
}
.contact-form {
    position: relative;
    display: block;
    background: #ffffff;
    padding: 100px 350px  ;
    -webkit-box-shadow: 0px 3px 8px 2px #ededed; 
    box-shadow: 0px 3px 8px 2px #ededed;
    z-index: 3;
    widows: 100%;
}
.contact-form .sec-title-style1{
    position: relative;
    display: block;
    padding-bottom: 51px;
    width: 50%;
}
.contact-form .text-box{
    position: relative;
    display: block;
    margin-top: 19px;
    width: 50%;    
}
.contact-form .text p{
    color: #848484;
    line-height: 26px;
    margin: 0;
}

.contact-form .inner-box{
    position: relative;
    display: block;
    background: #ffffff;
}
.contact-form form{
    position: relative;
    display: block;
}
.contact-form form .input-box{
    position: relative;
    display: block;
    padding: 1rem;
}

.contact-form form input[type="text"],
.contact-form form input[type="email"],
.contact-form form input[type="number"],
.contact-form form select,
.contact-form form textarea{
    position: relative;
    display: block;   
    background: #ffffff;
    border: 1px solid #eeeeee;
    width: 100%;
    height: 55px;
    font-size: 16px;
    padding-left: 19px;
    padding-right: 15px;
    border-radius: 0px;
    margin-bottom: 20px;
    transition: all 500ms ease;
}
.contact-form form textarea {
  position: relative;
    display: block;   
    background: #ffffff;
    border: 1px solid #eeeeee;
    width: 150%;
    height: 162.5px;
    padding-top:10px;
    font-size: 16px;
    padding-left: 19px;
    padding-right: 15px;
    border-radius: 0px;
    margin-bottom: 20px;
    transition: all 500ms ease;
    
}
.contact-form form input[type="text"]:focus{
    color: #222222;
    border-color: #d4d4d4; 
}
.contact-form form input[type="email"]:focus{
    color: #222222;
    border-color: #d4d4d4;
}
.contact-form form textarea:focus{
    color: #222222;
    border-color: #d4d4d4;
}
.contact-form form input[type="text"]::-webkit-input-placeholder {
    color: #848484;
}
.contact-form form input[type="text"]:-moz-placeholder {
    color: #848484;
}
.contact-form form input[type="text"]::-moz-placeholder {
    color: #848484;
}
.contact-form form input[type="text"]:-ms-input-placeholder {
    color: #848484;
}
.contact-form form input[type="email"]::-webkit-input-placeholder {
    color: #848484;
}
.contact-form form input[type="email"]:-moz-placeholder {
    color: #848484;
}
.contact-form form input[type="email"]::-moz-placeholder {
    color: #848484;
}
.contact-form form input[type="email"]:-ms-input-placeholder {
    color: #848484;
}
.contact-form .input-sub{
  width: 150%;
}
.contact-form form button {
    position: relative;
    display: block;
    width: 140%;
    background: #FFA500;
    border: 1px solid #FFA500;
    color: #131313;
    font-size: 16px;
    line-height: 55px;
    font-weight: 600;
    text-align: center;
    text-transform: capitalize;
    transition: all 200ms linear;
    transition-delay: 0.1s;
    cursor: pointer;
    
}

.contact-form form button:hover{
    color: #ffffff;
    background: #131313;
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
        Chanel Cosmetics was founded by Mohammed Inaam in 2019. I was 20 years old with no fashion background or training but a lot of hustle and drive! Starting with an inventory of 10 products and packing packages on the floor of my apartment, I never imagined how far I would get but one thing was for sure we weren't going to let anything stop us!!!</p>
        <div class="skills">
          <span>Chanel Cosmetics Speciality </span>
          <span>Trending Cosmetics</span>
          <span>Trending Products</span>
        </div>
      </div>
    </div>

    <h2 style="text-align: center; margin-top: 50px;">Provide Your Feedback here!</h2>
  
    <div class="contact-form">
      <div class="inner-box">
          <form id="contact-form" name="contact_form" class="default-form" action="aboutHandler.php" method="post">
              <div class="row">
                  <div class="col-xl-6 col-lg-12">
                      <div class="row">
                          <div class="col-xl-6">
                              <div class="input-box">   
                                  <input type="text" name="txtName" value="" placeholder="Name" required="">
                              </div> 
                                <div class="input-box"> 
                                  <input type="number" name="txtPhoneNo" value="" placeholder="Phone">
                              </div>
                          </div>
                          <div class="col-xl-6">
                              <div class="input-box"> 
                                  <input type="email" name="txtEmail" value="" placeholder="Email" required="">
                              </div>
                              <div class="input-box">
                                  <select name="txtCategory" required="">
                                      <option value="" selected disabled>Feedback Type</option>
                                      <option value="General">General Inquiry</option>
                                      <option value="Suggestion">Suggestion</option>
                                      <option value="Complaint">Complaint</option>
                                      <option value="Other">Other</option>
                                  </select>
                              </div> 
                          </div>  
                      </div> 
                      <div class="row">
                            <div class="input-sub">
                              <div class="input-box"> 
                                  <input type="text" name="txtSubject" value=""  placeholder="Subject">
                              </div>     
                          </div> 
                      </div>   
                  </div>
                  <div class="col-xl-6 col-lg-12">
                      <div class="input-box">    
                          <textarea name="txtDescription" placeholder="Your Message..." required=""></textarea>
                      </div>
                      <div class="button-box ms-20">
                          <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                          <button type="submit" name="createFeedback" id="createFeedback">Send Message<span class="flaticon-next"></span></button>    
                      </div>         
                  </div> 
              </div>
          </form>
      </div>
  </div>
  </section>
  
  <?php include_once './shared/footer.php'; ?>

</body>

</html>