import React, { useState, useContext } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { AuthContext } from '../AuthContext';

const API = process.env.REACT_APP_API_URL || 'http://localhost/SportsClub';

const ChangePassword = () => {
    const { user } = useContext(AuthContext);
    const [cpsw, setCpsw] = useState('');
    const [npsw, setNpsw] = useState('');
    const [cnfpsw, setCnfpsw] = useState('');
    const [error, setError] = useState('');
    const [success, setSuccess] = useState('');
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch(`${API}/api/chgpass.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ cpsw, npsw, cnfpsw }),
                credentials: 'include'
            });

            const data = await response.json();

            if (data.success) {
                setSuccess(data.message);
                setError('');
                navigate('/dashboard');
            } else {
                setError(data.error || 'Password change failed');
                setSuccess('');
            }
        } catch (err) {
            setError('Something went wrong');
            setSuccess('');
        }
    };

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
                <h2>CHANGE PASSWORD</h2>
                {error && <div className="alert alert-danger">{error}</div>}
                {success && <div className="alert alert-success">{success}</div>}
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="cpsw">Current Password:</label>
                        <input type="password" name="cpsw" id="cpsw" value={cpsw} onChange={(e) => setCpsw(e.target.value)} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label htmlFor="npsw">New Password:</label>
                        <input type="password" name="npsw" id="npsw" value={npsw} onChange={(e) => setNpsw(e.target.value)} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label htmlFor="cnfpsw">Confirm Password:</label>
                        <input value={cnfpsw} type="password" id="cnfpsw" name="cnfpsw" onChange={(e) => setCnfpsw(e.target.value)} className="form-control" />
                    </div>
                    <button type="submit" className="btn">Update</button>
                </form>
            </main>
        </div>
    );
};

export default ChangePassword;
