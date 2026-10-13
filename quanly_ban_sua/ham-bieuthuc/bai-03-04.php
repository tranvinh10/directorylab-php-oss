<?php
include_once("config.php");

// 1. Mở kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// 2. Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// 3. Thiết lập tiếng Việt
$conn->set_charset("utf8");

// Bài 3
$query3 = "SELECT *,
           DATEDIFF(CURDATE(), DATE(Ngay_HD)) AS So_ngay
           FROM hoa_don
           ORDER BY So_ngay DESC";

// Bài 4
$query4 = "SELECT *
           FROM sua
           WHERE LENGTH(Ten_sua) <= 10";

$result3 = $conn->query($query3);
$result4 = $conn->query($query4);

if (!$result3 || !$result4) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 3 và Bài 4</title>
</head>

<body>

    <h2>Bài 3: Danh sách hóa đơn và số ngày</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Số hóa đơn</th>
            <th>Ngày hóa đơn</th>
            <th>Mã khách hàng</th>
            <th>Trị giá</th>
            <th>Số ngày</th>
        </tr>

        <?php
        while ($row = $result3->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["So_hoa_don"] . "</td>";
            echo "<td>" . $row["Ngay_HD"] . "</td>";
            echo "<td>" . $row["Ma_khach_hang"] . "</td>";
            echo "<td>" . $row["Tri_gia"] . "</td>";
            echo "<td>" . $row["So_ngay"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Bài 4: Danh sách sữa có tên dài không quá 10 ký tự</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>

        <?php
        while ($row = $result4->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>

<?php
$conn->close();
?>