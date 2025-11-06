import React from 'react';
import { Link } from 'react-router-dom';

const Homepage = () => {
    return (
        <>
            <section className="hero" style={{ backgroundImage: 'url(/img/sports.jpg)' }}>
                <div className="hero-content container">
                    <h1>Welcome to the Sports Club</h1>
                    <p>Your one-stop destination for training, community, and events.</p>
                    <div className="actions">
                        <Link to="/register" className="btn btn-primary">Join Now</Link>
                        <Link to="/login" className="btn btn-outline">Member Login</Link>
                    </div>
                </div>
            </section>

            <section className="container" style={{ marginTop: '2rem' }}>
                <div className="features-grid">
                    <div className="card">
                        <h3>Professional Coaching</h3>
                        <p>Improve your skills with our certified coaches across multiple sports.</p>
                    </div>
                    <div className="card">
                        <h3>Modern Facilities</h3>
                        <p>Access world-class courts, fields, and fitness equipment.</p>
                    </div>
                    <div className="card">
                        <h3>Community Events</h3>
                        <p>Compete and connect with others through weekly leagues and events.</p>
                    </div>
                </div>
            </section>
        </>
    );
};

export default Homepage;
