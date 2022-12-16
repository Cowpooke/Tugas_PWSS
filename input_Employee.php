<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div class="wrap">
        <div class="box">
            <form action="save_employee_data.php" method="POST">
                <div class="Header">
                    <h2>INPUT DATA EMPLOYEE</h2>
                </div>
                <div class="text-employee">Employee ID</div>
                <div class="input_text">
                    <input type="text" name="employee_id">
                </div>
                <div class="text-employee">Name</div>
                <div class="input_text">
                    <input type="text" name="name" required>
                </div>
                <div class="text-employee">Address</div>
                <div class="input_text">
                    <input type="text" name="address" required>
                </div>
                <label for="roles">
                    <div class="text-employee">Roles</div>
                </label>
                <div class="input_text">
                    <select name="roles" id="roles" class="text-employee">
                        <option value="" selected disabled hidden>Select</option>
                        <option value="Pharmacist">Pharmacist</option>
                        <option value="Pharmacy assistant">Pharmacy assistant</option>
                        <option value="Pharmacy technician">Pharmacy technician</option>
                    </select>
                </div>
                <button type="submit" name="input" value="SUBMIT">
                    <div class="button-submit">
                            SUBMIT
                    </div>
                </button>
                <a onclick="history.back()">
                    <div class="button">
                        BACK TO MENU
                    </div>
                </a>
            </form>        
        </div>
    </div>
</body>
</html>