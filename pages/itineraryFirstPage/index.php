<?php
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baxcalibur | Vantac-X Itineraries</title>

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
  <link rel="stylesheet" href="../itineraryFirstPage/assets/css/style.css" />
</head>

<body>
  <?php include_once BASE_PATH . '/layouts/navbar.php'; ?>

  <!-- Headline Image -->
<!-- Headline Image with Overlay -->
<section class="itinerary-headline">
  <div class="headline-overlay">
    <h1>Welcome to <span class="highlighted">VANTAC-X</span></h1>
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
            <li>Meet at Syncpoint Terminal</li>
            <li>Explore Neon Bazaar</li>
            <li>Street food + chipware stalls</li>
            <li>Augmented city tour</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Ride Chrome Rail</li>
            <li>Walk Chraventunnel</li>
            <li>Visit Vault Gallery</li>
            <li>Snacks at GlitchGarden Lounge</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Tour Noir District</li>
            <li>Drink at ByteBar</li>
            <li>Dinner at CTRL-Eat</li>
            <li>Walkthrough street holograms</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 2: Unguided Tour -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Solo City Loop</h3>
      <p class="itinerary-description">Explore Vantac-X with a planned route – no tour guide included.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Checkpoint at Synclab Entry</li>
            <li>Visit Neon Archive</li>
            <li>Optional marketplace detour</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>ChromeRail self-guided loop</li>
            <li>Lunch near Vault Terminal</li>
            <li>Access AR Exploration Zone</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>VR Cinema Night (optional)</li>
            <li>Night market free-roam</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 3: Free Exploration -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Custom Freewalk</h3>
      <p class="itinerary-description">You’re in charge. Design your own Vantac-X day from start to neon-lit night.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Grab breakfast at any local pop-up</li>
            <li>Stroll through Neon Park or Synth Gardens</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Free choice of museums or galleries</li>
            <li>Hover-rentals available at Plaza X</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Visit rooftop bars or quiet neon cafés</li>
            <li>Optional music venues or VR domes</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <?php include_once BASE_PATH . '/layouts/footer.php'; ?>
</body>

</html>
