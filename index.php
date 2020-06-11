<?php

  use PHPMailer\PHPMailer\PHPMailer;
  require 'vendor/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/src/Exception.php';

  if($_SERVER["REQUEST_METHOD"] == "POST"){



    $name = trim(filter_input(INPUT_POST,'user_name',FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,'user_email',FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST,'user_text',FILTER_SANITIZE_SPECIAL_CHARS));
    $url = ('url');

    if ($name == "" || $email == "" || $message == ""){
      $error_message = "Proszę uzupelnic wymagane pole: Imie i nazwisko, email, wiadomosc";
      // exit;
    }

    if(!PHPMailer::validateAddress($email)) {
      $error_message = "Niepoprawny adres email";
      // exit;
    }

    if(!$url ==""){
      $error_message = "Coś poszło nie tak";
    }

    if(!isset($error_message)){

      $email_body .= "";
      $email_body .=  "Name " . $name . "\n";
      $email_body .= "Email " . $email . "\n";
      $email_body .= "Message " . $message . "\n";



      //wyslanie maila
      $mail = new PHPMailer;
      //$mail->isSMTP();
      //$mail->Host = 'localhost';
      //$mail->Port = 2500;
      $mail->CharSet = 'utf-8';
      //It's important not to use the submitter's address as the from address as it's forgery,
      //which will cause your messages to fail SPF checks.
      //Use an address in your own domain as the from address, put the submitter's address in a reply-to
      $mail->setFrom('pogodna@jesien.com.pl', $name);
      $mail->addReplyTo($email, $name);
      $mail->addAddress('pogodna@jesien.com.pl', 'Pensjonat Pogodna Jesien');
      $mail->Subject = 'Wiadomosc ze strony Pogodna Jesien od ' . $name;
      $mail->Body = $email_body;

      if ($mail->send()) {
          header("location:index.php?status=thanks");
          exit;
      }else{
      $error_message = "Mailer Error: " . $mail->ErrorInfo;
    }
  }
}

?>

