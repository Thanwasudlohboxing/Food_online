<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode / Light Mode Toggle</title>
    <style>
        body {
            transition: background-color 0.5s;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .dark-mode {
            background-color: #333;
            color: #fff;
        }

        .light-mode {
            background-color: #fff;
            color: #333;
        }

        button {
            padding: 10px;
            cursor: pointer;
        }
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
}
    </style>
</head>
<center>
<body class="light-mode">
    <label class="switch">
  <input type="checkbox" onclick="toggleMode()">
  <span class="slider round"></span>
</label>
</center>
    <script>
        function toggleMode() {
            const body = document.body;
            body.classList.toggle("dark-mode");
            body.classList.toggle("light-mode");
        }
        toggleMode()
    </script>
    
</body>
</html>
