<!-- Footer
============================================= -->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg d-lg-flex align-items-center">
        <ul class="nav justify-content-center justify-content-lg-start text-3">
          <li class="nav-item"> <a class="nav-link" href="{{route('about')}}">Nosotros</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('prices')}}">Precios</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('faq')}}">Preguntas Frecuentes</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('reviews')}}">Opiniones</a></li>
        </ul>
      </div>
      <div class="col-lg d-lg-flex justify-content-lg-end mt-3 mt-lg-0">
        <ul class="social-icons justify-content-center">
          <li class="social-icons-facebook"><a href="https://www.facebook.com/AgenteFacil.Peru/" target="_blank"><i class="fab fa-facebook-f" title="Siguenos en Facebook"></i></a></li>
<!--           <li class="social-icons-twitter"><a data-toggle="tooltip" href="http://www.twitter.com/" target="_blank" title="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
          <li class="social-icons-google"><a data-toggle="tooltip" href="http://www.google.com/" target="_blank" title="" data-original-title="Google"><i class="fab fa-google"></i></a></li>
          <li class="social-icons-youtube"><a data-toggle="tooltip" href="http://www.youtube.com/" target="_blank" title="" data-original-title="Youtube"><i class="fab fa-youtube"></i></a></li> -->
        </ul>
      </div>
    </div>
    <div class="footer-copyright pt-3 pt-lg-2 mt-2">
      <div class="row">
        <div class="col-lg">
          <p class="text-center text-lg-left mb-2 mb-lg-0">Copyright © 2020 <a href="#">Agente Fácil</a>. Derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer end -->

</div>
<!-- Document Wrapper end -->
<!-- Back to Top
============================================= -->
<!-- <a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> -->

<!-- Video Modal
============================================= -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content bg-transparent border-0">
      <button type="button" class="close text-white opacity-10 ml-auto mr-n3 font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body p-0">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" id="video" allow="autoplay"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Video Modal end -->

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "51944001458", // WhatsApp number
            call_to_action: "Realiza una operación rápida", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget