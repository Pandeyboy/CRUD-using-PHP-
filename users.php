<?php
include ('database.php');
$obj = new query();

if (isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = $_GET['id'];
    $condition_arr = array('id' => $id);
    $obj->deleteData('user', $condition_arr);
}

$result = $obj->getData('user', '*', '', 'id', 'desc');
?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Listing - PHP Object Oriented Programming CRUD</title>
    <link rel="stylesheet" href="users.css">
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = `?type=delete&id=${id}`;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Browse User</strong>
                <a href="manage-users.php" class="add">
                    Add Users
                </a>
            </div>
        </div>
        <hr>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($result['0'])) {
                        $id = 1;
                        foreach ($result as $list) {
                            ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $list['name'] ?></td>
                                <td><?php echo $list['email'] ?></td>
                                <td><?php echo $list['mobile'] ?></td>
                                <td class="text-center">
                                    <a href="edit-users.php?id=<?php echo $list['id'] ?>" class="text-primary"> Edit</a> |
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $list['id'] ?>);"
                                        class="text-danger"> Delete</a>
                                </td>
                            </tr>
                            <?php
                            $id++;
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">No Records Found!</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>