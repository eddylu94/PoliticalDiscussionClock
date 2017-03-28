<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Political Discussion Clock</title>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <style>
            #history_div {
                margin-top: 50px;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
            #history {
                width: 100%;
            }
            #history th {
                padding: 8px;
                font-size: 25px;
                border: 0px;
                border-collapse: collapse;
                background-color: #181818;
                color: white;
            }
            #history td {
                padding: 8px;
                font-size: 25px;
                margin: 0px;
                border: 0px;
                border-collapse: collapse;
                color: white;
            }
            #history tr:nth-child(odd) {
                background-color: #181818;
            }
            #history tr:nth-child(even) {
                background-color: #262626;
            }
        </style>
        <link rel="stylesheet" href="header.css">
        <?php include 'statRecorder.php';?>
    </head>
    <body>
        <?php include 'header.php';?>
        
        <div id="container" style="height: 100%;">
            <div id="history_div">
                <table id="history">
                    <tr>
                        <th>Reset Date</th>
                        <th>Reset Time</th>
                        <th>Duration</th>
                        <th>Question</th>
                        <th>Response</th>
                    </tr>
                    <?php include 'getHistory.php';?>
                </table>
            </div>
        </div>
        
    </body>
</html>