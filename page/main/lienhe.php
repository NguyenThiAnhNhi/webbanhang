<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liên Hệ</title>

 <!-- Nút chat nổi -->
<div class="chat-floating">
  <!-- Zalo -->
  <a href="https://zalo.me/0795984139" target="_blank" class="chat-btn zalo">
    <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Icon_of_Zalo.svg" alt="Zalo">
  </a>

  <!-- Messenger -->
  <a href="https://www.facebook.com/anhnhi.nguyenthi.90" target="_blank" class="chat-btn messenger">
    <img src="https://cdn.simpleicons.org/messenger/0084FF" alt="Messenger">
  </a>
</div>

<style>
.chat-floating {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  z-index: 999;
}

.chat-btn {
  width: 55px;
  height: 55px;
  border-radius: 50%;
  background: white;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  transition: 0.3s;
}

.chat-btn img {
  width: 28px;
  height: 28px;
}

.chat-btn:hover {
  transform: scale(1.1);
}

/* Viền màu cho đẹp */
.chat-btn.zalo {
  border: 2px solid #0068ff;
}

.chat-btn.messenger {
  border: 2px solid #0084ff;
}
</style>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #fff7f8;
    }

    header {
      background: linear-gradient(135deg, #ffd1dc, #ffc2d1);
      text-align: center;
      padding: 50px 20px;
    }

    header h1 {
      margin: 0;
    }

    .container {
      max-width: 1100px;
      margin: auto;
      padding: 20px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    h2 {
      margin-top: 0;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border-radius: 10px;
      border: 1px solid #ddd;
      outline: none;
      transition: 0.2s;
    }

    input:focus, textarea:focus {
      border-color: #ff8fab;
      box-shadow: 0 0 5px rgba(255,143,171,0.3);
    }

    button {
      background: #ff8fab;
      border: none;
      padding: 12px 16px;
      color: white;
      border-radius: 10px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
      transition: 0.3s;
    }

    button:hover {
      background: #ff6f91;
    }

    .map {
      margin-top: 20px;
      border-radius: 12px;
      overflow: hidden;
    }

    iframe {
      width: 100%;
      height: 250px;
      border: 0;
    }

    .social {
      margin-top: 15px;
    }

    .social a {
      margin-right: 10px;
      text-decoration: none;
      font-size: 20px;
    }

    footer {
      text-align: center;
      padding: 20px;
      background: #ffd1dc;
      margin-top: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .container {
        grid-template-columns: 1fr;
      }
    }

  </style>
</head>
<body>

<header>
  <h1>📞 Liên Hệ Với Chúng Mình</h1>
  <p>Luôn sẵn sàng hỗ trợ bạn và boss 💖</p>
</header>

<div class="container">
  <!-- Thông tin -->
  <div class="card">
    <h2>💌 Thông tin liên hệ</h2>
    <p>📍 Điện Bàn Đông, Đà Nẵng</p>
    <p>📞 0795984139</p>
    <p>📧 nhinguyen9424@gmail.com</p>
    <p>⏰ 8:00 - 21:00 mỗi ngày</p>

    <div class="social">
      <p>🌐 Kết nối với chúng mình:</p>
      <a href="https://www.facebook.com/anhnhi.nguyenthi.90" target="_blank">📘</a>
      <a href="https://zalo.me/0795984139" target="_blank">💬</a>
      <a href="tel:0795984139">📞</a>
    </div>

    <!-- <div class="map">
      <iframe src="https://maps.google.com/maps?q=ho%20chi%20minh&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div> -->
  </div>

  <!-- Form -->
  <div class="card">
    <h2>📝 Gửi tin nhắn</h2>
    <form onsubmit="handleSubmit(event)">
      <input type="text" placeholder="Họ và tên" required>
      <input type="email" placeholder="Email" required>
      <input type="tel" placeholder="Số điện thoại">
      <textarea rows="4" placeholder="Nội dung..." required></textarea>
      <button type="submit">Gửi ngay 🐾</button>
    </form>
  </div>

</div>

<footer>
  <p>Cảm ơn bạn đã liên hệ 💕</p>
</footer>

<script>
function handleSubmit(e) {
  e.preventDefault();
  alert("🎉 Gửi thành công! Chúng mình sẽ phản hồi sớm nhé 💖");
}
</script>

</body>
</html>
