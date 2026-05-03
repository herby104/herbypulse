<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

/* ===== THEME ===== */
body{
    font-family:"Segoe UI",sans-serif;
    transition:0.3s;
}

.dark-mode{
    background:#0f172a;
    color:white;
}

.light-mode{
    background:white;
    color:#0f172a;
}

/* HEADER */
.header{
    text-align:center;
    padding:60px 20px;
}

.header h2{
    font-weight:800;
}

/* CARD */
.skill-card{
    background:#ffffff;
    border-radius:16px;
    padding:20px;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    transition:0.3s;
}

.dark-mode .skill-card{
    background:#1e293b;
    color:white;
}

/* PROGRESS */
.progress{
    height:8px;
    border-radius:20px;
}

.progress-bar{
    background:#38bdf8;
}

/* BUTTONS */
.btn-custom{
    background:#38bdf8;
    border:none;
    padding:10px 18px;
    border-radius:10px;
    color:white;
    font-weight:600;
    margin:5px;
}

/* COUNTER */
.counter{
    font-size:2rem;
    font-weight:800;
}

/* CHART */
.chart-box{
    max-width:500px;
    margin:auto;
}

</style>

<!-- ================= HEADER ================= -->
<div class="header">
    <h2>⚡ Mes Compétences</h2>

    <button class="btn-custom" onclick="toggleMode()">🌙 Dark/Light</button>
    <button class="btn-custom" onclick="exportPDF()">📄 Export PDF</button>
</div>

<!-- ================= SKILLS + COUNTERS ================= -->
<div class="container">

<div class="row g-4">

    <div class="col-md-4" data-aos="fade-up">
        <div class="skill-card text-center">
            <h5>PHP POO</h5>
            <div class="counter" data-target="90">0</div>
        </div>
    </div>

    <div class="col-md-4" data-aos="fade-up">
        <div class="skill-card text-center">
            <h5>JavaScript</h5>
            <div class="counter" data-target="85">0</div>
        </div>
    </div>

    <div class="col-md-4" data-aos="fade-up">
        <div class="skill-card text-center">
            <h5>MySQL</h5>
            <div class="counter" data-target="80">0</div>
        </div>
    </div>

</div>

</div>

<!-- ================= RADAR CHART ================= -->
<div class="chart-box mt-5" data-aos="zoom-in">
    <canvas id="skillsChart"></canvas>
</div>

<!-- ================= JS ================= -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init();

/* ===== COUNTER ANIMATION ===== */
const counters = document.querySelectorAll('.counter');

counters.forEach(counter=>{
    counter.innerText = "0";

    const update = ()=>{
        const target = +counter.getAttribute('data-target');
        const value = +counter.innerText;

        const inc = target / 50;

        if(value < target){
            counter.innerText = Math.ceil(value + inc);
            setTimeout(update, 40);
        }else{
            counter.innerText = target + "%";
        }
    }

    update();
});

/* ===== DARK MODE ===== */
function toggleMode(){
    document.body.classList.toggle("dark-mode");
}

/* ===== CHART ===== */
const ctx = document.getElementById('skillsChart');

new Chart(ctx, {
    type: 'radar',
    data: {
        labels: ['PHP', 'JavaScript', 'MySQL', 'Bootstrap', 'API', 'Linux'],
        datasets: [{
            label: 'Compétences',
            data: [90, 85, 80, 95, 85, 70],
            backgroundColor: 'rgba(56,189,248,0.2)',
            borderColor: '#38bdf8',
            pointBackgroundColor: '#38bdf8'
        }]
    },
    options: {
        scales: {
            r: {
                suggestedMin: 0,
                suggestedMax: 100
            }
        }
    }
});

/* ===== EXPORT PDF SIMPLE ===== */
function exportPDF(){
    window.print();
}
</script>