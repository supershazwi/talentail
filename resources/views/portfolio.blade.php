<!DOCTYPE html>

<html>

<head>

  <title>Talentail: Apply your knowledge onto real world projects</title>
  <link rel="stylesheet" type="text/css" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="/css/theme.css">
  <link href="/img/favicon.ico" rel="icon" type="image/x-icon">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="At Talentail, you get to apply what you've learned onto real world projects and gain experience.">

  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

  <style>
  #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
  }

  #myImg:hover {opacity: 0.7;}

  /* The Modal (background) */
  .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (image) */
  .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
  }

  /* Caption of Modal Image */
  #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
  }

  /* Add Animation */
  .modal-content, #caption {    
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
      from {-webkit-transform:scale(0)} 
      to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
      from {transform:scale(0)} 
      to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
  }

  .close:hover,
  .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
      .modal-content {
          width: 100%;
      }
  }
  </style>
</head>

<body>
  <div class="layout layout-nav-top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
          <section class="py-4 py-lg-5" style="text-align: center;">
            <img class="avatar" src="/img/gray-avatar.png" style="width: 7.5rem; height: 7.5rem;">
            <h1 class="display-4 mb-3" style="margin-top: 1.5rem;">Shazwi Suwandi</h1>
            <p class="lead">Shazwi has been working as a tech consultant since graduating from National University of Singapore and has gained significant experience in digital transformation projects. He likes to overthink in his everyday life and sometimes land himself onto problems that he wants to solve. When push comes to shove, he will roll up his sleeves, his pants, tie up his hair and sit tight till a solution is found. He still can't afford his own bat signal yet, so he can only be contactable on the other channels below.</p>
          
            <a target="_blank" href="#" style="margin-right: 1rem; font-size: 1.5rem;"><i class="fab fa-linkedin"></i></a>
            <a target="_blank" href="#" style="margin-right: 1rem; font-size: 1.5rem;"><i class="fab fa-facebook-square"></i></a>
            <a target="_blank" href="#" style="font-size: 1.5rem;"><i class="fab fa-twitter-square"></i></a>

          </section>

          <div class="content-list-body row">
              <div class="col-lg-12">
                  <div class="card mb-3" style="margin-bottom: 0rem !important;">
                      <div class="card-body">
                          <h3 data-filter-by="text"><a href="#">Digital Transformation Project for a Food & Beverages Co.</a></h3>
                          <p style="margin-top: 0.5rem;">Puffy Puff Pte. Ltd. was founded by Mr Lee in Singapore on September 2000 with the sole reason of making Singaporeans happy with the curry puffs he created. Over the course of 10 years, demand for curry puffs has increased but the processes and systems used by Mr Lee remain the same.</p>
                          <div class="row">
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://pbsanjacinto.weebly.com/uploads/1/3/4/9/13495198/739345_orig.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="https://tallyfy.com/wp-content/uploads/2017/10/SIPOC.png" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://storage.googleapis.com/talentail-123456789/assets/9Pgh5YOy6MuV4pHfjWa13li4dwh2LfFvZLsZmQWH.jpeg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>

                            
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="https://tallyfy.com/wp-content/uploads/2017/10/SIPOC.png" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://storage.googleapis.com/talentail-123456789/assets/9Pgh5YOy6MuV4pHfjWa13li4dwh2LfFvZLsZmQWH.jpeg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://pbsanjacinto.weebly.com/uploads/1/3/4/9/13495198/739345_orig.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                          </div>
                          <hr style="margin-top: 0rem;"/>
                          <img class="avatar" src="/img/spencer.jpeg" style="height: 3rem; width: 3rem; float: left;">
                          <div style="margin-left: 4rem !important;">
                            <p style="margin-bottom: 0.5rem;"><a href="#">Spencer Ng</a> <span class="badge badge-warning" style="font-size: 0.8rem;">Creator</span></p>
                            <p style="margin-bottom: 0rem;">Shazwi is an engaging, proactive and confident individual who is always ready for more challenges. I was particularly impressed by Shazwi's ability to analyze the toughest problems for this project. Shazwi's analytical capabilities and drive is what will make him a success.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <hr style="margin-top: 2.5rem; margin-bottom: 2.5rem;"/>

          <div class="content-list-body row">
              <div class="col-lg-12">
                  <div class="card mb-3" style="margin-bottom: 0rem !important;">
                      <div class="card-body">
                          <h3 data-filter-by="text"><a href="#">Stakeholder Analysis - Hotel Booking & Administration System</a></h3>
                          <p style="margin-top: 0.5rem;">A project to develop and implement a new system for a group of hotels. Scope to include guest bookings, finance, hotel operations and general administration. At the moment systems are a bit fragmented – online bookings via websites and apps, telephone bookings direct to the hotel, finance systems in the back office.</p>
                          <div class="row">
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://pbsanjacinto.weebly.com/uploads/1/3/4/9/13495198/739345_orig.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="https://tallyfy.com/wp-content/uploads/2017/10/SIPOC.png" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://storage.googleapis.com/talentail-123456789/assets/9Pgh5YOy6MuV4pHfjWa13li4dwh2LfFvZLsZmQWH.jpeg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>

                            
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="https://tallyfy.com/wp-content/uploads/2017/10/SIPOC.png" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://storage.googleapis.com/talentail-123456789/assets/9Pgh5YOy6MuV4pHfjWa13li4dwh2LfFvZLsZmQWH.jpeg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                              <img class="thumbnail" src="http://pbsanjacinto.weebly.com/uploads/1/3/4/9/13495198/739345_orig.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                            </div>
                          </div>
                          <hr style="margin-top: 0rem;"/>
                          <img class="avatar" src="http://storage.googleapis.com/talentail-123456789/avatars/pTzOJNAKBA85qGI9B4c9gictjkWTbRYaBZbyU3Zt.jpeg" style="height: 3rem; width: 3rem; float: left;">
                          <div style="margin-left: 4rem !important;">
                            <p style="margin-bottom: 0.5rem;"><a href="#">Steve McIntosh</a> <span class="badge badge-warning" style="font-size: 0.8rem;">Creator</span></p>
                            <p style="margin-bottom: 0rem;">Shazwi managed to complete the project in a short amount of time and achieve a high quality of work. He was able to ask the right questions to solicit the necessary requirements. He is also open to feedback and input, allowing him to achieve the right outcome for each document.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="content-list-body row" style="margin-bottom: 5rem;">
            <div class="col-xl-12 col-6" style="text-align: center;">
              <p style="margin-top: 5rem;">Portfolio supercharged by <a href="/">Talentail</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
  // Get the modal

  function showModal(src) {

    console.log(src);

    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    modal.style.display = "block";
    modalImg.src = src;
  } 

  function closeModal() {    
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
  }

  </script>

</body>

</html>