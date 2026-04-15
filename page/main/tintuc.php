<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin Tức Thú Cưng</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #fff7f8;
    }
    header {
      background: #ffd1dc;
      text-align: center;
      padding: 20px 20px;
    }
    header h1 { margin: 0; }
    nav {
      display: flex;
      justify-content: center;
      gap: 20px;
      background: #fff;
      padding: 10px;
      border-bottom: 1px solid #eee;
    }
    nav a {
      text-decoration: none;
      color: #333;
    }
    .container {
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding: 20px;
    }
    .featured {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    }
    .card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }
    .card-content {
      padding: 10px;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(2 , 1fr);
      gap: 10px;
      margin-top: 20px;
    }
    .sidebartintuc {
      order: 2;
      background: #fff;
      padding: 15px;
      border-radius: 12px;
    }
    footer {
      text-align: center;
      padding: 10px;
      background: #ffd1dc;
      margin-top: 20px;
    }
    button {
      background: #ff8fab;
      border: none;
      padding: 8px 12px;
      color: white;
      border-radius: 8px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<header>
  <h1>🐾 Tin Tức & Góc Chia Sẻ</h1>
  <p>Cập nhật mẹo hay cho sen & boss mỗi ngày 💕</p>
</header>

<nav>
  <a href="#">Chăm sóc</a>
  <a href="#">Dinh dưỡng</a>
  <a href="#">Phụ kiện</a>
  <a href="#">Sức khỏe</a>
</nav>

<div class="container">
  <div>
    <div class="featured">
      <div class="card">
        <img src="https://vkbgroup.vn/wp-content/uploads/2025/09/cach-cham-soc-cho-meo.jpg">
        <div class="card-content">
          <h3>5 mẹo giúp boss luôn vui vẻ</h3>
          <a href="https://vkbgroup.vn/7-tips-cham-soc-thu-cung-giup-boss-khoe-manh-va-vui-ve/?srsltid=AfmBOoqvK11Lv5I-CqZP2Q0pNERSRIH5YQh4MNMhRQKs2lHGlaZmuvZy">
          <button>Xem thêm</button>
</a>

      </div>
      <div class="card">
        <img src="https://cdn.hstatic.net/files/1000356051/article/thu_cung_mac_gi_de_dan_dau_xu_huong__petmall_insights_68917f22130a45aa91d03972fa601e84.jpg">
        <div class="card-content">
          <h3>Xu hướng thời trang thú cưng</h3>
          <a href="https://www.petmall.vn/blogs/danh-cho-ba-me-thu-cung-petmall-insights/thu-cung-mac-gi-de-dan-dau-xu-huong-petmall-insights?srsltid=AfmBOor08ypTPfwyFNCcojP_6NMDfwx8V-XAkUoWbnTFs--Ysg9fDGlN">
          <button>Xem thêm</button>
          </a>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="card">
        <img src="https://file.hstatic.net/200000491469/article/main-tp-1200x1200_61cdf7e476ad455f89765ceaab761398.jpg">
        <div class="card-content">
          <h4>Cách chọn phụ kiện an toàn</h4>
          <p>Những lưu ý quan trọng...</p>
          <a href="https://www.nongtraithucung.com/blogs/kien-thuc-the-gioi-pet/bi-quyet-chon-do-choi-cho-cho-phu-hop">
          <button>Xem thêm</button>
          </a>
        </div>
      </div>
      <div class="card">
        <img src="https://placedog.net/401/200">
        <div class="card-content">
          <h4>Sai lầm khi nuôi thú cưng</h4>
          <p>Tránh ngay nhé...</p>
          <a href="https://www.petmart.vn/sai-lam-ngo-ngan-co-ban-khi-cham-soc-cho-meo?srsltid=AfmBOoopuJFMAHtxPWKpshXEzRHSnud6wadRrR7i5P1K_PZ6U_IzfPli">
          <button>Xem thêm</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebartintuc">
    <h3>📢 Tin Nổi Bật</h3>
    <ul>
      <li><a href="#">Chương trình khuyến mãi tháng 10</a></li>
      <li><a href="#">Sự kiện offline sắp tới</a></li>
      <li><a href="https://thuonghieuvaxahoi.vn/5-bi-quyet-cham-soc-thu-cung-mua-he-de-luon-khoe-manh-tranh-soc-nhiet/">Bí quyết chăm sóc boss mùa đông</a></li>
    </ul>


</body>
</html>

