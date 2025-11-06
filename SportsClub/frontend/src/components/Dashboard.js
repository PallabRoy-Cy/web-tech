import React, { useContext } from 'react';
import { Link } from 'react-router-dom';
import { AuthContext } from '../AuthContext';

const API = process.env.REACT_APP_API_URL || 'http://localhost/SportsClub';

const Dashboard = () => {
    const { user } = useContext(AuthContext);

    return (
        <div className="dashboard-container">
            <div className="sidebar">
                <div className="profile-info">
                    <img src={`${API}/uploads/${user.image}`} alt={user.name} />
                    <h3>{user.name}</h3>
                </div>
                <nav className="dashboard-nav">
                    <ul>
                        <li><Link to="/view-profile">View Profile</Link></li>
                        <li><Link to="/edit-profile">Edit Profile</Link></li>
                        <li><Link to="/change-password">Change Password</Link></li>
                        <li><Link to="/change-profile-picture">Change Profile Picture</Link></li>
                    </ul>
                </nav>
            </div>
            <main className="main-content">
                <h2>Welcome to your dashboard, {user.name}!</h2>
            </main>
        </div>
    );
};

export default Dashboard;
