<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>Mini Calculator</title>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-80">
        <h2 class="text-2xl font-bold text-center mb-4">MINI CALCULATOR</h2>
        
        <!-- form for calculating two numbers-->
        <form method="post" class="space-y-3">
            <div>
                <!-- Type in first number -->
                <label class="block text-gray-700 font-medium">Enter First Number :</label>
                <input type="number" name="num1"  value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>" 
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <!-- Type in second number -->
                <label class="block text-gray-700 font-medium">Enter Second Number :</label>
                <input type="number" name="num2"  value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>" 
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Mathematical function buttons -->
            <div class="flex justify-between">
                <input type="submit" name="operator" value="+" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-14">
                <input type="submit" name="operator" value="-" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-14">
                <input type="submit" name="operator" value="x" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-14">
                <input type="submit" name="operator" value="÷" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-14">
                <input type="submit" name="reset" value="C" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-14">
            </div>
        </form>

        <?php
        $result = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // check if reset button was pressed   
             if (isset($_POST['reset'])) {
        $num1 = "";
        $num2 = "";
        $result = "";
    } else {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];


            // checks mathematical operator applied
            switch ($operator) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case 'x':
                    $result = $num1 * $num2;
                    break;
                case '÷':
                    $result = ($num2 != 0) ? ($num1 / $num2) : "Error: Division by zero";
                    break;
             }
    }
        }
            // displays result
            echo "<div class='mt-4 p-3 bg-gray-100 rounded font-medium'>Answer: $result</div>";
        
        ?>
    </div>

</body>
</html>