<?php

  if ( !function_exists('myGenreSlider')){
    function myGenreSlider(){
      $ci = &get_instance();
      $user_id = $ci->session->userdata('USER_ID');
      $myGenreList = $ci->utils->getMyGenres($user_id);
      ?>
      <h1 class="display-4">My Followed Genre (<?php echo count($myGenreList); ?>)</h1>

      <?php
      echo '<div class="block_wrapper">';
      foreach($myGenreList as $key => $value){
        echo '<div class="block_list"><h2>'.$value->genre.'</h2></div>';
      }
      echo '</div>';

    }
  }
  /*
  *THIS IS FUNCTION FOR CHECKING user is LOGGED IN OR NOT
  *on every page we call it just gives user is loggedn in or not
  */
  if ( !function_exists('myStarSlider'))
  {
  function myStarSlider()
		{
		   $ci = &get_instance();
       $user_id = $ci->session->userdata('USER_ID');
       $myStarList = $ci->utils->getMyStars($user_id);
       ?>
       <h1 class="display-4">My Followed Star (<?php echo count($myStarList); ?>)</h1>
       <div class="my-5 text-center container">
          <div class="row d-flex align-items-center">
             <div class="col-1 d-flex align-items-center justify-content-center">
                <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                   <div class="carousel-nav-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                         <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                      </svg>
                   </div>
                </a>
             </div>

             <div class="col-10">
                <!--Start carousel-->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                   <div class="carousel-inner">
                     <?php
                      $cnt = 1;
                        foreach ($myStarList as $star) {
                          $active = '';
                          if($cnt==1){
                            $active = " active";
                          }
                          if($cnt==1 || $cnt % 3 == 1){
                            echo '<div class="carousel-item'.$active.'"><div class="row">';
                          }
                          $poster = base_url() .'/assets/images/no_image.jpg';

                    			echo '<div style="background-image:url('.$poster.'); background-size:300px auto;background-repeat:no-repeat;" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">';
                          echo '<h2 style="color:red;font-size:20px; font-weght:bold;">'.$star->name.'</h2>';
                          echo '</div>';
                       if($cnt % 3 == 0){
                              echo '</div></div>';
                            }
                            $cnt++;
                          }
                          if(($cnt-1) % 3 <=2 && ($cnt-1) % 3 > 0){
                            echo '</div></div>';
                          }
                        ?>

                   </div>
                </div>
                <!--End carousel-->
             </div>

             <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" data-slide="next">
                <div class="carousel-nav-icon">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                   </svg>
                </div>
                </a>
             </div>
          </div>
       </div>

     <?php	   }
  }

  /*
  *THIS IS FUNCTION FOR CHECKING user is LOGGED IN OR NOT
  *on every page we call it just gives user is loggedn in or not
  */
  if ( !function_exists('myMovieSlider'))
  {
  function myMovieSlider()
    {
       $ci = &get_instance();
       $user_id = $ci->session->userdata('USER_ID');
       $myMoviesList = $ci->utils->getMyMovies($user_id);
       ?>
       <h1 class="display-4">My Followed Movie (<?php echo count($myMoviesList); ?>)</h1>
       <div class="my-5 text-center container">
          <div class="row d-flex align-items-center">
             <div class="col-1 d-flex align-items-center justify-content-center">
                <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                   <div class="carousel-nav-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                         <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                      </svg>
                   </div>
                </a>
             </div>

             <div class="col-10">
                <!--Start carousel-->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                   <div class="carousel-inner">
                     <?php
                      $cnt = 1;
                        foreach ($myMoviesList as $movie) {
                          $active = '';
                          if($cnt==1){
                            $active = " active";
                          }
                          if($cnt==1 || $cnt % 3 == 1){
                            echo '<div class="carousel-item'.$active.'"><div class="row">';
                          }
                          if(strlen($movie->poster) > 10){
                            $poster = $movie->poster;
                          }else{
                            $poster = base_url() .'/assets/images/no_image.jpg';
                          }

                          echo '<div style="background-image:url('.$poster.'); background-size:300px auto;background-repeat:no-repeat;" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">';
                          echo '<h2 style="color:red;font-size:20px; font-weght:bold;">'.$movie->title.'<span>('.$movie->year.')</span></h2>';
                          echo '</div>';
                       if($cnt % 3 == 0){
                              echo '</div></div>';
                            }
                            $cnt++;
                          }
                          if(($cnt-1) % 3 <=2 && ($cnt-1) % 3 > 0){
                            echo '</div></div>';
                          }
                        ?>

                   </div>
                </div>
                <!--End carousel-->
             </div>

             <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" data-slide="next">
                <div class="carousel-nav-icon">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                   </svg>
                </div>
                </a>
             </div>
          </div>
       </div>

     <?php	   }
  }
