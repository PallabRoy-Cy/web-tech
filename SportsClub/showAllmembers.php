<?php  
session_start();
require_once 'controller/profInfo.php';

$profiles = fetchAllProfiles();


?>
<?php include 'header.php'; ?>
<div class="dashboard-container">
    <div class="sidebar">
        <div class="profile-info">
            <img src="uploads/<?php echo $_SESSION['image'] ?>" alt="<?php echo $_SESSION['name'] ?>">
            <h3><?php echo ucfirst($_SESSION['name']); ?></h3>
        </div>
        <nav class="dashboard-nav">
            <?php include 'adminmenu.php';?>
        </nav>
    </div>
    <main class="main-content">
        <h2>All Members</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profiles as $i => $profile): ?>
                    <tr>
                        <td><a href="viewprof.php?id=<?php echo $profile['id'] ?>"><?php echo $profile['name'] ?></a></td>
                        <td><?php echo $profile['username'] ?></td>
                        <td><?php echo $profile['email'] ?></td>
                        <td><?php echo $profile['gender'] ?></td>
                        <td><?php echo $profile['dateofbirth'] ?></td>
                        <td><img width="50" height="50" src="uploads/<?php echo $profile['image'] ?>" alt="<?php echo $profile['name'] ?>"></td>
                        <td><a href="editprof.php?id=<?php echo $profile['id'] ?>">Edit</a>&nbsp<a href="controller/deleteProfile.php?id=<?php echo $profile['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</div>
<style>
.dashboard-container {
    display: flex;
}
.sidebar {
    width: 250px;
    background: #f4f4f4;
    padding: 1rem;
}
.profile-info {
    text-align: center;
    margin-bottom: 2rem;
}
.profile-info img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 1rem;
}
.dashboard-nav ul {
    list-style: none;
    padding: 0;
}
.dashboard-nav ul li a {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
}
.dashboard-nav ul li a:hover {
    background: #ddd;
}
.main-content {
    flex: 1;
    padding: 1rem;
}
</style>
<?php include 'footer.php'; ?>