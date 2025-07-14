<?php
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/userPage.util.php';

require_once HANDLERS_PATH . '/booking.handler.php';
require_once UTILS_PATH . '/booking.util.php';

Auth::init();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baxcalibur | Lumina Edge Itineraries</title>

  <!-- Favicon -->
  <link rel="icon" href="../../assets/img/baxcalibur-logo.png" type="image/png" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet" />

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" />
  <link rel="stylesheet" href="../luminaEdgeBookingPage/assets/css/style.css" />
</head>

<body>
  <?php include_once LAYOUTS_PATH . '/userNavbar.layout.php'; ?>

  <!-- Headline Image -->
  <section class="itinerary-headline">
    <div class="headline-overlay">
      <h1>Welcome to <span class="highlighted">LUMINA EDGE</span></h1>
    </div>
  </section>

  <!-- Itinerary Section -->
  <section class="itinerary-section">
    <h2 class="itinerary-title">ITINERARIES</h2>

    <!-- Table 1: Guided Tour -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Pathlink Guided Traverse</h3>
      <p class="itinerary-description">A synced city exploration led by expert guides.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Meet at Radiant Terminal</li>
            <li>Explore Skylume District</li>
            <li>Cyber café breakfast</li>
            <li>Augmented skyline tour</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>GlidePod scenic ride</li>
            <li>Walk through LightVein Tunnels</li>
            <li>Visit Neon Relics Museum</li>
            <li>Snack at Volt Vista Café</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Stroll across Skystep Promenade</li>
            <li>Dinner at Pulsebyte Grill</li>
            <li>Guided holo-light show</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 2: Unguided Tour -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Solo City Loop</h3>
      <p class="itinerary-description">Explore Lumina Edge with a planned route – no tour guide included.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Checkpoint at LightCore</li>
            <li>Self-tour at Neon Archive</li>
            <li>Optional stops at cyber stalls</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Ride the GlowRail loop</li>
            <li>Lunch at Nexus Café</li>
            <li>Check out holo-exhibits</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Watch lights at Prism Plaza</li>
            <li>Free-roam at night arcade</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 3: Free Exploration -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Custom Freewalk</h3>
      <p class="itinerary-description">You’re in charge. Design your own Lumina Edge day from start to nightfall.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Grab coffee at a corner sky café</li>
            <li>Explore kinetic art installations</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Visit any gallery, museum, or VR dome</li>
            <li>Hoverboard rentals at Fusion Strip</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Chill at neon lounges or rooftop decks</li>
            <li>Optional: attend a pulse rave or laser show</li>
          </ul>
        </div>
      </div>
    </div>
    <form action="/handlers/booking.handler.php" method="POST">
      <input type="hidden" name="trip_id" value="2">
      <button type="submit" class="button">Book</button>
    </form>
  </section>

  <?php include_once BASE_PATH . '/layouts/footer.php'; ?>
</body>

</html>
