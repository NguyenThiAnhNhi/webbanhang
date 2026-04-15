<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PawAI – Gợi ý phụ kiện thú cưng</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --cream: #FAF7F2;
    --warm: #F0E9DC;
    --amber: #C8845A;
    --amber-deep: #9B5E3A;
    --green: #4A7C6F;
    --green-light: #E8F2EF;
    --text: #2A2118;
    --muted: #8A7968;
    --white: #FFFFFF;
    --radius: 16px;
    --shadow: 0 4px 24px rgba(42,33,24,0.10);
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--text);
    min-height: 100vh;
  }

  /* HEADER */
  header {
    background: var(--white);
    border-bottom: 1px solid var(--warm);
    padding: 1rem 2rem;
    display: flex;
    align-items: center;
    gap: 12px;
  }
  header .logo {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    color: var(--amber-deep);
    font-weight: 700;
  }
  header .tagline {
    font-size: 0.8rem;
    color: var(--muted);
    margin-left: auto;
  }
  header .paw { font-size: 1.6rem; }

  /* MAIN LAYOUT */
  .container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 2.5rem 1.5rem;
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 2rem;
    align-items: start;
  }
  @media (max-width: 780px) {
    .container { grid-template-columns: 1fr; }
  }

  /* UPLOAD PANEL */
  .upload-panel {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 2rem;
  }
  .upload-panel h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    margin-bottom: 0.4rem;
    color: var(--text);
  }
  .upload-panel p {
    font-size: 0.88rem;
    color: var(--muted);
    margin-bottom: 1.5rem;
  }

  /* DROP ZONE */
  #drop-zone {
    border: 2px dashed #C8B89A;
    border-radius: 12px;
    padding: 2.5rem 1rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s;
    background: var(--cream);
    position: relative;
  }
  #drop-zone:hover, #drop-zone.drag-over {
    border-color: var(--amber);
    background: var(--warm);
  }
  #drop-zone input[type="file"] {
    position: absolute; inset: 0; opacity: 0; cursor: pointer;
  }
  #drop-zone .drop-icon { font-size: 2.5rem; margin-bottom: 0.5rem; }
  #drop-zone .drop-text {
    font-size: 0.9rem;
    color: var(--muted);
  }
  #drop-zone .drop-text span {
    color: var(--amber);
    font-weight: 500;
    text-decoration: underline;
  }

  /* PREVIEW */
  #preview-wrap { margin-top: 1rem; display: none; }
  #preview-wrap img {
    width: 100%;
    max-height: 250px;
    object-fit: cover;
    border-radius: 12px;
    border: 1px solid var(--warm);
  }
  .preview-name {
    font-size: 0.8rem;
    color: var(--muted);
    margin-top: 0.5rem;
    text-align: center;
  }

  /* SUBMIT BUTTON */
  #analyze-btn {
    width: 100%;
    margin-top: 1.5rem;
    padding: 0.9rem;
    background: var(--amber);
    color: var(--white);
    border: none;
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  #analyze-btn:hover { background: var(--amber-deep); }
  #analyze-btn:active { transform: scale(0.98); }
  #analyze-btn:disabled { background: #C8B89A; cursor: not-allowed; }

  /* RESULT PANEL */
  .result-panel {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 2rem;
    min-height: 300px;
    display: flex;
    flex-direction: column;
  }
  .result-panel h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    margin-bottom: 1.5rem;
  }

  /* PLACEHOLDER */
  .placeholder {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: var(--muted);
    gap: 0.75rem;
    text-align: center;
    padding: 2rem;
  }
  .placeholder-icon { font-size: 3rem; opacity: 0.4; }
  .placeholder p { font-size: 0.9rem; }

  /* LOADING */
  .loading { display: none; align-items: center; gap: 12px; color: var(--muted); font-size: 0.9rem; }
  .loading.active { display: flex; }
  .spinner {
    width: 20px; height: 20px;
    border: 2px solid var(--warm);
    border-top-color: var(--amber);
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
  }
  @keyframes spin { to { transform: rotate(360deg); } }

  /* PET INFO CARD */
  .pet-info {
    background: var(--green-light);
    border-radius: 12px;
    padding: 1rem 1.25rem;
    margin-bottom: 1.5rem;
    display: flex;
    gap: 1rem;
    align-items: center;
    display: none;
  }
  .pet-info.show { display: flex; }
  .pet-badge {
    background: var(--green);
    color: white;
    border-radius: 50%;
    width: 48px; height: 48px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
  }
  .pet-info-text h3 { font-size: 1rem; font-weight: 500; color: var(--green); }
  .pet-info-text p { font-size: 0.85rem; color: #3A6258; margin-top: 2px; }

  /* PRODUCTS GRID */
  .products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 1rem;
    display: none;
  }
  .products-grid.show { display: grid; }
  .product-card {
    border: 1px solid var(--warm);
    border-radius: 12px;
    padding: 1rem;
    transition: box-shadow 0.2s, transform 0.2s;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
    display: block;
  }
  .product-card:hover {
    box-shadow: var(--shadow);
    transform: translateY(-2px);
    border-color: var(--amber);
  }
  .product-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    text-align: center;
  }
  .product-name {
    font-size: 0.88rem;
    font-weight: 500;
    margin-bottom: 0.25rem;
    text-align: center;
  }
  .product-reason {
    font-size: 0.75rem;
    color: var(--muted);
    text-align: center;
    line-height: 1.4;
  }
  .product-price {
    margin-top: 0.5rem;
    font-weight: 500;
    color: var(--amber-deep);
    font-size: 0.9rem;
    text-align: center;
  }
  .product-tag {
    display: inline-block;
    background: var(--green-light);
    color: var(--green);
    font-size: 0.7rem;
    padding: 2px 8px;
    border-radius: 20px;
    margin-top: 0.4rem;
    font-weight: 500;
  }

  /* ERROR */
  .error-msg {
    background: #FEF2F2;
    border: 1px solid #FCA5A5;
    color: #991B1B;
    border-radius: 10px;
    padding: 1rem;
    font-size: 0.88rem;
    display: none;
  }
  .error-msg.show { display: block; }

  /* CTA */
  .cta-section { margin-top: 1.5rem; display: none; }
  .cta-section.show { display: block; }
  .cta-section p { font-size: 0.85rem; color: var(--muted); margin-bottom: 0.75rem; }
  .cta-btn {
    display: inline-block;
    background: var(--green);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    font-size: 0.9rem;
    cursor: pointer;
    text-decoration: none;
    font-family: 'DM Sans', sans-serif;
    transition: background 0.2s;
  }
  .cta-btn:hover { background: #3A6258; }

  /* SECTION LABEL */
  .section-label {
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 0.75rem;
    display: none;
  }
  .section-label.show { display: block; }
</style>
</head>
<body>

<header>
  <div class="paw">🐾</div>
  <div class="logo">PawStore</div>
  <div class="tagline">AI gợi ý phụ kiện thông minh</div>
</header>

<div class="container">
  <!-- UPLOAD PANEL -->
  <div class="upload-panel">
    <h2>Nhận diện thú cưng</h2>
    <p>Tải ảnh thú cưng lên – AI sẽ phân tích và gợi ý phụ kiện phù hợp</p>

    <div id="drop-zone">
      <input type="file" id="file-input" accept="image/*">
      <div class="drop-icon">📷</div>
      <div class="drop-text">Kéo thả ảnh hoặc <span>chọn từ máy</span></div>
    </div>

    <div id="preview-wrap">
      <img id="preview-img" src="" alt="Preview">
      <div class="preview-name" id="preview-name"></div>
    </div>

    <button id="analyze-btn" disabled>
      <span>✨</span>
      <span id="btn-text">Chọn ảnh trước</span>
    </button>
  </div>

  <!-- RESULT PANEL -->
  <div class="result-panel">
    <h2>Gợi ý phụ kiện</h2>

    <div class="loading" id="loading">
      <div class="spinner"></div>
      <span>AI đang phân tích ảnh thú cưng của bạn...</span>
    </div>

    <div class="error-msg" id="error-msg"></div>

    <div class="pet-info" id="pet-info">
      <div class="pet-badge" id="pet-badge">🐕</div>
      <div class="pet-info-text">
        <h3 id="pet-type">Chó Golden Retriever</h3>
        <p id="pet-desc">Giống chó vui vẻ, năng động – cần nhiều phụ kiện vận động</p>
      </div>
    </div>

    <div class="section-label" id="label-suggest">Sản phẩm gợi ý dành riêng cho bé</div>
    <div class="products-grid" id="products-grid"></div>

    <div class="cta-section" id="cta-section">
      <p>Muốn xem thêm sản phẩm cho thú cưng của bạn?</p>
      <a class="cta-btn" href="products.php">Xem tất cả sản phẩm →</a>
    </div>

    <div class="placeholder" id="placeholder">
      <div class="placeholder-icon">🐾</div>
      <p>Tải ảnh thú cưng lên để nhận gợi ý phụ kiện phù hợp từ AI</p>
    </div>
  </div>
</div>

<script>
const fileInput = document.getElementById('file-input');
const dropZone = document.getElementById('drop-zone');
const previewWrap = document.getElementById('preview-wrap');
const previewImg = document.getElementById('preview-img');
const previewName = document.getElementById('preview-name');
const analyzeBtn = document.getElementById('analyze-btn');
const btnText = document.getElementById('btn-text');
const loading = document.getElementById('loading');
const errorMsg = document.getElementById('error-msg');
const petInfo = document.getElementById('pet-info');
const productsGrid = document.getElementById('products-grid');
const placeholder = document.getElementById('placeholder');
const ctaSection = document.getElementById('cta-section');
const labelSuggest = document.getElementById('label-suggest');

let selectedFile = null;

// Drag & Drop
dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('drag-over'); });
dropZone.addEventListener('dragleave', () => dropZone.classList.remove('drag-over'));
dropZone.addEventListener('drop', e => {
  e.preventDefault();
  dropZone.classList.remove('drag-over');
  const file = e.dataTransfer.files[0];
  if (file && file.type.startsWith('image/')) handleFile(file);
});

