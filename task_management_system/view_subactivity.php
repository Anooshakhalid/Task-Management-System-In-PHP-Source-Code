<?php
include 'db_connect.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$subactivity_query = $conn->query("SELECT * FROM sub_activity WHERE id = $id");
$subactivity = $subactivity_query->fetch_assoc();

$name = isset($subactivity['S_Activity_Name']) ? $subactivity['S_Activity_Name'] : '';
$notes = isset($subactivity['S_Notes']) ? $subactivity['S_Notes'] : '';
$start_date = isset($subactivity['S_Start_Date']) ? $subactivity['S_Start_Date'] : '';
$end_date = isset($subactivity['S_End_Date']) ? $subactivity['S_End_Date'] : '';
$responsibility = isset($subactivity['S_Responsibility']) ? $subactivity['S_Responsibility'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subactivity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F2E9EB; /* Background color */
            padding-top: 20px;
        }
        .callout {
            border-left: 5px solid #DD8E84; /* Border color */
            background-color: #fff;
            border-radius: .25rem;
            margin-bottom: 20px;
            padding: 20px;
        }
        .callout dt {
            font-weight: bold;
            font-size: 18px;
            color: #344648; /* Text color */
            margin-top: 10px;
        }
        .callout dd {
            margin-left: 20px;
            font-size: 16px;
            color: #313835; /* Text color */
        }
        .btn-primary {
            background-color: #7CB9E8; /* Button background color */
            border-color: #7CB9E8; /* Button border color */
            color: #313835; /* Button text color */
        }
        .btn-primary:hover {
            background-color: #7CB9E8; /* Button background color on hover */
            border-color: #7CB9E8; /* Button border color on hover */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <dl>
                                        <dt>Name</dt>
                                        <dd><?php echo ucwords($name) ?></dd>
                                        <dt>Start Date</dt>
                                        <dd><?php echo date("F d, Y", strtotime($start_date)) ?></dd>
                                        <dt>End Date</dt>
                                        <dd><?php echo date("F d, Y", strtotime($end_date)) ?></dd>
                                        <dt>Responsibility</dt>
                                        <dd><?php echo isset($subactivity['S_Responsibility']) ? ucwords($subactivity['S_Responsibility']) : '<i>No responsibility assigned</i>' ?></dd>
                                        <dt>Description</dt>
                                        <dd><?php echo html_entity_decode($notes) ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <button class="btn btn-primary btn-block" onclick="window.history.back();">Back</button>
        </div>
    </div>
</div>
</body>
</html>

