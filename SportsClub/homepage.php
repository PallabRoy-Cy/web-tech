<?php include 'header.php'; ?>

<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to the Sports Club</h1>
            <p>Your ultimate destination for sports and fitness.</p>
            <a href="registration.php" class="btn">Join Now</a>
        </div>
    </section>

    <section class="features">
        <div class="card">
            <h2>Our Facilities</h2>
            <p>State-of-the-art facilities for all your sporting needs.</p>
        </div>
        <div class="card">
            <h2>Expert Coaches</h2>
            <p>Learn from the best and improve your skills.</p>
        </div>
        <div class="card">
            <h2>Community</h2>
            <p>Join a vibrant community of sports enthusiasts.</p>
        </div>
    </section>

    <section id="about">
        <h2>About Us</h2>
        <p>The Sports Club is a premier destination for athletes and fitness enthusiasts of all levels. Our mission is to provide a supportive and inclusive environment where members can pursue their passion for sports, achieve their fitness goals, and connect with like-minded individuals. We offer a wide range of facilities, programs, and services designed to cater to the diverse needs of our community.</p>
        <p>Our state-of-the-art facilities include a fully equipped gymnasium, swimming pool, tennis courts, basketball courts, and a running track. We also have a team of experienced and certified coaches who are dedicated to helping our members reach their full potential. Whether you're a seasoned athlete or just starting your fitness journey, the Sports Club has something for everyone.</p>
    </section>
</main>

<style>
.hero {
    background: url('sportsonline.jpg') no-repeat center center/cover;
    color: #fff;
    height: 60vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.hero-content h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1rem;
    margin-top: 2rem;
}

#about {
    margin-top: 2rem;
}
</style>

<?php include 'footer.php'; ?>