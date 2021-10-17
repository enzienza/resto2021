/**
 * Name file: switchMode
 * Description: use jQuery for create a switcher between day mode and dark mode
 *
 * Version: 1.0
 * Author: Enza Lombardo
 */

(function($){

  $(document).ready(function() {
    // au click de #chk
    $("#chk").click(function() {
      // ajoute/supprime ".active" à ".switcher-mode"
      $(".switcher-mode").toggleClass("active");

      // ajoute/supprime ".bark" à "body"
      $("body").toggleClass("dark");

      // vérifier si body à la classe dark
      // !! $.cookie viens du script jquery-cookie (voir CDN) !!
      $.cookie("toggle", $("body").hasClass('dark'));
    });

    if ($.cookie("toggle") === "true") {
      // Si la vérification est vrai
      $(".switcher-mode").addClass("active");
      $("body").addClass("dark");
    }
  });

})(jQuery);
