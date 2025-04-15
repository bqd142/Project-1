<?php
include("../Model/order.php");
$donhang = new order();
$result = null;
$label = "";
$tongTien = 0;

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    switch ($type) {
        case 'day':
            $date = $_GET['date'];
            $result = $donhang->revenueByDay($date);
            $label = "Doanh thu ngày $date";
            break;

        case 'month':
            $month = $_GET['month'];
            $result = $donhang->revenueByMonth($month);
            $label = "Doanh thu tháng $month";
            break;

        case 'quarter':
            $quarter = $_GET['quarter'];
            $year = $_GET['quarter_year'];
            $result = $donhang->revenueByQuarter($year, $quarter);
            $label = "Doanh thu quý $quarter năm $year";
            break;

        case 'year':
            $year = $_GET['year'];
            $result = $donhang->revenueByYear($year);
            $label = "Doanh thu năm $year";
            break;
    }

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $tongTien = $row['TongTien'] ?? 0;
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Báo cáo doanh thu</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="http://localhost/origato/Admin/navbar.css">
</head>
<body>
<div id="wrapper">
    <!-- NAVBAR -->
    <?php include "navbar.php"; ?>

    <!-- PAGE CONTENT -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="container mt-5" style="border: 1px solid black; background-color:  #f8d7da;; margin-top: 100px; padding: 20px; margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center mb-4" style="color: "><?= $lang_data["admin-baocao-tieude"] ?></h2>
                    </div>
                </div>

                <!-- Form chọn loại báo cáo -->
                <div class="row">
                    <div class="col-md-12 ">
                        <form method="GET" class="card p-4 shadow-sm">
                            <div class="form-group mb-3">
                                <label for="type" class="form-label"><?= $lang_data["admin-baocao-loai"] ?></label>
                                <select name="type" id="type" class="form-control" onchange="showInputs(this.value)">
                                    <option value="day" <?= isset($_GET['type']) && $_GET['type'] == 'day' ? 'selected' : '' ?>><?= $lang_data["admin-baocao-loai1"] ?></option>
                                    <option value="month" <?= isset($_GET['type']) && $_GET['type'] == 'month' ? 'selected' : '' ?>><?= $lang_data["admin-baocao-loai2"] ?></option>
                                    <option value="quarter" <?= isset($_GET['type']) && $_GET['type'] == 'quarter' ? 'selected' : '' ?>><?= $lang_data["admin-baocao-loai3"] ?></option>
                                    <option value="year" <?= isset($_GET['type']) && $_GET['type'] == 'year' ? 'selected' : '' ?>><?= $lang_data["admin-baocao-loai4"] ?></option>
                                </select>
                            </div>

                            <!-- Input theo ngày -->
                            <div id="input-day" class="form-group mb-3">
                                <label for="date" class="form-label"><?= $lang_data["admin-baocao-chonngay"] ?></label>
                                <input type="date" id="date" name="date" class="form-control" value="<?= $_GET['date'] ?? '' ?>">
                            </div>

                            <!-- Input theo tháng -->
                            <div id="input-month" class="form-group mb-3" style="display:none;">
                                <label for="month" class="form-label"><?= $lang_data["admin-baocao-chonthang"] ?></label>
                                <input type="month" id="month" name="month" class="form-control" value="<?= $_GET['month'] ?? '' ?>">
                            </div>

                            <!-- Input theo quý -->
                            <div id="input-quarter" class="form-group mb-3" style="display:none;">
                                <label for="quarter" class="form-label"><?= $lang_data["admin-baocao-chonquy"] ?></label>
                                <select id="quarter" name="quarter" class="form-select">
                                    <option value="1" <?= ($_GET['quarter'] ?? '') == 1 ? 'selected' : '' ?>><?= $lang_data["admin-baocao-q1"] ?></option>
                                    <option value="2" <?= ($_GET['quarter'] ?? '') == 2 ? 'selected' : '' ?>><?= $lang_data["admin-baocao-q2"] ?></option>
                                    <option value="3" <?= ($_GET['quarter'] ?? '') == 3 ? 'selected' : '' ?>><?= $lang_data["admin-baocao-q3"] ?></option>
                                    <option value="4" <?= ($_GET['quarter'] ?? '') == 4 ? 'selected' : '' ?>><?= $lang_data["admin-baocao-q4"] ?></option>
                                </select>
                                <label for="quarter_year" class="form-label mt-2"><?= $lang_data["admin-baocao-chonnam"] ?></label>
                                <input type="number" id="quarter_year" name="quarter_year" class="form-control" placeholder="<?= $lang_data["admin-baocao-nam"] ?>" value="<?= $_GET['quarter_year'] ?? '' ?>">
                            </div>

                            <!-- Input theo năm -->
                            <div id="input-year" class="form-group mb-3" style="display:none;">
                                <label for="year" class="form-label"><?= $lang_data["admin-baocao-chonnam"] ?></label>
                                <input type="number" id="year" name="year" class="form-control" placeholder="<?= $lang_data["admin-baocao-nam"] ?>" value="<?= $_GET['year'] ?? '' ?>">
                            </div>

                            <button type="submit" class="btn btn-primary w-100" style="margin-left: 520px;"><?= $lang_data["admin-baocao-xembc"] ?></button>
                        </form>
                    </div>
                </div>

                <!-- Kết quả báo cáo -->
                <?php if (isset($_GET['type'])): ?>
    <div class="row mt-5">
        <div class=" offset-md-1" >
            <div class="card p-4 shadow-sm" style="background-color: #fff;">
                
                <p class="text-center">
                    <strong><?= $lang_data["admin-baocao-doanhthu"] ?></strong> 
                    <?php
                        if ($tongTien > 0) {
                            if ($lang == 'vi') {
                                echo number_format($tongTien, 0, ',', '.') . ' VNĐ';
                            } elseif ($lang == 'jp') {
                                $yen = round($tongTien / 180); // Giả sử 1 yên = 180 VNĐ
                                echo number_format($yen, 0, ',', '.') . ' 円';
                            } else {
                                echo number_format($tongTien, 0, ',', '.') . ' VNĐ';
                            }
                        } else {
                            echo $lang == 'jp' ? '0 円' : '0 VNĐ';
                        }
                    ?>

                </p>

                <?php if ($tongTien > 0): ?>
                    <canvas id="doanhthuChart" width="800" height="500" style="display: block; margin: 0 auto;"></canvas>

                <?php else: ?>
                    <div class="alert alert-warning text-center mt-3">
                    <?= $lang_data["admin-baocao-kocodulieu"] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<div id="footer-sec" class="text-center mt-5">
    &copy; 2025 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
</div>

<!-- SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/custom.js"></script>
<script>
function showInputs(type) {
    document.getElementById("input-day").style.display = type === "day" ? "block" : "none";
    document.getElementById("input-month").style.display = type === "month" ? "block" : "none";
    document.getElementById("input-quarter").style.display = type === "quarter" ? "block" : "none";
    document.getElementById("input-year").style.display = type === "year" ? "block" : "none";
}

// Gọi khi load lại để giữ form
showInputs("<?= $_GET['type'] ?? 'day' ?>");
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('doanhthuChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['<?= $label ?>'],
        datasets: [{
            label: '<?= $lang_data["admin-baocao-doanhthudonvi"] ?>',
            data: [<?= $tongTien ?>],
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return new Intl.NumberFormat('vi-VN').format(value);
                    }
                }
            }
        }
    }
});
</script>
</body>
</html>
