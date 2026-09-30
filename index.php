<?php
// Archivo => título. Edita esta lista para agregar o renombrar ejercicios.
$ejercicios = [
  'formget.php'       => 'Formulario GET',
  'formpost.php'      => 'Formulario POST',
  'formpostgetm4.php' => 'POST y GET (M4)',
  'formrequest.php'   => 'Formulario REQUEST',
  'pagina1.php'       => 'Página 1',
  'pagina2.php'       => 'Página 2',
  'pagina3.php'       => 'Página 3',
  'pagina4.php'       => 'Página 4',
  'pagina5.php'       => 'Página 5',
  'pagina6.php'       => 'Página 6',
  'prueba.php'        => 'Prueba',
];
$lista = [];
$i = 0;
foreach ($ejercicios as $archivo => $titulo) {
  $lista[] = ['n' => ++$i, 'archivo' => $archivo, 'titulo' => $titulo, 'existe' => is_file(__DIR__ . '/' . $archivo)];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menú de ejercicios</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main>
  <h1>Ejercicios</h1>
  <p class="sub">Elige un ejercicio para abrirlo. Usa Ctrl+clic para abrirlo en otra pestaña.</p>

  <div class="tools">
    <input type="search" id="buscar" placeholder="Buscar ejercicio…" aria-label="Buscar ejercicio" autocomplete="off">
    <div class="prog" aria-live="polite">
      <div class="bar"><i id="barra"></i></div>
      <small id="texto"></small>
    </div>
  </div>

  <div class="grid" id="grid">
    <?php foreach ($lista as $e): ?>
      <a class="btn<?= $e['existe'] ? '' : ' falta' ?>"
         href="<?= htmlspecialchars($e['archivo'], ENT_QUOTES, 'UTF-8') ?>"
         data-archivo="<?= htmlspecialchars($e['archivo'], ENT_QUOTES, 'UTF-8') ?>"
         data-titulo="<?= htmlspecialchars($e['titulo'], ENT_QUOTES, 'UTF-8') ?>"
         style="--d:<?= $e['n'] - 1 ?>">
        <b><?= $e['n'] ?></b>
        <span><?= htmlspecialchars($e['titulo'], ENT_QUOTES, 'UTF-8') ?><?= $e['existe'] ? '' : ' (no encontrado)' ?></span>
        <em class="ok" aria-hidden="true">✓</em>
      </a>
    <?php endforeach; ?>
  </div>
  <p class="vacio" id="vacio" hidden>No hay ejercicios que coincidan.</p>
</main>

<div class="visor" id="visor" hidden role="dialog" aria-modal="true" aria-label="Ejercicio abierto">
  <header>
    <strong id="vtitulo"></strong>
    <div class="acciones">
      <button id="vprev" title="Anterior (←)">←</button>
      <button id="vnext" title="Siguiente (→)">→</button>
      <button id="vhecho">Marcar completado</button>
      <a id="vtab" target="_blank" rel="noopener">Nueva pestaña</a>
      <button id="vcerrar" title="Cerrar (Esc)">Cerrar</button>
    </div>
  </header>
  <iframe id="marco" title="Contenido del ejercicio"></iframe>
</div>

<script>
const grid = document.getElementById('grid');
const botones = [...grid.querySelectorAll('.btn')];
const visor = document.getElementById('visor'), marco = document.getElementById('marco');
const KEY = 'ejercicios-hechos';
let hechos = new Set(), actual = -1;

try { hechos = new Set(JSON.parse(localStorage.getItem(KEY) || '[]')); } catch (e) {}
function guardar(){ try { localStorage.setItem(KEY, JSON.stringify([...hechos])); } catch (e) {} }

function pintar(){
  botones.forEach(b => b.classList.toggle('done', hechos.has(b.dataset.archivo)));
  const t = botones.length, h = botones.filter(b => hechos.has(b.dataset.archivo)).length;
  document.getElementById('barra').style.width = (t ? h / t * 100 : 0) + '%';
  document.getElementById('texto').textContent = h + ' de ' + t + ' completados';
  if (actual >= 0) document.getElementById('vhecho').textContent =
    hechos.has(botones[actual].dataset.archivo) ? 'Marcar pendiente' : 'Marcar completado';
}

function abrir(i){
  actual = (i + botones.length) % botones.length;
  const b = botones[actual];
  document.getElementById('vtitulo').textContent = b.dataset.titulo;
  document.getElementById('vtab').href = b.dataset.archivo;
  marco.src = b.dataset.archivo;
  visor.hidden = false;
  document.body.classList.add('bloqueado');
  pintar();
}
function cerrar(){
  visor.hidden = true; marco.src = 'about:blank'; actual = -1;
  document.body.classList.remove('bloqueado');
}

botones.forEach((b, i) => b.addEventListener('click', ev => {
  if (ev.ctrlKey || ev.metaKey || ev.shiftKey || b.classList.contains('falta')) return;
  ev.preventDefault(); abrir(i);
}));
document.getElementById('vcerrar').onclick = cerrar;
document.getElementById('vprev').onclick = () => abrir(actual - 1);
document.getElementById('vnext').onclick = () => abrir(actual + 1);
document.getElementById('vhecho').onclick = () => {
  const a = botones[actual].dataset.archivo;
  hechos.has(a) ? hechos.delete(a) : hechos.add(a);
  guardar(); pintar();
};
document.addEventListener('keydown', ev => {
  if (visor.hidden) return;
  if (ev.key === 'Escape') cerrar();
  if (ev.key === 'ArrowLeft') abrir(actual - 1);
  if (ev.key === 'ArrowRight') abrir(actual + 1);
});

document.getElementById('buscar').addEventListener('input', ev => {
  const q = ev.target.value.trim().toLowerCase();
  let visibles = 0;
  botones.forEach(b => {
    const ok = !q || (b.dataset.titulo + ' ' + b.dataset.archivo).toLowerCase().includes(q);
    b.classList.toggle('oculto', !ok);
    if (ok) visibles++;
  });
  document.getElementById('vacio').hidden = visibles > 0;
});

pintar();
</script>
</body>
</html>
