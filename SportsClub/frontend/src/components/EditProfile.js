import React, { useState, useEffect, useContext } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { AuthContext } from '../AuthContext';

const API = process.env.REACT_APP_API_URL || 'http://localhost/SportsClub';

const EditProfile = () => {
    const { user, login } = useContext(AuthContext);
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [username, setUsername] = useState('');
    const [gender, setGender] = useState('');
    const [dob, setDob] = useState('');
    const [error, setError] = useState('');
    const [success, setSuccess] = useState('');
    const navigate = useNavigate();

    useEffect(() => {
        const fetchProfile = async () => {
            try {
                const response = await fetch(`${API}/api/viewprof.php`, {
                    credentials: 'include'
                });
                const data = await response.json();

                if (data.success) {
                    setName(data.profile.name);
                    setEmail(data.profile.email);
                    setUsername(data.profile.username);
                    setGender(data.profile.gender);
                    setDob(data.profile.dateofbirth);
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

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch(`${API}/api/editprof.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ name, email, username, gender, dob }),
                credentials: 'include'
            });

            const data = await response.json();

            if (data.success) {
                setSuccess(data.message);
                setError('');
                login({ ...user, name, email, username, gender, dob });
                navigate('/view-profile');
            } else {
                setError(data.error || 'Update failed');
                setSuccess('');
            }
        } catch (err) {
            console.error(err);
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
                <h2>Edit Profile</h2>
                {error && <div className="alert alert-danger">{error}</div>}
                {success && <div className="alert alert-success">{success}</div>}
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label>Name</label>
                        <input value={name} type="text" onChange={(e) => setName(e.target.value)} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label>E-mail</label>
                        <input value={email} type="text" onChange={(e) => setEmail(e.target.value)} className="form-control" />
                    </div>
                    <div className="form-group">
                        <label>User Name</label>
                        <input value={username} type="text" onChange={(e) => setUsername(e.target.value)} className="form-control" />
                    </div>
                    <fieldset className="form-group">
                        <legend>Gender</legend>
                        <input type="radio" id="male" name="gender" value="male" checked={gender === 'male'} onChange={(e) => setGender(e.target.value)} />
                        <label htmlFor="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" checked={gender === 'female'} onChange={(e) => setGender(e.target.value)} />
                        <label htmlFor="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other" checked={gender === 'other'} onChange={(e) => setGender(e.target.value)} />
                        <label htmlFor="other">Other</label><br />
                    </fieldset>
                    <div className="form-group">
                        <legend>Date of Birth:</legend>
                        <input value={dob} type="date" onChange={(e) => setDob(e.target.value)} className="form-control" />
                    </div>
                    <button type="submit" className="btn">Update</button>
                </form>
            </main>
        </div>
    );
};

export default EditProfile;
