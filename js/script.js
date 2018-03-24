jQuery(function($){
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
  });

  //when clicked on the line displayed articles. Go strate to article
  $(".postArticle").each(function(){
    $(this).on("click", function(){
      $postUrl = $(this).data("post-link");
      window.location = $postUrl;
    })
  });

  $("#searchbarLogo").on("click",function(){
    $searching = $(this).attr("data-searching");
    $icon = $(this).find('.fa');
    $bar = $(this).siblings("#searchbarForm");
    if($searching == "no"){
      $(this).attr("data-searching", "yes");
      $icon.removeClass("fa-search");
      $icon.addClass("fa-times");
      $bar.show();
    }else{
      $(this).attr("data-searching", "no");
      $icon.removeClass("fa-times");
      $icon.addClass("fa-search");
      $bar.hide();
    }
  });

  $("#contactLogo").on("click",function(){
    $searching = $(this).attr("data-searching");
    $icon = $(this).find('.fa');
    $bar = $(this).siblings("#contactForm");
    if($searching == "no"){
      $(this).attr("data-searching", "yes");
      $icon.removeClass("fa-envelope-o");
      $icon.addClass("fa-times");
      $("#contact-sidebar").addClass("displayedForm");
      $bar.show();
    }else{
      $(this).attr("data-searching", "no");
      $icon.removeClass("fa-times");
      $icon.addClass("fa-envelope-o");
      $("#contact-sidebar").removeClass("displayedForm");
      $bar.hide();
    }
  });
});
