<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Political Discussion Clock</title>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <style>
        #container {
            position: absolute;
            
            display: table;
            height: 100%;
            width: 100%;
        }

        #clock_container {
            display: table-cell;
            
            text-align: center;
            vertical-align: middle;
        }

        #clock_wrapper {
            margin-left: auto;
            margin-right: auto; 

            width: 70%;
        }

        #currentRecordContainer {
            width: 100%;
            overflow: hidden
        }

        #currentRecord {   
            float: right;
            
            display: inline-block;
            padding: 20px 50px 20px 50px;
            height: 40px;
            border-radius: 20px 20px 0px 0px;
            
            background-color: #262626;
            color: #CCCCCC;
            
            font-size: 35px;
            line-height: 40px;
            text-align: right;
        }

        #recordTime {
            display: none;
            font-weight: bold;
            display: inline-block;
            margin-left: 10px;
            font-size: 35px;
        }

        #clock {
            display: none;
            padding: 20px;
            height: 150px;
            border-radius: 20px 0px 20px 20px;
            
            background-color: #262626;
            color: #CCCCCC;
            
            font-size: 150px;
            line-height: 150px;
            text-align: center;
        }

        #resetButton {
            margin-top: 50px;
            
            height: 80px;
            width: 500px;
            border: none;
            border-radius: 10px;

            color: #D9D9D9;
            background-color: #181818;
            
            font-size: 50px;

            cursor: pointer;
        }

        #resetButton:hover {
            background-color: #262626;
        }

        #resetButton:focus {
            outline: 0;
        }

        #overlay {
            position: absolute;
            top: 0;
            left: 0;

            display: none;
            width: 100%;
            height: 100%;
            z-index: 200;

            background-color: #000000;
            opacity: 0.9;
        }
        #overlay.visible {
            display: flex; !important
        }

        #submitFormPopup {
            position: absolute;
            top: 20%;
            left: 25%;

            display: none;
            width: 50%;
            height: 60%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            overflow: auto;
            z-index: 200;
            justify-content: center;

            text-align: center;
            font-size: 30px;

            background-color: #181818;
            color: #FFFFFF;
        }
        #submitFormPopup.visible {
            display: flex; !important
        }

        #closeButton {
            position: absolute;
            right: 0;
            top: 0;

            display: block;
            width: 30px;
            padding: 20px;

            font-size: 30px;

            color: #FFFFFF;

            cursor: pointer;
        }

        #checkBoxButton_yes {
            background-color: transparent;
            color: #FFFFFF;
            font-size: 50px;
            border: none;

            cursor: pointer;
        }

        #checkBoxButton_yes:focus {
            outline: 0;
        }

        #checkBoxButton_no {
            margin-left: 80px;
            
            background-color: transparent;
            color: #FFFFFF;
            font-size: 50px;
            border: none;
            
            cursor: pointer;
        }

        #checkBoxButton_no:focus {
            outline: 0;
        }

        #submitFormSubmitButton {
            margin-top: 50px;
            
            height: 80px;
            width: 500px;
            border: none;
            border-radius: 10px;

            color: #FFFFFF;
            background-color: #000000;
            
            font-size: 50px;

            cursor: pointer;
        }
        #submitFormSubmitButton:disabled{
            color: #333333;
            background-color: #080808;
        }

        #submitFormSubmitButton:focus {
            outline: 0;
        }
        </style>
        <link rel="stylesheet" href="header.css">
        <?php include 'statRecorder.php';?>
    </head>
    <body>
        <?php include 'header.php';?>
        
        <div id="container" style="height: 100%;">
            <div id="clock_container">
                <div id="clock_wrapper">
                    <div id="currentRecordContainer">
                        <div id="currentRecord">Current Record: <span id="recordTime"></span></div>
                    </div>
                    <div id="clock"></div>
                    <script src="clock.js"></script>
                    <button id="resetButton" type="button">RESET</button>
                </div>
            </div>
        </div>

        <div id="overlay"></div>

        <div id="submitFormPopup">
            <form action="updateResults.php"  method="post" style="align-self: center;">
                <span id="closeButton" onclick="toggleSubmitFormPopup(false)">&#10006;</span>

                <span id="flavorText"></span>
                
                <input id="flavourQuestion" type="text" name="flavourQuestion" style="display: none;" />
                <input id="flavourResponse" type="text" name="flavourResponse" style="display: none;" />

                <div id="checkBoxes" style="margin-top: 50px;">
                    <button id="checkBoxButton_yes" type="button">&#9744; Yes</button>
                    <button id="checkBoxButton_no" type="button">&#9744; No</button>
                </div>

                <input id="submitFormSubmitButton" type="submit" name="submit" value="SUBMIT" disabled=true />
            </form>
        </div>
        
    </body>
</html>