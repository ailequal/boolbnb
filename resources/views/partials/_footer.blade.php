
<footer class="container">
  <div class="footer-left">
    <ul>
      <li>
        <span>2020 Boolbnb All rights reserved</span>
      </li>
      <li>
        <a href="#">Privacy</a>
      </li>
      <li>
        <a href="#">Termini</a>
      </li>
    </ul>
  </div>
  <div class="footer-right">
    <ul>
      <li>
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>

</footer>
{{-- handlebars --}}
<script id="menu-template" type="text/x-handlebars-template">
  <div class="entry">
    <label for="text">Radius</label>

  <select id="radius">
    <option value="10">10</option>
    <option value="20" selected="20">20</option>
    <option value="30">30</option>
    <option value="40">40</option>
    <option value="50">50</option>
  </select> 
  </div>
  </div>
</script>
<script id="flat-template" type="text/x-handlebars-template">
  <div class="entry">
    <h1>@{{'title'}}</h1>
    <div class="body">
     <p>@{{'city'}}</p>
     <p>@{{'rooms'}}</p>
    </div>
  </div>
</script>
  @yield('script')
  <script src="{{asset('js/search.js')}}"></script>
  </body>
</html>
