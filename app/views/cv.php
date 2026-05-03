<?php
// ================= TRACKING VISITE CV =================
$logDir = __DIR__ . "/../../logs";
$logFile = $logDir . "/cv_visits.log";

if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
}

$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$date = date("Y-m-d H:i:s");

file_put_contents($logFile, "$date - $ip\n", FILE_APPEND);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

<style>
body {
    background: #f8fafc;
    font-family: "Segoe UI", sans-serif;
    user-select: none;
}

/* WRAPPER */
.cv-wrapper {
    max-width: 1000px;
    margin: auto;
}

/* CARD */
.cv-card {
    background: #fff;
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    text-align: center;
}

/* VIEWER */
.cv-viewer {
    position: relative;
    height: 80vh;
    overflow: auto;
    background: #111;
    border-radius: 14px;
}

/* CANVAS */
canvas {
    display: block;
    margin: 10px auto;
    max-width: 100%;
}

/* WATERMARK */
.watermark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-25deg);
    font-size: 2.5rem;
    color: rgba(255,255,255,0.08);
    font-weight: bold;
    pointer-events: none;
}

/* CONTROLS */
.controls {
    margin-bottom: 15px;
}

.btn-cv {
    background: #38bdf8;
    border: none;
    padding: 8px 14px;
    border-radius: 10px;
    color: white;
    font-weight: 600;
    margin: 2px;
}

.btn-admin {
    background: #f59e0b;
    border: none;
    padding: 8px 14px;
    border-radius: 10px;
    color: white;
    font-weight: 600;
}

/* FULLSCREEN */
.fullscreen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: #111;
}
</style>

<div class="container mt-4 cv-wrapper">

    <div class="cv-card">

        <h2>📄 Mon CV Professionnel</h2>
     
        <!-- CONTROLS -->
        <div class="controls">

            <button class="btn-cv" onclick="zoomIn()">➕ Zoom</button>
            <button class="btn-cv" onclick="zoomOut()">➖ Zoom</button>
            <button class="btn-cv" onclick="toggleFullscreen()">⛶ Plein écran</button>

            <?php if(isset($_SESSION['admin'])): ?>
                <a href="assets/cv/herby.pdf" class="btn btn-admin" download>
                    🧠 Télécharger (Admin)
                </a>
            <?php endif; ?>

        </div>

        <!-- VIEWER -->
        <div class="cv-viewer" id="viewer" oncontextmenu="return false;">

            <div class="watermark">Herby Portfolio</div>

            <canvas id="pdf-render"></canvas>

        </div>

    </div>

</div>

<script>
let url = "assets/cv/herby.pdf";
let pdfDoc = null,
pageNum = 1,
scale = 1.2,
canvas = document.getElementById("pdf-render"),
ctx = canvas.getContext("2d");

pdfjsLib.GlobalWorkerOptions.workerSrc =
"https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";

// LOAD PDF
pdfjsLib.getDocument(url).promise.then(pdf => {
    pdfDoc = pdf;
    renderPage(pageNum);
});

function renderPage(num){
    pdfDoc.getPage(num).then(page => {

        let viewport = page.getViewport({scale: scale});
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        let renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };

        page.render(renderContext);
    });
}

// ZOOM
function zoomIn(){
    scale += 0.2;
    renderPage(pageNum);
}

function zoomOut(){
    scale -= 0.2;
    if(scale < 0.5) scale = 0.5;
    renderPage(pageNum);
}

// FULLSCREEN
function toggleFullscreen(){
    let viewer = document.getElementById("viewer");

    if(!document.fullscreenElement){
        viewer.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}

// TRACK TIME VIEW
let startTime = Date.now();

window.addEventListener("beforeunload", function(){
    let timeSpent = Math.round((Date.now() - startTime)/1000);
    console.log("CV viewed for:", timeSpent, "seconds");
});

// SECURITY BASIC
document.addEventListener("contextmenu", e => e.preventDefault());

document.addEventListener("keydown", function(e){
    if(e.ctrlKey && e.key.toLowerCase() === "p"){
        e.preventDefault();
        alert("Impression désactivée");
    }
});
</script>