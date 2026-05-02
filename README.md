# 🐾 Web Bán Phụ Kiện Thú Cưng

Đây là website bán phụ kiện thú cưng được xây dựng bằng PHP thuần và MySQL, chạy trên môi trường localhost (XAMPP).

---

## 📋 Mục lục

- [Giới thiệu](#giới-thiệu)
- [Công nghệ sử dụng](#công-nghệ-sử-dụng)
- [Cấu trúc thư mục](#cấu-trúc-thư-mục)
- [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
- [Hướng dẫn cài đặt và chạy](#hướng-dẫn-cài-đặt-và-chạy)
- [Tài khoản mặc định](#tài-khoản-mặc-định)
- [Chức năng chính](#chức-năng-chính)

---

## 🌟 Giới thiệu

Website bán hàng online dành cho phụ kiện thú cưng, bao gồm giao diện người dùng để xem và đặt hàng sản phẩm, và trang quản trị (admin) để quản lý hàng hóa, đơn hàng.

---

## 🛠 Công nghệ sử dụng

| Thành phần | Công nghệ |
|------------|-----------|
| Ngôn ngữ Backend | PHP (thuần, không dùng framework) |
| Cơ sở dữ liệu | MySQL |
| Frontend | HTML, CSS |
| Icon | Font Awesome 6.0 |
| Môi trường chạy | XAMPP (Apache + MySQL) |

---

## 📁 Cấu trúc thư mục

```
webbanhang/
│
├── index.php              # Trang chủ chính của website
│
├── admin/                 # Khu vực quản trị (admin)
│   └── config/
│       └── config.php     # File cấu hình kết nối database
│
├── page/                  # Các trang giao diện người dùng
│   ├── header.php         # Phần đầu trang (logo, thanh điều hướng)
│   ├── menu.php           # Menu danh mục sản phẩm
│   ├── main.php           # Nội dung chính (danh sách sản phẩm)
│   └── footer.php         # Phần chân trang
│
├── css/                   # File CSS tùy chỉnh giao diện
│   └── style.css
│
└── images/                # Hình ảnh sản phẩm và giao diện
```

---

## 💻 Yêu cầu hệ thống

- **XAMPP** phiên bản 7.4 trở lên (bao gồm Apache và MySQL)
- **Trình duyệt** web bất kỳ (Chrome, Firefox, Edge,...)
- **Hệ điều hành**: Windows / macOS / Linux

> ⬇️ Tải XAMPP tại: https://www.apachefriends.org/

---

## 🚀 Hướng dẫn cài đặt và chạy

### Bước 1 — Tải mã nguồn về máy

```bash
git clone https://github.com/NguyenThiAnhNhi/webbanhang.git
```

Hoặc bấm **Code → Download ZIP** trên GitHub rồi giải nén.

---

### Bước 2 — Sao chép vào thư mục XAMPP

Sao chép (hoặc di chuyển) toàn bộ thư mục `webbanhang` vào bên trong:

```
C:\xampp\htdocs\webbanhang
```

*(Trên macOS: `/Applications/XAMPP/htdocs/webbanhang`)*

---

### Bước 3 — Khởi động XAMPP

Mở **XAMPP Control Panel** và bật (Start) hai dịch vụ:
- ✅ **Apache**
- ✅ **MySQL**

---

### Bước 4 — Tạo Database

1. Mở trình duyệt, vào địa chỉ: `http://localhost/phpmyadmin`
2. Chọn **"New"** (Tạo mới) ở cột bên trái
3. Đặt tên database là: **`webbanhang`** → Bấm **Create**
4. Sau khi tạo xong, chọn tab **Import**
5. Bấm **"Choose File"** → chọn file `webbanhang.sql` (được đính kèm bài nộp)
6. Bấm **Go** để import dữ liệu

> ⚠️ **Lưu ý:** Nếu tên database hoặc tên bảng khác, vui lòng kiểm tra file `admin/config/config.php` và chỉnh lại cho khớp.

---

### Bước 5 — Kiểm tra cấu hình kết nối

Mở file `admin/config/config.php` và kiểm tra các thông tin sau:

```php
$host = "localhost";
$dbname = "webbanhang";   // Tên database vừa tạo
$username = "root";        // Mặc định của XAMPP
$password = "";            // Mặc định của XAMPP là không có mật khẩu
```

Nếu thông tin khác, chỉnh lại cho đúng với máy của bạn.

---

### Bước 6 — Chạy website

Mở trình duyệt và truy cập:

```
http://localhost/webbanhang/
```

---

## 🔑 Tài khoản mặc định

| Loại tài khoản |usename | Mật khẩu |
|----------------|---------------|----------|
| Quản trị viên (Admin) | `anhnhi` | `12341234` |

| Loại tài khoản |email | Mật khẩu |
|----------------|---------------|----------|
| Người dùng thường | `nhinguyen9424@gmail.com` | `12345678` |

**Đường dẫn trang Admin:**
```
http://localhost/webbanhang/admin/
```

---

## ✨ Chức năng chính

### Giao diện người dùng (User)
- Xem danh sách sản phẩm phụ kiện thú cưng
- Xem chi tiết sản phẩm
- Thêm sản phẩm vào giỏ hàng
- Tìm kiếm sản phẩm
- Đặt hàng / Mua hàng

### Trang quản trị (Admin)
- Quản lý sản phẩm (thêm, sửa, xóa)
- Quản lý danh mục sản phẩm
- Quản lý đơn hàng
- Quản lý người dùng

---

## 👤 Thông tin sinh viên

| Thông tin | Chi tiết | 
|-----------|----------|
| Họ và tên | Nguyễn Thị Ánh Nhi |
| Lớp | 22CNTT1 |
| Mã sinh viên | 3120222097 |
| GitHub | [NguyenThiAnhNhi/webbanhang](https://github.com/NguyenThiAnhNhi/webbanhang) |

---

> 💡 Nếu gặp lỗi trong quá trình cài đặt, hãy kiểm tra lại:
> 1. Apache và MySQL đã được Start trong XAMPP chưa?
> 2. Tên thư mục đặt đúng trong `htdocs` chưa?
> 3. Tên database trong `config.php` có trùng với database đã tạo không?
