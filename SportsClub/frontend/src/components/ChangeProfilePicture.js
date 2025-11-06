import React, { useState, useContext } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { AuthContext } from '../AuthContext';

const API = process.env.REACT_APP_API_URL || 'http://localhost/SportsClub';

const ChangeProfilePicture = () => {
    const { user, login } = useContext(AuthContext);
    const [image, setImage] = useState(null);
    const [error, setError] = useState('');
    const [success, setSuccess] = useState('');
    const navigate = useNavigate();

    const handleFileChange = (e) => {
        setImage(e.target.files[0]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const formData = new FormData();
        if (image) formData.append('image', image);

        try {
            const response = await fetch(`${API}/api/changePP.php`, {
                method: 'POST',
                body: formData,
                credentials: 'include'
            });

            const data = await response.json();

            if (data.success) {
                setSuccess(data.message);
                setError('');
                login({ ...user, image: data.image });
                navigate('/view-profile');
            } else {
                setError(data.error || 'Upload failed');
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
                <h2>Change Profile Picture</h2>
                {error && <div className="alert alert-danger">{error}</div>}
                {success && <div className="alert alert-success">{success}</div>}
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="image">Select Image</label>
                        <input type="file" name="image" className="form-control" onChange={handleFileChange} />
                    </div>
                    <button type="submit" className="btn">Upload</button>
                </form>
            </main>
        </div>
    );
};

export default ChangeProfilePicture;
