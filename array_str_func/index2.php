<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <?php
    function luyThua($x)
    {
        $tich = 1;

        for ($i = 1; $i <= $x; $i++) {
            $tich *= $i;
        }

        return $tich;
    }
    function to_hop($k, $n)
    {
        return luyThua($n) / (luyThua($k) * luyThua($n - $k));
    }

    $k = "";
    $n = "";
    $kq = "";
    $error = "";
    $thongbao = "";

    // Xử lý form
    if ($_POST) {
        $k = $_POST['k'];
        $n = $_POST['n'];

        if (
            !is_numeric($k) || !is_numeric($n) ||
            $k < 0 || $n < 0 || $k > $n
        ) {
            $error = "Nhập lại!";
        } else {
            $kq = to_hop($k, $n);
            $thongbao = "Kết quả C" . $k . " của " . $n . " là: " . $kq;
        }
    }
    ?>
    <form method="post">
        <h2>TÍNH TỔ HỢP CHẬP K CỦA N</h2>

        <label>Nhập k:</label>
        <input type="text" name="k"
            value="<?php echo $k; ?>">
        <br><br>

        <label>Nhập n:</label>
        <input type="text" name="n"
            value="<?php echo $n; ?>">
        <br><br>

        <button type="submit">Tính toán</button>
        <br><br>

        <label>Kết quả:</label>
        <input type="text" readonly
            value="<?php echo $kq; ?>">

        <?php
        if ($thongbao == "") {
            echo "<br>$error";
        } else {
            echo "<p style='color:red;'>$thongbao</p>";
        }
        ?>
    </form>
</body>

</html>