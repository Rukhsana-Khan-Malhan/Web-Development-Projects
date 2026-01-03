<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrek - Carbon Offset Projects</title>
    <link rel="stylesheet" href="assests/main/main.css">
</head>
<body>
    <header>
        <?php include 'assests/header-footer/header.php'; ?>
    </header>
     <section class="cal-section">
        <img src="assests/media/gettyimages-1350971530-1.webp" alt="" class="background">
        <div class="overlay1"></div>
        <div class="hero-content cal-content">
            <!-- <h1 class="main-heading">Explore Carbon Offset Programs</h1> -->
            <h1 class="main-heading">Choose a program to Offset your Carbon Emmission</h1>
            <!-- <p class="instruction">Choose a program to Offset your Carbon Emmission</p> -->
            <p>Purchase credits to support carbon offset projects and choose your program.</p>
            <a href="/EcoTrek/CarbonCredits.php" class="button">Purchase Now</a>
        </div>
    </section>
     <div class="category-toggle">
        <button class="toggle-btn active" onclick="showCategory('reforestation', this)">Reforestation</button>
        <button class="toggle-btn" onclick="showCategory('renewable-energy', this)">Renewable Energy</button>
        <button class="toggle-btn" onclick="showCategory('energy-efficiency', this)">Energy Efficiency</button>
        <button class="toggle-btn" onclick="showCategory('blue-carbon', this)">Blue Carbon</button>
        <button class="toggle-btn" onclick="showCategory('carbon-capture', this)">Carbon Capture</button>
    </div>
    <div id="projects">
        <div id="reforestation" class="category-projects">
            <div class="project-card" data-project-id="ECO-2025001">
                <img src="assests/media/Forest Restoration Initiative.jpg" alt="Reforestation Project 1" class="background">
                 <div class="project-card-content">
                    <h3 class="project-name">Forest Restoration Initiative</h3>
                    <div class="project-btn">
                        <a href="/EcoTrek/Forest-Restoration-Initiative.php" class="button">Learn More</a>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025002">
                <img src="assests/media/Mangrove Regeneration Program.avif" alt="Reforestation Project 1" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Mangrove Regeneration Program</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025003">
                <img src="assests/media/Native Tree Planting Campaign.jpeg" alt="Reforestation Project 3" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Native Tree Planting Campaign</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="renewable-energy" class="category-projects">
            <div class="project-card" data-project-id="ECO-2025004">
                <img src="assests/media/Solar Power Expansion.avif" alt="Renewable Energy Project 1" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Solar Power Expansion</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025005">
                <img src="assests/media/Wind Turbine Installation.webp" alt="Renewable Energy Project 2" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Wind Turbine Installation</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025006">
                <img src="assests/media/Hydropower Clean Energy.jpg" alt="Renewable Energy Project 3" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Hydropower Clean Energy</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="energy-efficiency" class="category-projects">
            <div class="project-card" data-project-id="ECO-2025007">
                <img src="assests/media/Smart Grid Modernization.avif" alt="Energy Efficiency Project 1" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Smart Grid Modernization</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025008">
                <img src="assests/media/LED Street Lighting Program.jpg" alt="Energy Efficiency Project 2" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">LED Street Lighting Program</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025009">
                <img src="assests/media/Industrial Energy Optimization.webp" alt="Energy Efficiency Project 3" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Industrial Energy Optimization</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="blue-carbon" class="category-projects">
            <div class="project-card" data-project-id="ECO-2025010">
                <img src="assests/media/Mangrove Conservation Initiative.webp" alt="Energy Efficiency Project 3" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Mangrove Conservation Initiative</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025011">
                <img src="assests/media/Seagrass Restoration Program.webp" alt="Blue Carbon Project 2" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Seagrass Restoration Program</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025012">
                <img src="assests/media/Coastal Wetland Protection.jpg" alt="Blue Carbon Project 3" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Coastal Wetland Protection</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="carbon-capture" class="category-projects">
            <div class="project-card" data-project-id="ECO-2025013">
                <img src="assests/media/Direct Air Capture Facility.jpg" alt="Carbon Capture Project 1" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Direct Air Capture Facility</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025014">
                <img src="assests/media/Industrial Carbon Storage.webp" alt="Carbon Capture Project 2" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Industrial Carbon Storage</h3>
                    <div class="project-btn">
                        <button class="button">Learn More</button>
                        <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
            <div class="project-card" data-project-id="ECO-2025015">
                <img src="assests/media/Enhanced Mineralization Project.jpg" alt="Carbon Capture Project 3" class="background">
                <div class="project-card-content">
                    <h3 class="project-name">Enhanced Mineralization Project</h3>
                    <div class="project-btn">
                    <button class="button">Learn More</button>
                    <button class="button select-project">Select</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showCategory(category, button) {
            const categories = document.querySelectorAll('.category-projects');
            categories.forEach(cat => cat.style.display = 'none');
            const buttons = document.querySelectorAll('.toggle-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            const selectedCategory = document.getElementById(category);
            selectedCategory.style.display = 'block';
            button.classList.add('active');
        }
        window.onload = () => {
            const defaultCategory = 'reforestation';
            const defaultButton = document.querySelector(`button[onclick="showCategory('${defaultCategory}', this)"]`);
            showCategory(defaultCategory, defaultButton);
        };
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function showCategory(category, button) {
                document.querySelectorAll('.category-projects').forEach(cat => cat.style.display = 'none');
                document.querySelectorAll('.toggle-btn').forEach(btn => btn.classList.remove('active'));
                document.getElementById(category).style.display = 'block';
                button.classList.add('active');
            }
            const defaultCategory = 'reforestation';
            const defaultButton = document.querySelector(`button[onclick="showCategory('${defaultCategory}', this)"]`);
            if (defaultButton) {
                showCategory(defaultCategory, defaultButton);
            }
            const selectedProject = localStorage.getItem('selectedProject');
            const selectedProjectName = localStorage.getItem('selectedProjectName');
            if (selectedProject) {
                document.querySelectorAll('.project-card').forEach(card => {
                    if (card.getAttribute('data-project-id') === selectedProject) {
                        card.classList.add('selected');
                        const selectButton = card.querySelector('.select-project');
                        if (selectButton) {
                            selectButton.innerText = 'Selected';
                        }
                    }
                });
            }
            document.querySelectorAll('.select-project').forEach(button => {
                button.addEventListener('click', function () {
                    const projectCard = this.closest('.project-card');
                    const projectId = projectCard.getAttribute('data-project-id');
                    const projectName = projectCard.querySelector('.project-name').innerText.trim(); 
                    console.log("Project ID:", projectId);
                    console.log("Project Name:", projectName);
                    localStorage.setItem('selectedProject', projectId);
                    localStorage.setItem('selectedProjectName', projectName);
                    document.querySelectorAll('.project-card').forEach(card => {
                        card.classList.remove('selected');
                        card.querySelector('.select-project').innerText = 'Select';
                    });
                    projectCard.classList.add('selected');
                    this.innerText = 'Selected';
                    const carbonOffset = 1; 
                    const creditAmount = 1000; 
                    const dollarAmount = 1000; 
                    const redirectUrl = `/EcoTrek/CarbonCredits.php?project=${projectId}&name=${encodeURIComponent(projectName)}&offset=${carbonOffset}&credit=${creditAmount}&dollar=${dollarAmount}`;
                    setTimeout(() => {
                        window.location.href = redirectUrl;
                    }, 500);
                });
            });
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const selectedProject = localStorage.getItem('selectedProject');
                    const selectedProjectName = localStorage.getItem('selectedProjectName');
                    const creditAmount = document.getElementById('credit-amount')?.value || "1";
                    const dollarAmount = document.getElementById('dollar-amount')?.value || "1000";
                    let carbonOffset = creditAmount;  
                    if (!selectedProject) {
                        alert("⚠️ Please select a carbon offset project before proceeding.");
                        window.location.href = '/EcoTrek/carbon-project.php'; 
                        return; 
                    }
                    window.location.href = `/EcoTrek/paymentForm.php?project=${selectedProject}&name=${encodeURIComponent(selectedProjectName)}&offset=${carbonOffset}&credit=${creditAmount}&dollar=${dollarAmount}`;
                });
            });
        });
    </script>
    <?php include 'assests/header-footer/footer.php'; ?>
</body>
</html>