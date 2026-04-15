<?php
// ============================================================
// ALWAYS RETURN JSON
// ============================================================
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// Không echo lỗi HTML
error_reporting(E_ALL);
ini_set('display_errors', 0);

// ============================================================
// HELPER: trả JSON + thoát
// ============================================================
function jsonResponse($data, $code = 200) {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

// Bắt mọi lỗi PHP thành JSON
set_exception_handler(function($e) {
    jsonResponse(['error' => $e->getMessage()], 500);
});

set_error_handler(function($severity, $message, $file, $line) {
    jsonResponse(['error' => "$message ($file:$line)"], 500);
});

// ============================================================
// CONFIG
// ============================================================
define('GEMINI_API_KEY', 'AIzaSyAYEjY8i5GWWciBGaPFm6kYZwb8MPTVz7M'); // ⚠️ đổi key mới ngay

// ============================================================
// DB
// ============================================================
$conn = new mysqli('localhost', 'root', '', 'webbanhang');

if ($conn->connect_error) {
    jsonResponse(['error' => 'DB connection failed: ' . $conn->connect_error], 500);
}

$conn->set_charset('utf8');

$sql = "
SELECT s.id_sanpham, s.tensanpham, s.giasp, d.tendanhmuc
FROM tbl_sanpham s
LEFT JOIN tb_danhmuc d ON s.id_danhmuc = d.id_danhmuc
WHERE s.tinhtrang = 1
ORDER BY s.id_sanpham
";

$result = $conn->query($sql);

if (!$result) {
    jsonResponse(['error' => 'SQL error: ' . $conn->error], 500);
}

$SHOP_PRODUCTS = [];

while ($row = $result->fetch_assoc()) {
    $SHOP_PRODUCTS[] = [
        'id'       => (int)$row['id_sanpham'],
        'name'     => $row['tensanpham'],
        'price'    => number_format($row['giasp'], 0, ',', '.') . 'đ',
        'category' => $row['tendanhmuc'] ?? 'Phụ kiện thú cưng',
    ];
}

$conn->close();

// ============================================================
// VALIDATE REQUEST
// ============================================================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['error' => 'Only POST allowed'], 405);
}

if (!isset($_FILES['pet_image'])) {
    jsonResponse(['error' => 'Missing file'], 400);
}

$file = $_FILES['pet_image'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    jsonResponse(['error' => 'Upload failed'], 400);
}

$allowedMime = ['image/jpeg','image/jpg','image/png','image/gif','image/webp'];

if (!in_array($file['type'], $allowedMime)) {
    jsonResponse(['error' => 'Invalid image type'], 400);
}

if ($file['size'] > 5 * 1024 * 1024) {
    jsonResponse(['error' => 'File too large'], 400);
}

// ============================================================
// IMAGE
// ============================================================
$imageData = base64_encode(file_get_contents($file['tmp_name']));
$mimeType  = $file['type'];

// ============================================================
// BUILD PRODUCT LIST
// ============================================================
$productListStr = '';
foreach ($SHOP_PRODUCTS as $p) {
    $productListStr .= "- ID:{$p['id']} | {$p['name']} | {$p['price']} | {$p['category']}\n";
}

// ============================================================
// PROMPT
// ============================================================
$systemPrompt = <<<PROMPT
Bạn là AI tư vấn phụ kiện thú cưng.

DANH SÁCH:
$productListStr

QUY TẮC:
- Chỉ dùng ID có trong danh sách
- Gợi ý 4-6 sản phẩm
- Trả JSON THUẦN (không markdown)

FORMAT:
{
  "pet_type": "",
  "pet_emoji": "",
  "pet_description": "",
  "products": [
    {
      "id": 1,
      "reason": ""
    }
  ]
}
PROMPT;

// ============================================================
// CALL GEMINI
// ============================================================
$body = json_encode([
    'contents' => [
        [
            'parts' => [
                [
                    'inline_data' => [
                        'mime_type' => $mimeType,
                        'data'      => $imageData
                    ]
                ],
                [
                    'text' => $systemPrompt
                ]
            ]
        ]
    ]
]);

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . GEMINI_API_KEY;
$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_TIMEOUT => 30,
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    jsonResponse(['error' => curl_error($ch)], 500);
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$data = json_decode($response, true);

if ($httpCode !== 200) {
    jsonResponse([
        'error' => $data['error']['message'] ?? 'Gemini API error'
    ], $httpCode);
}

// ============================================================
// LẤY TEXT TỪ GEMINI
// ============================================================
$text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

if (!$text) {
    jsonResponse(['error' => 'Empty AI response'], 500);
}

// ============================================================
// FIX JSON (Gemini hay trả kèm text)
// ============================================================
preg_match('/\{.*\}/s', $text, $matches);

if (!isset($matches[0])) {
    jsonResponse(['error' => 'Invalid JSON from AI', 'raw' => $text], 500);
}

$aiResult = json_decode($matches[0], true);

if (!$aiResult) {
    jsonResponse(['error' => 'JSON decode failed', 'raw' => $text], 500);
}

// ============================================================
// ENRICH DATA
// ============================================================
$productMap = [];
foreach ($SHOP_PRODUCTS as $p) {
    $productMap[$p['id']] = $p;
}

if (!empty($aiResult['products'])) {
    foreach ($aiResult['products'] as &$p) {
        $id = intval($p['id'] ?? 0);
        if (isset($productMap[$id])) {
            $p = array_merge($productMap[$id], $p);
        }
    }
}

// ============================================================
// SUCCESS
// ============================================================
jsonResponse($aiResult);