fileInput.addEventListener('change', e => {
  if (e.target.files[0]) handleFile(e.target.files[0]);
});

function handleFile(file) {
  selectedFile = file;
  const reader = new FileReader();
  reader.onload = e => {
    previewImg.src = e.target.result;
    previewWrap.style.display = 'block';
    previewName.textContent = file.name;
    analyzeBtn.disabled = false;
    btnText.textContent = 'Phân tích ảnh bằng AI ✨';
  };
  reader.readAsDataURL(file);
}

analyzeBtn.addEventListener('click', async () => {
  if (!selectedFile) return;

  // UI states
  analyzeBtn.disabled = true;
  btnText.textContent = 'Đang phân tích...';
  loading.classList.add('active');
  errorMsg.classList.remove('show');
  petInfo.classList.remove('show');
  productsGrid.classList.remove('show');
  ctaSection.classList.remove('show');
  labelSuggest.classList.remove('show');
  placeholder.style.display = 'none';
  productsGrid.innerHTML = '';

  const formData = new FormData();
  formData.append('pet_image', selectedFile);

  try {
    const res = await fetch('ai_analyze.php', { method: 'POST', body: formData });
    const data = await res.json();

      // ✅ LƯU LỊCH SỬ
    sessionStorage.setItem('pawAI_result', JSON.stringify(data));

    if (data.error) throw new Error(data.error);

    // Show pet info
    document.getElementById('pet-badge').textContent = data.pet_emoji || '🐾';
    document.getElementById('pet-type').textContent = data.pet_type || 'Thú cưng';
    document.getElementById('pet-desc').textContent = data.pet_description || '';
    petInfo.classList.add('show');

    // Render products
    if (data.products && data.products.length > 0) {
      data.products.forEach(p => {
        const card = document.createElement('a');
        card.className = 'product-card';
        card.href = `/webbanhang/index.php?quanly=sanpham&id=${p.id || ''}`;
        card.innerHTML = `
          <div class="product-icon">${p.emoji || '🐾'}</div>
          <div class="product-name">${escHtml(p.name)}</div>
          <div class="product-reason">${escHtml(p.reason)}</div>
          <div class="product-price">${escHtml(p.price)}</div>
          <span class="product-tag">${escHtml(p.category)}</span>
        `;
        productsGrid.appendChild(card);
      });
      labelSuggest.classList.add('show');
      productsGrid.classList.add('show');
      ctaSection.classList.add('show');
    }

  } catch (err) {
    errorMsg.textContent = '⚠️ Lỗi: ' + err.message;
    errorMsg.classList.add('show');
    placeholder.style.display = 'flex';
  } finally {
    loading.classList.remove('active');
    analyzeBtn.disabled = false;
    btnText.textContent = 'Phân tích lại ✨';
  }
});

