<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Royal Offerings | Indian Wedding Services</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<style>
.offerings-section { padding: 80px 5%; max-width: 1200px; margin: 0 auto; }
.offering-block { display: flex; align-items: center; gap: 40px; margin-bottom: 80px; }
.offering-block:nth-child(even) { flex-direction: row-reverse; }
.offering-img { flex: 1; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(44, 30, 22, 0.1); }
.offering-img img { width: 100%; height: 400px; object-fit: cover; }
.offering-content { flex: 1; }
.offering-content h3 { font-size: 2.2rem; margin-bottom: 15px; color: var(--text-primary); }
.offering-content p { color: var(--text-secondary); font-size: 1.1rem; margin-bottom: 25px; }

@media(max-width: 768px) {
  .offering-block, .offering-block:nth-child(even) { flex-direction: column; }
  .offering-img img { height: 250px; }
}
</style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<section class="hero" style="padding-bottom: 40px;">
  <div class="hero-content">
    <h1>Our <span style="font-style: italic; color: var(--accent);">Heritage Offerings</span></h1>
    <p>A comprehensive gateway into the majestic ceremonies we engineer. From vibrant morning rituals to palatial evening receptions, we honor every sacred step of the Indian wedding sequence.</p>
  </div>
</section>

<div class="offerings-section">

  <div class="offering-block">
    <div class="offering-img">
      <img src="assets/images/shaadi.png" alt="The Grand Shaadi">
    </div>
    <div class="offering-content">
      <h3>The Grand Shaadi</h3>
      <p>Our flagship offering. We construct breathtaking bespoke Mandaps, orchestrate flawless Baraat processions with traditional drumming, and ensure the Saat Phere is conducted in a divine, serene atmosphere wrapped in floral grandeur.</p>
      <a href="booking.php?event=The%20Grand%20Shaadi" class="btn">Book the Shaadi</a>
    </div>
  </div>

  <div class="offering-block">
    <div class="offering-img">
      <img src="assets/images/shaadi.png" alt="Sangeet and Mehndi">
    </div>
    <div class="offering-content">
      <h3>Sangeet & Mehndi</h3>
      <p>We transform your evening into an electrifying Bollywood spectacle. We provide elite choreographers, world-class DJs, and plush, colorful diwan seating to ensure the Mehndi applies beautifully while the families unite in joyous dance.</p>
      <a href="booking.php?event=Sangeet%20&%20Mehndi" class="btn">Plan Your Sangeet</a>
    </div>
  </div>

  <div class="offering-block">
    <div class="offering-img">
      <img src="assets/images/shaadi.png" alt="Haldi Ceremony">
    </div>
    <div class="offering-content">
      <h3>The Haldi Ceremony</h3>
      <p>Bathed in the color of joy. We curate interactive, vibrant Haldi setups featuring massive clay urns, cascade marigold drapings, and organic, fragrant turmeric pastes to honor this deeply intimate pre-wedding tradition.</p>
      <a href="booking.php?event=Haldi%20Ceremony" class="btn">Organize Haldi</a>
    </div>
  </div>

  <div class="offering-block">
    <div class="offering-img">
      <img src="assets/images/shaadi.png" alt="Gastronomy and Theme">
    </div>
    <div class="offering-content">
      <h3>Royal Themes & Gastronomy</h3>
      <p>Immerse your guests in our <b>Rajputana Royal</b> or <b>Mughal Heritage</b> visual themes. Pair the aesthetic with our Maharaja Grand Buffets or Live Chaat counters to ensure leaving a lasting royal taste on the palette.</p>
      <a href="restaurant.php" class="btn" style="background:transparent; color:var(--text-primary); border:1px solid var(--text-primary);">View Gastronomy</a>
    </div>
  </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
