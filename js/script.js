jQuery(function($){
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
  });

  $(".postArticle").each(function(){
    $postUrl = $(this).data("post-link");
    //console.log($postUrl);
    $(this).on("click", function(){
      window.location = $postUrl;
    })
  });
});