function escHtml(str) {
  if (!str) return '';
  return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}
window.addEventListener('DOMContentLoaded', () => {
  const saved = sessionStorage.getItem('pawAI_result');
  if (!saved) return;

  const data = JSON.parse(saved);

  document.getElementById('pet-badge').textContent = data.pet_emoji || '🐾';
  document.getElementById('pet-type').textContent = data.pet_type || 'Thú cưng';
  document.getElementById('pet-desc').textContent = data.pet_description || '';

  petInfo.classList.add('show');

  productsGrid.innerHTML = '';

  data.products.forEach(p => {
    const card = document.createElement('a');
    card.className = 'product-card';
    card.href = `/webbanhang/index.php?quanly=sanpham&id=${p.id || ''}`;

    card.innerHTML = `
      <div class="product-icon">${p.emoji || '🐾'}</div>
      <div class="product-name">${escHtml(p.name)}</div>
      <div class="product-reason">${escHtml(p.reason)}</div>
      <div class="product-price">${escHtml(p.price)}</div>
      <span class="product-tag">${escHtml(p.category)}</span>
    `;

    productsGrid.appendChild(card);
  });

  labelSuggest.classList.add('show');
  productsGrid.classList.add('show');
  ctaSection.classList.add('show');
  placeholder.style.display = 'none';
});

</script>
</body>
</html>