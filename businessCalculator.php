<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrek - Business Calulator</title>
    <link rel="shortcut icon" href="\EcoTrek\assests\media\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="assests/main/main.css">
</head>
<body>
    <header>
        <?php include 'assests/header-footer/header.php'; ?>
    </header>
    <section class="cal-section">
        <img src="assests/media/calculator.webp" alt="" class="background">

        <div class="overlay1"></div>

        <div class="hero-content cal-content">
            <h1 class="main-heading">Business Emission Calculator</h1>
        </div>
    </section>
    <div class="cal-info">
        <p>Please complete each step of the business emissions calculator that is relevant to your business, using actual (or estimated) annual operational data.</p>
        <p class="instruction">Press the <span>Next button</span> to skip any calculations.</p>
    </div>
    <div class="calculator-container">
        <h2 class="heading">Carbon Emissions Calculator</h2>
        <div class="calculator-content">
            <div class="calculator-toggle">
                <button class="active" onclick="showCategory(0)">Electricity</button>
                <button onclick="showCategory(1)">Heat</button>
                <button onclick="showCategory(2)">Travel</button>
                <button onclick="showCategory(3)">Shipping</button>
                <button onclick="showCategory(4)">Food</button>
                <button onclick="showCategory(5)">Waste</button>
                <button onclick="showCategory(6)">Water</button>
                <button onclick="showCategory(7)">Total</button>
            </div>
            <div class="input-result-wrapper">
                <div class="input-section">
                    <div id="electricity" class="input-group active-category">
                        <h3>Annual Electricity Usage</h3>
                        <div class="input">
                            <label for="electricityInput" class="heading">kWh</label>
                            <input type="number" id="electricityInput" placeholder="Enter kWh" value="0">
                        </div>
                        <div class="category-result">
                            <p>Tonnes CO2: <span id="electricityCO2">0.000</span></p>
                            <p>Total Cost: <span id="electricityCost">0.00 INR</span></p>
                        </div>
                    </div>
                    <div id="heat" class="input-group">
                        <h3>Annual Heating Usage</h3>
                        <div class="input">
                            <label for="heatInput" class="heading">Therms</label>
                            <input type="number" id="heatInput" placeholder="Enter Therms" value="0">
                        </div>
                        <div class="category-result">
                            <p>Tonnes CO2: <span id="heatCO2">0.000</span></p>
                            <p>Total Cost: <span id="heatCost">0.00 INR</span></p>
                        </div>
                    </div>
                    <div id="travel" class="input-group">
                        <h3>Vehicle Fuel Usage</h3>
                        <div class="input">
                            <label for="vehicleInput" class="heading">Liters</label>
                            <input type="number" id="vehicleInput" placeholder="Enter Liters" value="0">
                        </div>
                        <div class="input">
                            <label for="airInput" class="heading">Air Travel (Miles):</label>
                            <input type="number" id="airInput" placeholder="Enter Miles" value="0">
                        </div>
    
                        <div class="input">
                            <label for="railInput" class="heading">Rail Travel (Miles):</label>
                            <input type="number" id="railInput" placeholder="Enter Miles" value="0">
                        </div>
    
                        <div class="category-result">
                            <p>Tonnes CO2: <span id="travelCO2">0.000</span></p>
                            <p>Total Cost: <span id="travelCost">0.00 INR</span></p>
                        </div>
                    </div>
                    <div id="shipping" class="input-group">
                        <h3>Shipping Emissions</h3>
                            <div class="input">
                                <label for="shippingInput" class="heading">kg CO2</label>
                                <input type="number" id="shippingInput" placeholder="Enter kg CO2" value="0">
                            </div>
                        
                            <div class="category-result">
                                <p>Tonnes CO2: <span id="shippingCO2">0.000</span></p>
                                <p>Total Cost: <span id="shippingCost">0.00 INR</span></p>
                            </div>
                    </div>
                    <div id="food" class="input-group">
                        <h3>Food Consumption</h3>
                        <div class="input">
                            <label for="foodInput" class="heading">kg CO2</label>
                            <input type="number" id="foodInput" placeholder="Enter kg CO2" value="0">
                        </div>
                        <div class="category-result">
                            <p>Tonnes CO2: <span id="foodCO2">0.000</span></p>
                            <p>Total Cost: <span id="foodCost">0.00 INR</span></p>
                        </div>
                    </div>
                    <div id="waste" class="input-group">
                        <h3>Waste Production</h3>
                        <div class="input">
                            <label for="wasteInput" class="heading">kg CO2</label>
                            <input type="number" id="wasteInput" placeholder="Enter kg CO2" value="0">
                        </div>
                   
                        <div class="category-result">
                            <p>Tonnes CO2: <span id="wasteCO2">0.000</span></p>
                            <p>Total Cost: <span id="wasteCost">0.00 INR</span></p>
                        </div>
                    </div>
                    <div id="water" class="input-group">
                        <h3>Water Usage</h3>
                        <div class="input">
                            <label for="waterInput" class="heading">m³</label>
                            <input type="number" id="waterInput" placeholder="Enter m³" value="0">
                        </div>
                    
                        <div class="category-result">
                            <p>Tonnes CO2: <span id="waterCO2">0.000</span></p>
                            <p>Total Cost: <span id="waterCost">0.00 INR</span></p>
                        </div>
                    </div>
                    <div id="total" class="input-group active-category">
                        <p>Total CO₂ Offset: <span id="totalCO2Offset">0</span> tonnes</p>
                        <p>Total Cost: <span id="totalCostSummary">0.00 INR</span></p>
                        <p>Credit Price: <span id="creditPrice">1000 INR</span></p>
                        <p>Credits To Purchase: <span id="creditsToPurchase">0</span></p>
                        <a id="buyNowButton" class="button" href="/EcoTrek/carbon-project.php">Offset Now</a>
                    </div>
                    <button id="prevButton" class="button" onclick="changeCategory(-1)">Previous</button>
                    <button id="nextButton" class="button" onclick="changeCategory(1)">Next</button>
                </div>
                <div class="result-section">
                    <h3 class="heading">Emissions Total</h3>
                    <div class="total">
                        <p>Total: <span id="totalCost">0.00 INR</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let categories = ['electricity', 'heat', 'travel', 'shipping', 'food', 'waste', 'water', 'total'];
        let currentIndex = 0;
        function showCategory(index) {
            if (index < 0 || index >= categories.length) return;
            currentIndex = index;
            document.querySelectorAll('.input-group').forEach((group, i) => {
                group.classList.toggle('active-category', i === index);
            });
            document.querySelectorAll('.calculator-toggle button').forEach((btn, i) => {
                btn.classList.toggle('active', i === index);
            });
            const totalDiv = document.getElementById('total');
            if (index === 7) {
                totalDiv.style.display = 'block';
            } else {
                totalDiv.style.display = 'none';
            }
        }
        function changeCategory(step) {
            let newIndex = currentIndex + step;
            if (newIndex >= 0 && newIndex < categories.length) {
                showCategory(newIndex);
            }
        }
        const emissionFactors = {
            electricity: 0.000707,
            heat: 0.0053,
            travel: {
            vehicle: 0.0023,
            air: 0.00015,
            rail: 0.00003
            },
            shipping: 1.0,
            food: 1.0,
            waste: 1.0,
            water: 0.000298
        };
        const creditPrice = 1000;
        function calculateEmissions() {
            let totalCO2 = 0;
            let totalCost = 0;
            let categories = ['electricity', 'heat', 'travel', 'shipping', 'food', 'waste', 'water'];
            let totalSection = document.querySelector('.total');
            totalSection.innerHTML = '';

            function updateCategory(id, tonnesCO2) {
                let cost = tonnesCO2 * creditPrice;
                document.getElementById(id + 'CO2').textContent = tonnesCO2.toFixed(3);
                document.getElementById(id + 'Cost').textContent = cost.toFixed(2) + ' INR';
                if (tonnesCO2 > 0) {
                    let resultEntry = document.createElement('p');
                    resultEntry.id = id + 'Result';
                    resultEntry.innerHTML = `${id.charAt(0).toUpperCase() + id.slice(1)}: <span>${cost.toFixed(2)} INR</span>`;
                    totalSection.appendChild(resultEntry);
                }
                return { tonnesCO2, cost };
            }
            let electricity = parseFloat(document.getElementById('electricityInput').value) || 0;
            let electricityResult = updateCategory('electricity', electricity * emissionFactors.electricity);
            let heat = parseFloat(document.getElementById('heatInput').value) || 0;
            let heatResult = updateCategory('heat', heat * emissionFactors.heat);
            let vehicle = parseFloat(document.getElementById('vehicleInput').value) || 0;
            let air = parseFloat(document.getElementById('airInput').value) || 0;
            let rail = parseFloat(document.getElementById('railInput').value) || 0;
            let travelCO2 = (vehicle * emissionFactors.travel.vehicle) + (air * emissionFactors.travel.air) + (rail * emissionFactors.travel.rail);
            let travelResult = updateCategory('travel', travelCO2);
            let shipping = parseFloat(document.getElementById('shippingInput').value) || 0;
            let shippingResult = updateCategory('shipping', shipping * emissionFactors.shipping);
            let food = parseFloat(document.getElementById('foodInput').value) || 0;
            let foodResult = updateCategory('food', food * emissionFactors.food);
            let waste = parseFloat(document.getElementById('wasteInput').value) || 0;
            let wasteResult = updateCategory('waste', waste * emissionFactors.waste);
            let water = parseFloat(document.getElementById('waterInput').value) || 0;
            let waterResult = updateCategory('water', water * emissionFactors.water);
            totalCO2 = electricityResult.tonnesCO2 + heatResult.tonnesCO2 + travelResult.tonnesCO2 + shippingResult.tonnesCO2 + foodResult.tonnesCO2 + wasteResult.tonnesCO2 + waterResult.tonnesCO2;
            totalCost = electricityResult.cost + heatResult.cost + travelResult.cost + shippingResult.cost + foodResult.cost + wasteResult.cost + waterResult.cost;
            document.getElementById('totalCostSummary').textContent = totalCost.toFixed(2) + ' INR';
            document.getElementById('creditsToPurchase').textContent = Math.round(totalCO2);
            document.getElementById('totalCO2Offset').textContent = totalCO2.toFixed(3) + ' tonnes'; 
            let totalEntry = document.createElement('p');
            totalEntry.innerHTML = `Total: <span id="totalCost">${totalCost.toFixed(2)} INR</span>`;
            totalSection.appendChild(totalEntry);
            let roundedCredits = Math.round(totalCO2);
            let roundedCost = Math.round(roundedCredits * creditPrice);
            document.getElementById('creditsToPurchase').textContent = roundedCredits;
            document.getElementById('totalCostSummary').textContent = roundedCost.toFixed(2) + ' INR';
        }
        document.querySelectorAll('input[type=number]').forEach(input => {
            input.addEventListener('input', calculateEmissions);
        });
        calculateEmissions();
    </script>
    <?php include 'assests/header-footer/footer.php'; ?>
</body>
</html>