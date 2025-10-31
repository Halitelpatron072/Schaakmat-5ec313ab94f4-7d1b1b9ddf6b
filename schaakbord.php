<!doctype html>
<html lang="nl">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Schaakbord 8x8 — Dynamisch</title>
<style>
:root {
--tile-size: 60px;
--light: #f0d9b5;
--dark: #b58863;
}
html, body {
height: 100%;
margin: 0;
font-family: system-ui, Segoe UI, Roboto, Arial;
}
.wrap {
min-height: 100%;
display: flex;
align-items: center;
justify-content: center;
gap: 24px;
padding: 24px;
box-sizing: border-box;
}
.board-container {
display: flex;
flex-direction: column;
align-items: center;
}
table.chessboard {
border-collapse: collapse;
box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}
table.chessboard td {
width: var(--tile-size);
height: var(--tile-size);
padding: 0;
user-select: none;
}
td.light { background: var(--light); }
td.dark { background: var(--dark); }
caption {
margin-bottom: 8px;
font-weight: 600;
}
@media (max-width:480px) {
:root { --tile-size: 36px; }
}
</style>
</head>
<body>
<div class="wrap">
<div class="board-container">
<caption id="board-caption" style="display:none"></caption>
<div id="board-root" aria-label="Dynamisch schaakbord" role="region"></div>
</div>
</div>


<script>
(function() {
const rows = 8;
const cols = 8;
const root = document.getElementById('board-root');


const table = document.createElement('table');
table.className = 'chessboard';
table.setAttribute('aria-describedby', 'board-caption');


for (let r = 0; r < rows; r++) {
const tr = document.createElement('tr');
for (let c = 0; c < cols; c++) {
const td = document.createElement('td');
const is_light = (r + c) % 2 === 0;
td.className = is_light ? 'light' : 'dark';
td.setAttribute('data-coord', r + ',' + c);
td.setAttribute('title', 'Rij ' + (r + 1) + ', Kolom ' + (c + 1));
tr.appendChild(td);
}
table.appendChild(tr);
}


root.appendChild(table);
})();
</script>
</body>
</html>