<!DOCTYPE html>
<html> <!-- miejsce na komentarz-->
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-92263312-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-92263312-1');
    </script>
    <meta charset="UTF-8">
    <title>Pensjonat Pogodna Jesie&#324; - Dom seniora, Tarnowskie Góry, Śląsk</title>
    <meta name="description" content="Rodzinny dom seniora położony w malowniczej okolicy.
    Zapraszamy do skorzystania z nszej atrakcyjnej oferty cenowej na pobyty długoterminowe ">
    <meta name="keywords" content="dom seniora, dom opieki, dom spokojnej starości, śląsk, ślaskie, pogodna jesień, pensjonat seniora, dom starców">
    <title>Pensjonat Pogodna Jesień</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>
    <div>
      <div id="start"></div>
      <header id="navbar"class="start-container nav-big">

        <div id="logo">
        <a href="#start">
        <img src="img/LOGOTYP.png" alt="Logo Pogodna Jesień"  class="item logotyp"></a>
        </div>

        <nav class="chowamy">
          <a href="#start" class="item">Strona główna</a>
          <a href="#witamy"class="item">Witamy</a>
          <a href="#o-nas"class="item">O nas</a>
          <a href="#oferta-1"class="item">Oferta</a>
          <a href="#cennik"class="item">Cennik</a>
          <a href="#galeria"class="item">Galeria</a>
          <a href="#kontakt"class="item">Kontakt</a>
        </nav>
        <div class="pos-f-t chowamy2">
          <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-black p-4 text-align">

              <span class="text-black text-align">
                <a href="#start" class="item">Strona główna</a><br>
                <a href="#witamy"class="item">Witamy</a><br>
                <a href="#o-nas"class="item">O nas</a><br>
                <a href="#oferta-1"class="item">Oferta</a><br>
                <a href="#cennik"class="item">Cennik</a><br>
                <a href="#galeria"class="item">Galeria</a><br>
                <a href="#kontakt"class="item">Kontakt</a>
              </span>

            </div>
          </div>
          <nav class="navbar navbar-light bg-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </nav>
        </div>

      </header>

      <section id="strona-glowna">

        <img class="main-photo" src="img/widokowe_crop.jpg" alt="panorama Repty Śląskie Pensjonat Pogodna Jesień">

      </section>


      <main>

        <section id="witamy" class="primary-white-centered">

            <div>
              <a href="#witamy"class="item"><div><img class="arrow" src="img/down-arrow.svg"></div></a>
              <h1>Witamy w Pensjonacie Pogodna Jesień</h1>

              <p>Pensjonat Seniora „Pogodna Jesień” zajmujemy się opieką nad osobami starszymi od 2006 roku.
                Nasz rodzinny dom seniora jest położony w cichej i spokojnej okolicy
                Parku Reptowskiego w Tarnowskich Górach. Atmosfera naszego domu sprzyja
                odpoczynkowi oraz gwarantuje spokój, którego potrzebują osoby w podeszłym wieku.
                Zapewniamy całodobową opiekę osobom starszym, samotnym i niepełnosprawnym.
                Naszym celem jest zagwarantowanie pensjonariuszom bezpieczeństwa i możliwości aktywnego
                odpoczynku w ciepłej, domowej atmosferze.</p>
            <a href="#o-nas"class="item"><div><img class="arrow" src="img/down-arrow.svg"></div></a>
            </div>
        </section>

        <section id="o-nas" class="primary-white">

          <h2>O nas</h2>
          <div class="o-nas">
            <div class="secondary col">
              <img src="img/800x500_1.jpg" alt="występ zespołu ludowego" class="photo photo-o-nas">
              <h3>Historia Naszego Pensjonatu</h3>
              <p>Nasz pensjonat powstał w sierpniu 2006 r. z myślą o zapewnieniu Państwa bliskim
                pogodnej jesieni życia. W związku z dynamicznym rozwojem placówki w kwietniu 2013
                oddaliśmy do użytku dodatkowy pawilon ze zwiększoną ilością pokoi jednoosobowych
                i apartamentów dla małżeństw. Obydwa nowoczesne budynki wybudowane są zgodnie ze
                standardami Unii Europejskiej, bez barier architektonicznych - dostosowane do potrzeb
                osób starszych i niepełnosprawnych. Wszystkie nasze pokoje są w pełni umeblowane,
                posiadają bezpiecznie higieniczne łazienki z prysznicem. Wszystkie są podłączone
                do centralnej instalacji przywoławczej monitorowanej całą dobę oraz posiadają podłączenie
                TV i telefoniczne.
              </p>
            </div>
            <div class="primary col">
              <img src="img/800x500_6.jpg" alt="impreza pensjonariuszy" class="photo photo-o-nas-2">
              <h3>Życie w Naszym Pensjonacie</h3>
              <p>W naszym rodzinnym domu opieki oferujemy możliwość spędzenia kilku dni,
                tygodni, jak również kilku lat. Są z nami pensjonariusze, którzy zamieszkali
                w pensjonacie zaraz po jego otwarciu - w sierpniu 2006 roku.
                Wykwalifikowany personel z długoletnim stażem dokłada wszelkich starań,
                aby sprostać indywidualnym oczekiwaniom. Staramy się mobilizować pensjonariuszy
                do wspólnej aktywności, pragniemy pomóc, uspokoić i wsłuchać się w ich potrzeby
                oraz stworzyć przyjazną atmosferę.
              </p>

            </div>
          </div>
        </section>

        <section id="oferta-1" class="primary-white">
          <div class="container">
            <div class="row">

              <div class="col-12 col-md-4"><h2>Oferta</h2></div>
              <div class="col-12 col-md-8"><!--<h3>Naszym pensjonariuszom zapewniamy</h3>-->
                <ul>
                  <li><h4 class="spacja2">Komfortowe pokoje</h4>Komfortowy pobyt w pokojach jedno- i dwuosobowych
                    z łazienkami, których umeblowanie i wystrój stwarza domową atmosferę</li><br>
                  <li><h4>Całodobową opiekę wykwalifikowanych pielęgniarek z długoletnim stażem</li><br>
                  <li><h4>Opieka opiekunek</h4>Dzienną opiekę opiekunek, które starają się sprostać
                    indywidualnym oczekiwaniom oraz dbają o spokój i odpoczynek naszych pensjonariuszy.</li><br>
                  <li><h4>Opieka lekarza</h4>Wszyscy pensjonariusze są rejestrowanie w przychodni i mają
                    zapewnioną opiekę lekarza rodzinnego.</li><br>
                  <li><h4>Wyżywienie</h4>Pełne domowe wyżywienie, również dietetyczne, zgodnie z zaleceniami
                    lekarza. Pensjonariusze mają zapewniony stały dostęp do napoi. Posiłki spożywamy wspólnie,
                    co integruje i jednoczy naszą małą społeczność.</li><br>
                  <li><h4>Opieka duszpasterska</h4>Ksiądz z pobliskiej parafii regularnie odwiedza naszych
                    pensjonariuszy, zabawia, dotrzymuje towarzystwa i wspiera duchowo.</li>
                </ul>
              </div>

            </div>

          </div>

        </section>
        <section id="terapia i zajecia" class="primary-white">

          <img src="img/IMPREZA1-kopia.jpg" alt="pensjonariusze w trakcie posiłku na świeżym
          powietrzu" class="photo-terapia">

          <article id="terapia">

            <div class="container">
              <div class="row">
                <div class="col-12 col-md-4"><h2 class="h2-terapia">Terapia<br> i zajęcia</h2></div>
                <div class="col-12 col-md-8"><h3 class="spacja3">Terapia zajęciowa, organizacja czasu wolnego</h3>
                  <p>Do uczestnictwa w imprezach artystycznych, grillu, wspólnym świętowaniu
                        urodzin zapraszamy również rodziny i przyjaciół naszych pensjonariuszy.
                        To współuczestnictwo w imprezach sprawia naszym podopiecznym dużo radości.
                        Rodziny i przyjaciół naszych pensjonariuszy zapraszamy do odwiedzin,
                        pozostawiając swobodę wyboru godzin wizyty oraz sposobu spędzania wspólnego
                        czasu.</p>
                </div>
                </div>
            </div>
          </article>

          <article id="zajecia">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-8"><h3>Rodzaje zajęć</h3>
                  <ul>
                    <li>Poranna kawa, herbata w trakcie czytania prasy i omawiania
                    bieżących wydarzeń</li>
                    <li>Wspólna gimnastyka</li>
                    <li>Spacery na terenie pensjonatu</li>
                    <li>Muzykoterapia, wspólne śpiewanie</li>
                    <li>Gry, kalambury, zgadywanki</li>
                    <li>Występy artystyczne, spotkania z przedszkolakami,</li>
                    <li>Imprezy sezonowe</li>
                    <li>Zajęcia plastyczne</li>
                  </ul>
                </div>
          </article>
        </section>
        <section id="zdjecie-pensjonatu" class="primary-white">
          <img src="img/PANORAMA_crop.jpg" alt="wiosenny widok na pensjonat" class="widok-wiosna">
        </section>

        <section id="cennik" class="yellow">
          <div class="primary-white">
          <div class="container">

              <!--COVID ALERT-->

              <div class="alert alert-warning" role="alert">
                  <p class='tekst-cennik'>
                      Szanowni państwo,<br>
                      w związku z sytuacją epidemiczną oraz zaleceniami dotyczącymi przeciwdziałaniu COVID-19.<br>

                      Każda osoba, mieszkająca w pensjonacie, wymagająca hospitalizacji lub konsultacji lekarskiej poza naszym ośrodkiem, podlega 14-dniowej kwarantannie po powrocie ze szpitala lub przychodni.<br>
                      Na czas kwarantanny pensjonariuszka/pensjonariusz będą przeniesieni do pokoju jednoosobowego w oddzielonej części pensjonatu.<br>
                      W związku z podwyższonymi kosztami pobytu w izolatce, wynikającymi z używania naczyń jednorazowych, pościeli jednorazowej oraz sprzętu ochronnego dla personelu do podstawowej opłaty za pobyt w pensjonacie doliczamy 200zł/tydzień.<br>

                    <br>Dyrekcja<br>
                      Pensjonat Pogodna Jesień</p>
              </div>

              <!-- COVID ALERT-->

            <div class="row">

              <div class="col-12 col-md-4"><h2>Cennik</h2></div>
              <div class="col-12 col-md-8">
                <h3 class="spacja">Pokój jednoosobowy</h3><br>
                <div class="tekst-cennik">
                 <p>Pobyt krótkoterminowy</p> <p>150zł za dobę</p>
                </div>
                <div class="tekst-cennik">
                  <p>Pobyt długoterminowy</p>
                  <p>3700 - 3900zł za miesiąc</p>
                </div><br>

                <h3>Pokój dwuosobowy</h3><br>
                <div class="tekst-cennik">
                <p>Pobyt krótkoterminowy</p>
                <p>120zł za dobę</p>
                </div>
                <div class="tekst-cennik">
                <p>Pobyt długoterminowy</p>
                <p>3200 - 3300zł za miesiąc</p>
              </div><br>
                <div>
                  <p>Dla osób z chorobą Alzheimera, zaawansowaną demencją
                    lub wymagających szczególnej opieki obowiązuje dopłata w wysokości
                    400 zł miesięcznie.</p><br>
                  <p>Przy przyjęciu wymagamy dostarczenia wypisu ze szpitala z
                    ostatniego miesiąca lub zaświadczenia lekarskiego o stanie zdrowia,
                    do pobrania poniżej:</p><br>
                  <a href="img/Zas_lekarskie.pdf" download>POBIERZ ZAŚWIADCZENIE LEKARSKIE</a>
                </div>

                </div>

              </div>
            </div>
          </div>
        </section>



        <!-- GALERIA -->


        <section id="galeria" class="primary-white">

          <!-- <h2 class="h2-galeria">Galeria</h2> -->

          <div class="container">
            <div class="row">

            <div class="col-12 col-md-6 "><img src="img/przod_maly.jpg" alt="widok na pensjonat" class="photo-przod"></div>

            <div class="col-12 col-md-6"><img src="img/800x500_9.jpg" alt="widok korytarz" class="photo-korytarz"></div>

            </div>
            <div>
              <img src="img/800x500_12.jpg" alt="swietlica pensjonatu" class="photo-swietlica">
            </div>

            <div class="row">
              <div class="col-12 col-md-6"><img src="img/800x500_7.jpg" alt="apartament w Pogodna Jesien" class="photo-apartament"></div>

              <div class="col-12 col-md -6"><img src="img/pokoj_maly.jpg" alt="pokoj w Pogodna Jesien" class="photo-pokoj"></div>
            </div>
          <div>
            <img src="img/800x500_8.jpg" alt="strefa wejsciowa" class="photo-hall">
          </div>

          </div>

        </section>
        <!-- /GALERIA -->

        <!-- KONTAKT -->
        <section id="kontakt" class="primary-color yellow">

          <div class="secondary col">
            <h2 >Skontaktuj się z nami</h2>

                    <address class="">
                    Pensjonat Pogodna Jesień Sp. z o.o.<br>
                    ul. ks. H. Renka 63<br>
                    42-603 Tarnowskie Góry
                    </address>

                    <p><a href="mailto:pogodna@jesien.com.pl">pogodna@jesien.com.pl</a></p>
                    <p>
                    +48 602 797 205<br>
                    32 284 54 59<br>
                    32 284 54 62<br><br>
                    inspektor ochrony danych: +48 668 975 805
                    </p>

                    <h3>Dane do płatności</h3>
                      <p>Bank: Santander BP S.A.<br>
                      Numer konta:09 1090 2011 0000 0001 1302 4243<br>
                      Numer SWIFT: WBKPPLPP</p>
          </div>

                <div class="primary col">


                      <form method="post" action="" id="form_2" novalidate>


                      <h2>Napisz do nas</h2>

                      <?php

                      ?>
                      <?php
                      if(isset($_GET["status"]) && $_GET["status"] == "thanks"){
                        echo "<p class=wazne>Dziękujemy za wysłanie wiadomości!</P>";
                      }?>
                      <?php
                      if (isset($error_message)){
                        echo "<p class=wazne>$error_message</p>";
                      }?>
                      <fieldset class="fieldset">
                        <label for="name">Imię i nazwisko:</label><br>
                        <input type="text" id="name" name="user_name" required><br><br>

                        <label for="mail">E-mail:</label><br>
                        <input type="email" id="mail" name="user_email" required><br>

                        <p class="ponny">
                          <label>Proszę nie uzupełniać tego pola</label>
                          <input type="text" name="url">
                        </p>

                      </fieldset>
                      <fieldset class="fieldset"><br>
                        <label for="user_text">Wiadomość:</label><br>
                        <textarea id="message" name="user_text" rows="8" maxlength="655" required></textarea><br>
                      </fieldset><br>
                      <button type="submit" value="send" name="button" id="button">Wyślij wiadomość</button>

                    </form>

                </div>

          </section>

          <div id="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2100.907131393209!2d18.80668648938962!3d50.42088576458034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471129425abce421%3A0xcdabae3a73b40fa1!2sPensjonat+Seniora+%22Pogodna+Jesie%C5%84%22!5e0!3m2!1spl!2spl!4v1553370849561"
            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

      </main>
      <div class="coral"><!--wrapper div-->
      <footer id="footer" class="primary-color">

        <p>
        <small>Zezwolenie Wojewody Śląskiego na prowadzenie całodobowej opieki nad osobami niepełnosprawnymi i starszymi nr: PS.II.9041/2/10</small></p>
        <p><small>&copy;2019 Pensjonat Pogodna Jesień</small></p>
      </footer>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--SCROLLING TO THE TOP OF THE PAGE AFTER REFRESHING-->
    <!-- <script src="stylesheet/to-the-top.js"></script> -->
    <!--Sticky nav-->
    <script src="stylesheet/sticky-nav.js"></script>
  </body>

</html>
