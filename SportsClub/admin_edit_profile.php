<?php  
session_start();
 $message = '';  
 $error = '';  

$unameErr=$emailErr=$nameErr=""; 
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
        <h2>Edit Admin Profile</h2>
        <form action="controller/updateAdminProf.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input value="<?php echo $profile['name'] ?>" type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input value="<?php echo $profile['email']?>" type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input value="<?php echo $profile['username'] ?>" type="text" id="username" name="username" class="form-control">
                <span class="error">* <?php echo $unameErr;?></span>
            </div>
            <input type="hidden" name="id" value="<?php echo $profile['id'] ?>">
            <button type="submit" name="updateProfile" class="btn">Update</button>
        </form>
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
.error{
    color: red;
}
</style>
<?php include 'footer.php'; ?>