<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    include("menu.html");
    ?>

<section id="results">
    <h2 id="title">Lista de paquetes vacaciones</h2>

    <p>A continución se muestran los paquetes según lo filtrado</p>
    <div class="container" id="alajuela">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="feature-thumb">
            <div id="zoom">
              <span>01</span>
              <h3>Volcán Arenal</h3>
              <p>Conocido por sus fuentes termales, el activo volcán Arenal y su vida silvestre, con jaguares y ranas de árbol. El camino Las Coladas atraviesa el bosque hasta llegar a un campo de lava congelada.</p>
              <div class="form-group col-md-6">
                <button type="button" id="details_btn" class="form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Detalles
                </button>
              </div>
              <iframe width="265" height="315" src="https://www.youtube.com/embed/gUqesOadTAo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4">
          <div class="feature-thumb">
            <div id="zoom">
              <span>02</span>
              <h3>Mistico Arenal Hanging Bridges Park</h3>
              <p>Frondosa reserva natural con numerosas excursiones de aventura, puentes colgantes y un pintoresco lago.</p>
              <div class="form-group col-md-6">
                <button type="button" id="details_btn" class="form-control" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                  Detalles
                </button>
              </div>
              <iframe width="265" height="315" src="https://www.youtube.com/embed/yN-_QU6TEBk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4">
          <div class="feature-thumb">
            <div id="zoom">
              <span>03</span>
              <h3>La mano del Arenal</h3>
              <p>#LaManoDelArenal es un punto exclusivo de Costa Rica y de Arenal con vistas increíbles del Lago Arenal. Una foto que hay que tener dentro de los destinos tan aclamados de Costa Rica.</p>
              <div class="form-group col-md-6">
                <button type="button" id="details_btn" class="form-control" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                  Detalles
                </button>
              </div>
              <iframe width="265" height="315" src="https://www.youtube.com/embed/bxsQ33eYSog" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Volcán Arenal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          El Parque Nacional Volcán Arenal es un área protegida en el norte de Costa Rica.
          Es conocido por sus fuentes termales, el activo volcán Arenal y su vida silvestre,
          con jaguares y ranas de árbol. El camino Las Coladas atraviesa el bosque hasta llegar
          a un campo de lava congelada. En las aguas del lago Arenal habitan guapotes y, gracias
          a sus vientos, el lago es popular para la práctica de deportes de agua. Al sudeste, en
          el cráter del volcán inactivo Cerro Chato, también hay un lago.
          <br>
          <img src="https://news.co.cr/wp-content/uploads/2017/06/Parque-Nacional-Volcan-Arenal-01.jpg">
          <br><br>
          <i class="bi bi-geo-alt"></i> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.4997465199613!2d-84.73033738550127!3d10.46121359253589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa00e962bb51111%3A0x1062d8c68ecdfecf!2sParque%20Nacional%20Volc%C3%A1n%20Arenal!5e0!3m2!1ses!2scr!4v1621566862183!5m2!1ses!2scr" width="465" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <br><br>
          <i class="bi bi-credit-card-fill"></i> Entrada por persona: 1800 colones
          <br><br>
          <i class="bi bi-telephone-fill"></i> Teléfono: 2200 4192
          <br><br>
          <i class="bi bi-graph-up"></i> Superficie: 121.2 km²
          <br><br>
          <i class="bi bi-signpost-split-fill"></i> Ciudad cercana: La Fortuna
          <br><br>
          <i class="bi bi-globe"></i> Fundación: 1991
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mistico Arenal Hanging Bridges Park</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          El parque ofrece no solo la atracción de los puentes colgantes, sino también una gran
          variedad de recorridos que permiten a todo tipo de visitantes disfrutar el contacto
          directo con la naturaleza, donde muchas especies nativas viven en un ecosistema con
          una gran diversidad biológica.optamos por el turismo inclusivo, por lo que ofrecemos
          el mayor nivel de confort posible a todos nuestros huéspedes con nuestros senderos
          accesibles. Estos no tienen escaleras, tienen barandas protectoras y el material de
          la superficie es de hormigón antideslizante.
          <br>
          <img src="https://ak-d.tripcdn.com/images/10051f000001gsqhk3EE2.jpg?proc=source%2Ftrip">
          <br><br>
          <i class="bi bi-geo-alt"></i> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.1667226935824!2d-84.75642418550103!3d10.487519992517958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa008b53b9b047d%3A0x8469458b9afcc0e1!2sMistico%20Arenal%20Hanging%20Bridges%20Park!5e0!3m2!1ses!2scr!4v1621568090426!5m2!1ses!2scr" width="465" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <br><br>
          <i class="bi bi-credit-card-fill"></i> Entrada por persona: 6000 colones
          <br><br>
          <i class="bi bi-telephone-fill"></i> Teléfono: 2479 8282
          <br><br>
          <i class="bi bi-graph-up"></i> La duración del tour es de aproximadamente 2.5 horas con un guía y de 1.5 horas sin guía naturalista.
          <br><br>
          <i class="bi bi-signpost-split-fill"></i> Visite 16 puentes, un túneles y una hermosa catarata.
          <br><br>
          <i class="bi bi-globe"></i> Web: <a href="http://www.misticopark.com/">http://www.misticopark.com/</a>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">La mano del Arenal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¡Descubra la maravillosa #LaManoDelArenal! Aproveche esta increíble oportunidad para
          descubrir los bosques del Arenal y obtenga acceso a un destino que no se puede perder
          de Costa Rica, #LaManoDelArenal.#LaManoDelArenal es un punto exclusivo de Costa Rica y
          de Arenal con vistas increíbles del Lago Arenal. Una foto que hay que tener dentro de
          los destinos tan aclamados de Costa Rica.

          <br>
          <img src="https://sancarlosdigital.com/wp-content/uploads/2021/01/mano-arenal.jpg">
          <br><br>
          <i class="bi bi-geo-alt"></i> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.9498168152436!2d-84.73773308255609!3d10.4255571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa00fb3384ca461%3A0xf167c8258d7570ba!2sSky%20Adventures%20Arenal%20Park!5e0!3m2!1ses!2scr!4v1621569007083!5m2!1ses!2scr" width="465" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <br><br>
          <i class="bi bi-credit-card-fill"></i> Entrada por persona: 25000 colones
          <br><br>
          <i class="bi bi-telephone-fill"></i> Teléfono: 2479-4100

          <br><br>
          <i class="bi bi-graph-up"></i> Incluye: teleferico, mini sendero, acceso a la mano, mirador, alitas & bebidas
          <br><br>
          <i class="bi bi-signpost-split-fill"></i> Este tour está disponible en los siguientes horarios: 8:00am 9:00am 10:30am 11:30am 1:00pm 2:00pm 3:00pm
          <br><br>
          <i class="bi bi-globe"></i> Web: <a href="https://skyadventures.travel/es/promos/la-mano-del-arenal/">https://skyadventures.travel/es/promos/la-mano-del-arenal/</a>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>