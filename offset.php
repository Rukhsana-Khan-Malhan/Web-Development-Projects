<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrek - Offset Carbon Emmissions</title>
    <link rel="shortcut icon" href="\EcoTrek\assests\media\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="assests/main/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header>
        <?php include 'assests/header-footer/header.php'; ?>
    </header>
    <section class="carbon-offset-section">
        <img src="assests/media/wind-turbines-energy-converters.jpg" alt="" class="background">
        <div class="overlay1"></div>
        <div class="carbon-offest-content">
            <h1>Offsetting Your Carbon Footprint in Three Simple Steps</h1>
            <p>Everyone contributes to the world’s carbon emission problems. Be part of the solution to a cleaner and greener planet. By taking the easy steps of calculating your carbon footprint, and purchasing credits, you can support game-changing projects and mitigate the footprint you leave on Earth. Each carbon credit purchased removes one tonne of carbon dioxide equivalent gas emissions from the atmosphere.</p> 
        </div>
    </section>
    <section class="contact-section step-section">        
        <div class="container">
            <h2 class="section-title">What We Do</h2>
            <div class="what-we-do">
                <div class="what-we-do-card">
                    <div class="what-we-do-icon">
                    <i class="fas fa-calculator"></i> 
                </div>
                <div class="card-content">
                    <h3>Carbon Footprint Calculator</h3>
                    <p>Quickly calculate your carbon emissions based on daily activities and lifestyle choices. Understand how small changes can make a big difference. Take control of your environmental impact and start reducing today.</p>
                    <a href="/EcoTrek/businessCalculator.php" class="button">Explore Now</a>
                </div>
            </div>    
            <div class="what-we-do-card">
                <div class="what-we-do-icon">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="card-content">
                    <h3>Token Purchase</h3>
                    <p>Purchase carbon offset tokens to neutralize your emissions and support the planet. Your tokens help fund verified environmental projects worldwide. Make a meaningful contribution to sustainability with every purchase.</p>
                    <a href="/EcoTrek/CarbonCredits.php" class="button">Explore Now</a>
                </div>
            </div>    
            <div class="what-we-do-card">
                <div class="what-we-do-icon">
                    <i class="fas fa-tree"></i>
                </div>
                <div class="card-content">
                    <h3>Offset Projects</h3>
                    <p>Explore projects focused on reforestation, renewable energy, and carbon reduction. Every contribution you make helps reduce the global carbon footprint. Join us in supporting impactful initiatives for a sustainable future.</p>
                    <a href="/EcoTrek/carbon-project.php" class="button">Explore Now</a>
                </div>
            </div>
        </div>
    </section>
    <section class="certificate-section">
        <div class="text-content">
            <p>Proof of Purchase</p>
            <h2>Receive A Certificate Upon Purchase</h2>
        </div>
        <div class="certificate-image">
            <img src="assests/media/Carbon-Footprint-Certificate.png" alt="Carbon Credit Certificate">
        </div>
    </section>
    <?php include 'assests/header-footer/footer.php'; ?>
</body>
</html>