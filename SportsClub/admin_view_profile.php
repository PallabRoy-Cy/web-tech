<?php  
session_start();
require_once 'controller/profInfo.php';

$profile = fetchProfile($_SESSION['id']);
 
?>
<?php include 'header.php'; ?>
<div class="dashboard-container">
    <div class="sidebar">
        <div class="profile-info">
            <img src="uploads/<?php echo $profile['image'] ?>" alt="<?php echo $profile['name'] ?>">
            <h3><?php echo ucfirst($_SESSION['name']); ?></h3>
        </div>
        <nav class="dashboard-nav">
            <?php include 'adminmenu.php';?>
        </nav>
    </div>
    <main class="main-content">
        <h2>Admin Profile</h2>
        <table class="table">
            <tr>
                <th>Name</th>
                <td><?php echo $profile['name'] ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $profile['username'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $profile['email'] ?></td>
            </tr>
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