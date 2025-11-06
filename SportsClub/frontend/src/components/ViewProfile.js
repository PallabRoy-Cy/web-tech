import React, { useState, useEffect, useContext } from 'react';
import { Link } from 'react-router-dom';
import { AuthContext } from '../AuthContext';

const API = process.env.REACT_APP_API_URL || 'http://localhost/SportsClub';

const ViewProfile = () => {
    const { user } = useContext(AuthContext);
    const [profile, setProfile] = useState(null);
    const [error, setError] = useState('');

    useEffect(() => {
        const fetchProfile = async () => {
            try {
                const response = await fetch(`${API}/api/viewprof.php`, {
                    credentials: 'include'
                });
                const data = await response.json();

                if (data.success) {
                    setProfile(data.profile);
                } else {
                    setError(data.error);
                }
            } catch (err) {
                console.error(err);
                setError('Something went wrong');
            }
        };

        fetchProfile();
    }, []);

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
                <h2>View Profile</h2>
                {error && <div className="alert alert-danger">{error}</div>}
                {profile && (
                    <table className="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{profile.name}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{profile.username}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{profile.email}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{profile.gender}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{profile.dateofbirth}</td>
                            </tr>
                        </tbody>
                    </table>
                )}
            </main>
        </div>
    );
};

export default ViewProfile;
