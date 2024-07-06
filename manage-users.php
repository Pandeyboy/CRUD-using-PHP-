<?php
include ('database.php');
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

    echo '<script>alert("Submitted Sucessfully");</script>';

}
?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage User - PHP Object Oriented Programming CRUD</title>
    <link rel="stylesheet" href="styles.css">
    <script>function validateForm() {
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
        }</script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">

                <strong>Manage User</strong>

            </div>
            <div class="card-body">
                <div class="col-sm-6">
                    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                    <form name="userForm" method="post" onsubmit="return validateForm()">
                        <div class="form-group">
                            <label class="label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Enter name" required
                                value="<?php echo htmlspecialchars($name); ?>">
                            <span id="nameError" class="error"></span><br>
                        </div>
                        <div class="form-group">
                            <label class="label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" placeholder="Enter email" required
                                value="<?php echo htmlspecialchars($email); ?>"><br>
                            <span id="emailError" class="error"></span><br>
                        </div>
                        <div class="form-group">
                            <label class="label">Mobile <span class="text-danger">*</span></label>
                            <input type="tel" name="mobile" id="mobile" placeholder="Enter mobile" required
                                value="<?php echo htmlspecialchars($mobile); ?>">
                            <span id="mobileError" class="error"></span><br>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" id="submit" class="submit">
                                Add-User</button>
                        </div>
                    </form>
                </div>
                <div class="card2"><a href="users.php" class="browse">Browse Users</a></div>
                <div class="social-login">
                    <h3 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Visit Us
                    </h3>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/dassaultsystemes/"><img
                                src="https://pluspng.com/img-png/instagram-png-instagram-icon-logo-png-512.png"
                                style="width:30px;height:30px ;padding:5px;"></a>
                        <a href="https://www.facebook.com/DassaultSystemes/"><img
                                src="https://pluspng.com/img-png/facebook-transparent-pics-image-38360-512.png"
                                style="width:30px;height:30px; padding:5px;"></a>
                        <a href="https://www.3ds.com/"><img
                                src=" http://pluspng.com/img-png/google-logo-png-open-2000.png"
                                style="width:30px;height:30px;padding:5px;"></a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>

</html>