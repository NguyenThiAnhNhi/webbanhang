# 🐾 Web Bán Phụ Kiện Thú Cưng

Dự án website thương mại điện tử bán phụ kiện thú cưng, được xây dựng bằng PHP thuần kết hợp HTML/CSS. Website cung cấp giao diện mua sắm cho khách hàng và trang quản trị dành cho admin.

---

## 📋 Mục lục

- [Giới thiệu](#giới-thiệu)
- [Tính năng](#tính-năng)
- [Công nghệ sử dụng](#công-nghệ-sử-dụng)
- [Cấu trúc dự án](#cấu-trúc-dự-án)
- [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
- [Hướng dẫn cài đặt](#hướng-dẫn-cài-đặt)
- [Tác giả](#tác-giả)

---

## 🎯 Giới thiệu

**Web Bán Phụ Kiện Thú Cưng** là một ứng dụng web thương mại điện tử cho phép người dùng duyệt và mua sắm các sản phẩm phụ kiện dành cho thú cưng. Hệ thống bao gồm giao diện người dùng thân thiện và trang quản trị để quản lý sản phẩm, đơn hàng.

---

## ✨ Tính năng

### Phía khách hàng
- Xem danh sách sản phẩm phụ kiện thú cưng
- Tìm kiếm và lọc sản phẩm theo danh mục
- Xem chi tiết sản phẩm
- Giỏ hàng và đặt hàng
- Đăng ký / Đăng nhập tài khoản

### Phía quản trị (Admin)
- Quản lý sản phẩm (thêm, sửa, xóa)
- Quản lý danh mục sản phẩm
- Quản lý đơn hàng
- Cấu hình hệ thống

---

## 🛠️ Công nghệ sử dụng

| Công nghệ | Mục đích |
|-----------|----------|
| **PHP** | Ngôn ngữ lập trình phía server (71%) |
| **CSS** | Định dạng giao diện người dùng (18.6%) |
| **HTML** | Cấu trúc trang web |
| **MySQL** | Cơ sở dữ liệu |
| **Font Awesome 6** | Thư viện icon |
| **Apache/XAMPP** | Môi trường chạy ứng dụng |

---

## 📁 Cấu trúc dự án

```
webbanhang/
├── index.php           # File khởi động chính của ứng dụng
├── admin/              # Trang quản trị (Admin Panel)
│   └── config/
│       └── config.php  # File cấu hình kết nối cơ sở dữ liệu
├── page/               # Các trang giao diện người dùng
│   ├── header.php      # Phần đầu trang (header)
│   ├── menu.php        # Thanh điều hướng (navigation)
│   ├── main.php        # Nội dung chính của trang
│   └── footer.php      # Phần cuối trang (footer)
├── css/                # File stylesheet
│   └── style.css       # CSS tùy chỉnh giao diện
└── images/             # Thư mục chứa hình ảnh sản phẩm và giao diện
```

---

## ⚙️ Yêu cầu hệ thống

- **PHP** >= 7.4
- **MySQL** >= 5.7
- **Apache** (khuyến nghị dùng XAMPP hoặc WAMP)
- Trình duyệt web hiện đại (Chrome, Firefox, Edge,...)

---

## 🚀 Hướng dẫn cài đặt

### 1. Clone repository

```bash
git clone https://github.com/NguyenThiAnhNhi/webbanhang.git
```

### 2. Sao chép vào thư mục server

Sao chép toàn bộ thư mục `webbanhang` vào thư mục `htdocs` (XAMPP) hoặc `www` (WAMP):

```
C:/xampp/htdocs/webbanhang/
```

### 3. Tạo cơ sở dữ liệu

- Mở **phpMyAdmin** tại `http://localhost/phpmyadmin`
- Tạo database mới (ví dụ: `webbanhang`)
- Import file SQL của dự án (nếu có)

### 4. Cấu hình kết nối database

Mở file `admin/config/config.php` và chỉnh sửa thông tin kết nối:

```php
$host = "localhost";
$dbname = "webbanhang";
$username = "root";
$password = "";
```

### 5. Khởi động ứng dụng

- Bật **Apache** và **MySQL** trong XAMPP Control Panel
- Truy cập: [http://localhost/webbanhang](http://localhost/webbanhang)

---

## 👩‍💻 Tác giả

**Nguyễn Thị Anh Nhi**

- GitHub: [@NguyenThiAnhNhi](https://github.com/NguyenThiAnhNhi)

---

> 🐶🐱 *Dự án được xây dựng phục vụ mục đích học tập lập trình web PHP.*
