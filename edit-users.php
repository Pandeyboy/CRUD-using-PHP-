<?php
include('database.php');
$obj = new query();

$name = '';
$email = '';
$mobile = '';
$id = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $condition_arr = array('id' => $id);
    $result = $obj->getData('user', '*', $condition_arr);
    $name = $result['0']['name'];
    $email = $result['0']['email'];
    $mobile = $result['0']['mobile'];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    
    $condition_arr = array('name' => $name, 'email' => $email, 'mobile' => $mobile);
    
    if ($id == '') {
        $obj->insertData('user', $condition_arr);
    } else {
        $obj->updateData('user', $condition_arr, 'id', $id);
    }
    echo '<script>alert("Edited Sucessfully");</script>';

    echo '<script>window.location.href="users.php";</script>';
    exit;
}
?>
<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage User - PHP Object Oriented Programming CRUD</title>
    <style>
        body {
    background-image: linear-gradient(to right, #ff7e5f, #feb47b, #86a8e7, #91eae4);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
}

.container {
    margin: 20%;
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 350px;
    text-align: center;
    z-index: 1;
    position: relative;
}

.card-header {
    color: #ffffff4d;
    padding: 10px 20px;
    padding-left: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: center;
}

.card-header strong {
    font-size: 25px;
    margin-left: 22%;
    color: #000;
    font-weight: 900;
}

.card2 {
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin-left: 20%;
    margin-right: 35%;
    text-align: start;
}

.card-body {
    padding: 20px;
}

.form-group {
    text-align: start;
    margin-bottom: 15px;
}

.form-group label {
    margin-bottom: 5px;
    text-align: left;
    font-size: 14px;
    font-family: "Lucida Console", "Courier New", monospace;
}

.form-group input {
    border: none;
    border-bottom: 2px solid #D1D1D4;
    background: none;
    padding: 10px;
    padding-left: 24px;
    padding-right: 24px;
    font-weight: 700;
    width: 75%;
    transition: .2s;
    align-items: end;
}

.form-group input:active,
.form-group input:focus,
.form-group input:hover {
    outline: none;
    border-bottom-color: #6A679E;
}

.form-group .text-danger {
    color: red;
}

.submit {
    display: inline-block;
    width: 100%;
    background-image: linear-gradient(to right, #00c6ff, #0072ff, #f72585, #b5179e);
    padding: 15px;
    font-size: 20px;
    color: white;
    border: 1px solid white;
    border-radius: 30px;
    cursor: pointer;
    margin-top: 20px;
    font-weight: bolder;
}
.submit:hover{
    border-color: #000000;
    outline: none;
}

.btn-primary:hover {
    background-color: lightskyblue;
}

.error {
    color: red;
    font: optional;
    font-size: 10px;
    font-style: italic;
    
}

.browse {
    background: #fff;
    font-size: 14px;
    margin-top: 10px;
    padding-top: 16px;
    margin-left: 12px;
    padding-bottom: 16px;
    padding-left: 22px;
    border-radius: 26px;
    border: 1px solid #D4D3E8;
    text-transform: uppercase;
    font-weight: 700;
    display: flex;
    align-items: center;
    width: 100%;
    color: #4C489D;
    box-shadow: 0px 2px 2px #5C5696;
    cursor: pointer;
    transition: .2s;
}

.browse:hover {
    border-color: #6A679E;
    outline: none;
}

.card-title {
    font-size: 12px;
    text-align: start;
    align-items: start;
}






    </style>
     <script>
        function validateForm() {
            let isValid = true;

           
            const name = document.getElementById("name").value;
            const nameError = document.getElementById("nameError");
            if (!/^[a-zA-Z\s]+$/.test(name)) {
                nameError.textContent = "Name must contain only letters and spaces.";
                isValid = false;
            } else {
                nameError.textContent = "";
            }

            
            const mobile = document.getElementById("mobile").value;
            const mobileError = document.getElementById("mobileError");
            if (!/^\d{10}$/.test(mobile)) {
                mobileError.textContent = "Mobile number must be 10 digits.";
                isValid = false;
            } else {
                mobileError.textContent = "";
            }

            
            const email = document.getElementById("email").value;
            const emailError = document.getElementById("emailError");
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailError.textContent = "Email must be in the format example@domain.com.";
                isValid = false;
            } else {
                emailError.textContent = "";
            }

            return isValid;
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                
                <strong>Edit User</strong>
                
            </div>
            <div class="card-body">
                <div class="col-sm-6">
                    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                    <form name="userForm" autocomplete="off" method="post" onsubmit="return validateForm()">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Enter name" required value="<?php echo htmlspecialchars($name); ?>">
                            <span id="nameError" class="error"></span><br>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" placeholder="Enter email" value="<?php echo htmlspecialchars($email); ?>">
                            <span id="emailError" class="error"></span><br>
                        </div>
                        <div class="form-group">
                            <label>Mobile <span class="text-danger">*</span></label>
                            <input type="tel" name="mobile" id="mobile" placeholder="Enter mobile" required value="<?php echo htmlspecialchars($mobile); ?>">
                            <span id="mobileError" class="error"></span><br>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" id="submit" class="submit">Submit Edit</button>
                        </div>
                        <div class="card2"><a href="users.php" class="browse">Browse Users</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
