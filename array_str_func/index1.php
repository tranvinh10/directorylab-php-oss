<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Phát sinh mảng</title>
    <style>
        form {
            width: 600px;
            margin: auto;
            border: solid 1px black;
        }

        h2 {
            text-align: center;
            margin-top: 0px;
            padding: 5px;
            background-color: greenyellow;
        }

        label {
            display: inline-block;
            width: 200px;
            margin-left: 15px;
            margin-bottom: 10px;
        }

        input,
        textarea {
            width: 300px;
            padding: 5px;
            margin-left: 10px;
            box-sizing: border-box;
        }

        textarea {
            height: 50px;
            vertical-align: top;
        }

        button {
            margin: 10px 0px 10px 220px;
            padding: 4px 20px;
            background-color: #12974e;
            border-top: solid 2px black;
            border-left: solid 2px black;

        }

        p {
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    $n = "";
    $mang = [];
    $mangCP = [];
    $tong = 0;
    $thongbao = "";

    // Khi nhấn nút
    if ($_POST) {
        $n = $_POST['n'];

        // Kiểm tra n
        if (!is_numeric($n) || $n < 1 || $n > 19 || $n % 2 == 0 || (int)$n != $n) {
            $thongbao = "Nhập Lại!!";
        } else {
            // Phát sinh mảng
            for ($i = 0; $i < $n; $i++) {
                $mang[$i] = rand(-100, 100);
            }

            // Tìm số chính phương bé hơn 100
            for ($i = 0; $i < $n; $i++) {
                if (
                    $mang[$i] >= 0 && $mang[$i] < 100
                    && sqrt($mang[$i]) == (int)sqrt($mang[$i])
                ) {

                    $mangCP[] = $mang[$i];
                    $tong += $mang[$i];
                }
            }

            // Nếu không có số chính phương
            if (count($mangCP) == 0) {
                $thongbao = "Không tồn tại số chính phương thỏa điều kiện!!";
            }
        }
    }
    ?>

    <form action="index1.php" method="post" name="form_mang">

        <h2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2>

        <label>Nhập n (số nguyên lẻ 1->19):</label>
        <input type="text" name="n"
            value="<?php echo $n; ?>">
        <br>

        <label>Mảng:</label>
        <input type="text" readonly
            value="<?php echo implode(' | ', $mang); ?>">
        <br>

        <label>Các số chính phương:</label>
        <textarea readonly><?php
                            if (count($mangCP) > 0) {
                                echo implode(' | ', $mangCP);
                            } elseif ($thongbao != "Nhập Lại!!") {
                                echo '';
                            }
                            ?></textarea>
        <br>
        <br>
        <label>Tổng các số chính phương:</label>
        <input type="text" readonly
            value="<?php echo $tong; ?>">
        <br>
        <button type="submit">Phát sinh và tính toán</button>


        <?php
        if ($thongbao == "Nhập Lại!!") {
            echo "<p style='color:red;'>Nhập Lại!!</p>";
        }
        ?>

    </form>

</body>

</html>