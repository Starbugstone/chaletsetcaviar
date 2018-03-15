jQuery(function($){
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
  });

  //when clicked on the line displayed articles. Go strate to article
  $(".postArticle").each(function(){
    $postUrl = $(this).data("post-link");
    $(this).on("click", function(){
      window.location = $postUrl;
    })
  });

  $("#searchbarLogo").on("click",function(){
    console.log("clicked");
    $searching = $(this).attr("data-searching");
    console.log($searching);
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
});
