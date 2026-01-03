<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrek - Carbon Offset By Credits</title>
    <link rel="shortcut icon" href="\EcoTrek\assests\media\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="assests/main/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header>
        <?php include 'assests/header-footer/header.php'; ?>
    </header>
    <section class="carbon-offset-section">
        <img src="assests/media/Lush.jpg" alt="" class="background">
        <div class="overlay1"></div>
         <div class="offset-section">
            <div class="offset-content">
                <div class="offset-heading">
                    <h1>Purchase Carbon Credits</h1>
                    <p>A whopping 50,000 pounds a year!* That’s the average American’s carbon footprint from our home, work, travel and everything else we do and buy. You can be a leader in the fight against climate change. Offset your carbon footprint and support our industry-leading carbon reduction projects.</p>
                    <div class="underline"></div>
                    <p>Need help? Use our calculators to help either individuals or business find out how much carbon to offset.</p>
                    <a href="/EcoTrek/businessCalculator.php" class="button">Business Emissions Calculator</a>
                </div>
            </div>
            <div class="offset-form-section">
                <h1 class="offset-hp">I want to offset by:</h1>
                <div class="offset-toggle-btns">
                    <button class="offset-toggle offset-active" onclick="toggleMode('dollar')">Dollar Amount</button>
                    <button class="offset-toggle" onclick="toggleMode('credit')">Credit Amount</button>
                </div>
                <div class="amount-box" id="dollar-box">
                    <p>Enter Rupees Amount</p>
                    <input type="number" id="dollar-amount" value="1000" oninput="updateCreditsFromDollar()">
                    <p class="note">Please enter a number greater than or equal to ₹1000. Values will be rounded to the nearest Carbon Credit amount.</p>
                    <div class="frequency-btns">
                        <button class="active" onclick="updateAmount('one-time')">One-Time</button>
                        <button onclick="updateAmount('monthly')">Monthly</button>
                        <button onclick="updateAmount('quarterly')">Quarterly</button>
                        <button onclick="updateAmount('yearly')">Yearly</button>
                    </div>
                    <p class="dollar-co2-display carbon-offset">CO2 Offset: 1 Tonnes</p>
                    <p class="offset-hp offset-amount-info">Total <strong id="dollar-credits">1 CREDITS</strong></p>
                    <button class="submit-btn add-to-cart">Add To Cart</button>
                </div>
                <div class="amount-box" id="credit-box" style="display: none;">
                    <p>Enter Credit Amount</p>
                    <input type="number" id="credit-amount" value="1" oninput="updateDollarFromCredits()">
                    <p class="note">Each credit offsets a portion of carbon emissions. Enter the number of credits you wish to purchase.</p>
                    <div class="frequency-btns">
                        <button class="active" onclick="updateAmount('one-time')">One-Time</button>
                        <button onclick="updateAmount('monthly')">Monthly</button>
                        <button onclick="updateAmount('quarterly')">Quarterly</button>
                        <button onclick="updateAmount('yearly')">Yearly</button>
                    </div>
                    <p class="credit-co2-display carbon-offset">CO2 Offset: 1 Tonnes</p>
                    <p>Total <strong id="credit-total">₹1000.00</strong></p>
                    <button class="submit-btn  add-to-cart">Add To Cart</button>
                </div> 
            </div>    
        </div>
    </section>
    <div class="offset-info-guide">
        <div class="info-guide-card">
            <h1 class="offset-hp">Unsure About Your Impact?</h1>
            <p class="info-guide-p">Use Our Calculator To See How Much Carbon To Offset</p>
            <a href="/EcoTrek/businessCalculator.php" class="button">Business Emissions Calculator</a>
        </div>
        <div class="info-guide-card">
            <h1 class="offset-hp">Already Know Your Impact?</h1>
            <p class="info-guide-p">Instantly Offset Your Carbon With Our Offset Projects</p>
            <a href="/EcoTrek/carbon-project.php" class="button">Choose A Offset Program Now</a>
        </div>
    </div>
    <section class="certificate-section">
        <div class="text-content">
            <p>Proof of Purchase</p>
            <h2>Receive A Certificate Upon Purchase</h2>
        </div>
        <div class="certificate-image">
            <img src="assests/media/Carbon-Footprint-Certificate.png" alt="Carbon Credit Certificate">
        </div>
    </section>
    <section class="carbon-offset-section">
        <img src="assests/media/wind-turbines-energy-converters.jpg" alt="" class="background">
        <div class="overlay1"></div>
         <div class="carbon-project-section">
            <div class="carbon-project-content">
                <div class="carbon-project-heading">
                    <h1>Purchase Carbon Credits</h1>
                    <p>We Are Committed To Supporting And Providing The Highest Quality Carbon Offset Projects.</p>
                    <a href="/EcoTrek/carbon-project.php" class="button">Explore Now</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        const CREDIT_TO_RUPEE = 1000;
        let baseRupees = 1000; 
        let baseCredits = 1; 
        let selectedFrequency = 'one-time';  
        function toggleMode(mode) {
            if (mode === 'dollar') {
                document.getElementById('dollar-box').style.display = 'block';
                document.getElementById('credit-box').style.display = 'none';
                document.querySelector(".offset-toggle.offset-active").classList.remove("offset-active");
                document.querySelector(".offset-toggle:first-child").classList.add("offset-active");
            } else {
                document.getElementById('dollar-box').style.display = 'none';
                document.getElementById('credit-box').style.display = 'block';
                document.querySelector(".offset-toggle.offset-active").classList.remove("offset-active");
                document.querySelector(".offset-toggle:last-child").classList.add("offset-active");
            }
            updateAmounts();
            updateFrequencyButtons();
        }
        function updateAmounts() {
            const frequencyMultiplier = getFrequencyMultiplier(selectedFrequency);
            const rupeesForFrequency = Math.round(baseRupees * frequencyMultiplier);
            const creditsForFrequency = Math.round(baseCredits * frequencyMultiplier);
            document.getElementById('dollar-amount').value = rupeesForFrequency;
            document.getElementById('credit-amount').value = creditsForFrequency;
            document.getElementById('dollar-credits').textContent = `${creditsForFrequency} CREDITS`;
            document.getElementById('credit-total').textContent = `₹${rupeesForFrequency}`;
            updateCO2Offset(creditsForFrequency);
        }
        function updateCO2Offset(creditAmount) {
            let co2Offset = creditAmount || 1;
            document.querySelector('.dollar-co2-display').textContent = `CO2 Offset: ${co2Offset} Tonnes`;
            document.querySelector('.credit-co2-display').textContent = `CO2 Offset: ${co2Offset} Tonnes`;
        }
        function updateCreditsFromDollar() {
            let rupees = parseFloat(document.getElementById('dollar-amount').value) || 1000;
            baseRupees = rupees;
            baseCredits = rupees / CREDIT_TO_RUPEE;
            updateAmounts();
        }
        function updateDollarFromCredits() {
            let credits = parseFloat(document.getElementById('credit-amount').value) || 1;
            baseCredits = credits;
            baseRupees = credits * CREDIT_TO_RUPEE;
            updateAmounts();
        }
        function checkAndUpdateOnBlur() {
            if (baseRupees < 1000) {
                baseRupees = 1000;
                baseCredits = baseRupees / CREDIT_TO_RUPEE;
            }
            if (baseCredits < 1) {
                baseCredits = 1;
                baseRupees = baseCredits * CREDIT_TO_RUPEE;
            }
            updateAmounts();
        }
        document.getElementById('dollar-amount').addEventListener('input', updateCreditsFromDollar);
        document.getElementById('credit-amount').addEventListener('input', updateDollarFromCredits);
        document.getElementById('dollar-amount').addEventListener('blur', checkAndUpdateOnBlur);
        document.getElementById('credit-amount').addEventListener('blur', checkAndUpdateOnBlur);
        function updateAmount(frequency) {
            selectedFrequency = frequency;
            updateFrequencyButtons();
            updateAmounts();
        }
        function updateFrequencyButtons() {
            document.querySelectorAll('.frequency-btns button').forEach(btn => btn.classList.remove('active'));
            let index = getFrequencyIndex(selectedFrequency);
            document.querySelector(`#dollar-box .frequency-btns button:nth-child(${index})`).classList.add('active');
            document.querySelector(`#credit-box .frequency-btns button:nth-child(${index})`).classList.add('active');
        }
        function getFrequencyIndex(frequency) {
            switch (frequency) {
                case 'one-time': return 1;
                case 'monthly': return 2;
                case 'quarterly': return 3;
                case 'yearly': return 4;
                default: return 1;
            }
        }
        function getFrequencyMultiplier(frequency) {
            switch (frequency) {
                case 'one-time': return 1;
                case 'monthly': return 30;
                case 'quarterly': return 90;
                case 'yearly': return 360;
                default: return 1;
            }
        }
        updateAmounts();
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
            if (selectedProject) {
                document.querySelectorAll('.project-card').forEach(card => {
                    if (card.getAttribute('data-project-id') === selectedProject) {
                        card.classList.add('selected');
                        card.querySelector('.select-project').innerText = 'Selected';
                    }
                });
            }
            document.querySelectorAll('.select-project').forEach(button => {
                button.addEventListener('click', function () {
                    const projectCard = this.closest('.project-card');
                    const projectId = projectCard.getAttribute('data-project-id');
                    const projectName = projectCard.querySelector('.project-name').innerText.trim(); // Get project name
                
                    console.log("🚀 Project ID:", projectId);
                    console.log("✅ Project Name:", projectName);

                    localStorage.setItem('selectedProject', projectId);
                    localStorage.setItem('selectedProjectName', projectName);

                    document.querySelectorAll('.project-card').forEach(card => card.classList.remove('selected'));
                    document.querySelectorAll('.select-project').forEach(btn => btn.innerText = 'Select');

                    projectCard.classList.add('selected');
                    this.innerText = 'Selected';

                    console.log("Stored Project ID in localStorage:", localStorage.getItem('selectedProject'));
                    console.log("Stored Project Name in localStorage:", localStorage.getItem('selectedProjectName'));

                    const carbonOffset = 1;
                    const creditAmount = 1000; 
                    const dollarAmount = 1000; 
                
                    const redirectUrl = `/EcoTrek/CarbonCredits.php?project=${projectId}&name=${encodeURIComponent(projectName)}&       offset=${carbonOffset}&credit=${creditAmount}&dollar=${dollarAmount}`;

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
                
                    console.log("Checking Project Selection:", selectedProject);
                
                    const creditAmount = document.getElementById('credit-amount')?.value || "1";
                    const dollarAmount = document.getElementById('dollar-amount')?.value || "1000";
                
                    let carbonOffset = creditAmount; 

                    if (!selectedProject) {
                        alert("⚠️ Please select a carbon offset project before proceeding.");
                        window.location.href = '/EcoTrek/carbon-project.php';
                        return; 
                    }
                
                    console.log("Redirecting to Payment Page with project:", selectedProject, selectedProjectName);

                    window.location.href = `/EcoTrek/paymentForm.php?project=${selectedProject}&name=${encodeURIComponent       (selectedProjectName)}&offset=${carbonOffset}&credit=${creditAmount}&dollar=${dollarAmount}`;
                });
            });
        });
    </script>

    <?php include 'assests/header-footer/footer.php'; ?>

</body>
</html>