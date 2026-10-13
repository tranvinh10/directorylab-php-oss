<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính toán mảng</title>
    <style>
        form {
            width: 600px;
            margin: auto;
            border: 2px solid black;
            background-color: #aedee3;
        }
        h2 {
            text-align: center;
            background-color: #175a61;
            color: #adccef;
            margin-top: 0px;
            padding: 8px;
            }
        label {
            display: inline-block;
            width: 220px;
            padding-left: 10px;
        }
        input#n {
            background-color: white;
        }
        input, textarea {
            width: 300px;
            margin-bottom: 10px;
            background-color: #ef9ec6;
        }
        
        textarea {
            vertical-align: top;
        }
        button {
            margin: 0px 0px 5px 220px;
            padding: 0px 20px;
        }
        p {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    //Hàm
    function taoMang($n)
    {
        $temp = [];
        for ($i = 0; $i < $n; $i++) {
            $temp[$i] = rand(-100, 100);
        }
        return $temp;
    }
    function xuatMang($array)
    {
        return implode(" | ", $array);
    }
    function taoMangCP($array)
    {
        $temp = [];
        for ($i = 0; $i < count($array); $i++) {
            $a = sqrt($array[$i]);
            if ($array[$i] >= 0 && (int)$a == $a) {
                $temp[] = $array[$i];
            }
        }
        return $temp;
    }
    function tinhTong($arrayCP)
    {
        $tong = 0;

        for ($i = 0; $i < count($arrayCP); $i++) {
            $tong += $arrayCP[$i];
        }

        return $tong;
    }
    //Khai báo và main
    $n = "";
    $mang = [];
    $mangCP = [];
    $tongCP = 0;
    $thongbao = "";
    if ($_POST) {
        $n = $_POST['n'];
        if (filter_var($n, FILTER_VALIDATE_INT) === false || $n < 1 || $n % 2 == 0 || $n > 19 || (int)$n != $n) {
            $thongbao = "Nhập lại!!";
        } else {
            $mang = taoMang($n);
            $mangCP = taoMangCP($mang);
            if (count($mangCP) == 0) {
                $thongbao = "Không tồn tại số chính phương thỏa điều kiện!!";
            }
            $tongCP = tinhTong($mangCP);
        }
    }
    ?>
    <form action="index1a.php" name="tinh_toan_mang" method="post">
        <h2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2>
        <label for="n">Nhập n (nguyên lẻ 1-19)</label>
        <input type="text" name="n" id="n" value="<?php echo $n; ?>">
        <br>
        <label for="">Mảng</label>
        <input type="text" readonly value="<?php echo xuatMang($mang); ?>">
        <br>
        <label for="soCP">Các số chính phương</label>
        <textarea readonly><?php
                            if (count($mangCP) > 0)
                                echo (xuatMang($mangCP));
                            elseif ($thongbao != "Nhập lại!!")
                                echo ($thongbao);
                            else
                                echo ("");
                            ?></textarea>
        <br>
        <label for="">Tổng các số chính phương</label>
        <input type="text" readonly value="<?php echo $tongCP; ?>">
        <br>
        <button type="submit">Phát sinh và tính toán</button>
        <br>
        <?php
        if ($thongbao == "Nhập lại!!") {
            echo "<p style='color:red;'>Nhập Lại!!</p>";
        }
        ?>
    </form>

</body>

</html>