<?php

include("../Model/order.php");
$donhang = new order();
$result = null;

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    switch ($type) {
        case 'day':
            $date = $_GET['date'];
            $result = $donhang->revenueByDay($date);
            break;

        case 'month':
            $month = $_GET['month'];
            $result = $donhang->revenueByMonth($month);
            break;

        case 'quarter':
            $quarter = $_GET['quarter'];
            $year = $_GET['quarter_year'];
            $result = $donhang->revenueByQuarter($year, $quarter);
            break;

        case 'year':
            $year = $_GET['year'];
            $result = $donhang->revenueByYear($year);
            break;
    }
}

?>