<?php  
session_start();
 $message = '';  
 $error = '';  

$imageErr="";
 
?>
<?php include 'header.php'; ?>
<div class="dashboard-container">
    <div class="sidebar">
        <div class="profile-info">
            <img src="uploads/<?php echo $_SESSION['image'] ?>" alt="<?php echo $_SESSION['name'] ?>">
            <h3><?php echo ucfirst($_SESSION['name']); ?></h3>
        </div>
        <nav class="dashboard-nav">
            <?php include 'promenu.php';?>
        </nav>
    </div>
    <main class="main-content">
        <h2>Change Profile Picture</h2>
        <form action="controller/updatePP.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="image" class="form-control" />
                <span class="error">* <?php echo $imageErr;?></span>
            </div>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
            <input type="submit" name="updatePP" value="Upload" class="btn">
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