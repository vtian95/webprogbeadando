<div class="row">
  <div class="col">
    <div class="jumbotron">
      <h1 class="display-4 rainbow-text">Üdvözöljük az abonyi Szivárvány óvoda honlapján!</h1>
      <p class="lead">Nálunk gyermeke a legjobb helyen lesz!</p>
      <hr class="my-4">
      <p>Néhány ízelítő az ovi életéből:</p>
      <p class="lead">
        <a class="btn btn-success btn-lg" href="?oldal=galeria" role="button">Tekintse meg képgalériánk</a>
      </p>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <h4 class="pb-3">Bemutatkozás</h4>
    <p class="lead">
      Az abonyi óvodában pedagógusaink a legjobb személyre szabott foglalkozást nyújtják a gyerekeknek.
    </p>
    <p>
      20 éves tapasztalatunkkal segítünk a szűlőknek megválasztani a megfelelő nappali fogalalkozásokat, megtanítjuk a gyermekeiket, hogy a közösség értékes tagjai legyenek. Óvodánk nagy hangsúlyt fektet a sportra, ezért különféle sportkurzusaink közül választhatnak heti három alkalommal.
		Kérjük vegye fel velünk a kapcsolatot a menüfül alatt az üzenete beírásával. Mivel ez egy fantasztikus közösség, az üzenőfalon minden szülő kérdése megjelenik az üzenetek menüpont alatt.
    </p>
  </div>
</div>

<div class="row mt-4">
  <div class="col">
    <hr>
    <h4 class="pb-3">Videók</h4>
    <div class="row">
      <div class="col-md-6 text-center">
        <video controls width="420" height="235">
          <source src="video/video.mp4" type="video/mp4">
          A böngészője nem támogatja a HTML5 videók lejátszását.
        </video>
      </div>
      <div class="col-md-6 text-center">
        <iframe width="420" height="235" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col">
    <hr>
    <h4 class="pb-3">Hol vagyunk?</h4>
    <div id="map"></div>
  </div>
</div>

<script>
    function initMap() {
    
        const uluru = { lat: <?php echo $MAP_COORDINATES['lat']; ?>, lng: <?php echo $MAP_COORDINATES['lng']; ?> };
        
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: uluru,
        });
     
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
    window.initMap = initMap;
</script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJAC_yjtP_hsYZ1m5LLkhSbbkaOct74lg&callback=initMap&v=weekly"
  defer
></script>
