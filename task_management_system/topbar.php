<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Bar with Sidebar Items</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .navbar-nav {
            flex-direction: row;
            justify-content: center; /* Center align the navigation links */
        }
        .navbar-nav .nav-item {
            margin-right: 40px; /* Adjust spacing between dropdown items */
        }
        .navbar-nav .nav-item.dropdown {
            margin-left: 80px; /* Adjust distance from the "ADMIN" or "USER" heading */
        }
        .navbar-nav .nav-item.dropdown .dropdown-menu {
            padding: 10px; /* Adjust padding inside dropdown menus */
            width: 300px; /* Increase dropdown menu width */
        }
        .navbar-nav .nav-item.dropdown .dropdown-menu a {
            width: 50%; /* Make dropdown menu items full width */
            display: block;
        }
    </style>
</head>
<body>
<!-- Main header -->
<nav class="main-header navbar navbar-expand navbar-dark bg-primary">
    <div class="container-fluid">
        <!-- Navbar left links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php if($_SESSION['login_type'] == 1): ?>
                    <a class="nav-link" href="./"><b>ADMIN</b></a>
                <?php else: ?>
                    <a class="nav-link" href="./"><b>USER</b></a>
                <?php endif; ?>
            </li>
            <!-- Dropdown menu for Projects -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="projectsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>PROJECTS</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="projectsDropdown">
                    <a class="dropdown-item" href="./index.php?page=project_list">Project List</a>
                    <a class="dropdown-item" href="./index.php?page=new_project">Add New Project</a>
                </div>
            </li>
            <!-- Dropdown menu for Activity -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="activityDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>ACTIVITY</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="activityDropdown">
                    <a class="dropdown-item" href="./index.php?page=sub_activity">Subactivity List</a>
                    <a class="dropdown-item" href="./index.php?page=new_subactivity">Add New Subactivity</a>
                </div>
            </li>
            <!-- Dropdown menu for Tasks -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="tasksDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>TASKS</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="tasksDropdown">
                    <a class="dropdown-item" href="./index.php?page=task_list">Task List</a>
                    <!-- Add more task-related items here -->
                </div>
            </li>
            <!-- Dropdown menu for Users -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>USERS</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="usersDropdown">
                    <a class="dropdown-item" href="./index.php?page=user_list">User List</a>
                    <a class="dropdown-item" href="./index.php?page=new_user">Add New User</a>
                    <!-- Add more user-related items here -->
                </div>
            </li>
            <!-- Dropdown menu for Report -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="reportsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>REPORTS</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="reportsDropdown">
                    <a class="dropdown-item" href="./index.php?page=reports">Report List</a>
                    <!-- Add more report-related items here -->
                </div>
            </li>
        </ul>

        <!-- Navbar right links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span><?php echo ucwords($_SESSION['login_firstname']) ?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="javascript:void(0)" id="manage_account"><i class="fa fa-cog"></i> Manage Account</a>
                    <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<!-- JavaScript code for managing account -->
<script>
    $(document).ready(function(){
        $('#manage_account').click(function(){
            uni_modal('Manage Account','manage_user.php?id=<?php echo $_SESSION['login_id'] ?>')
        })
    })
</script>
</body>
</html>

