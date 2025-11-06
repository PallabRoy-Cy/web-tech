import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

const API = process.env.REACT_APP_API_URL || 'http://localhost/SportsClub';

const Register = () => {
    const [name, setName] = useState('');
    const [username, setUsername] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');
    const [gender, setGender] = useState('');
    const [dob, setDob] = useState('');
    const [image, setImage] = useState(null);
    const [error, setError] = useState('');
    const [success, setSuccess] = useState('');
    const navigate = useNavigate();

    const handleFileChange = (e) => {
        setImage(e.target.files[0]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        if (password !== confirmPassword) {
            setError('Passwords do not match');
            return;
        }

        const formData = new FormData();
        formData.append('name', name);
        formData.append('username', username);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('gender', gender);
        formData.append('dob', dob);
        if (image) formData.append('image', image);

        try {
            const response = await fetch(`${API}/api/registration.php`, {
                method: 'POST',
                body: formData,
                credentials: 'include'
            });

            const data = await response.json();

            if (data.success) {
                setSuccess(data.message);
                setError('');
                navigate('/login');
            } else {
                const msg = data.errors ? data.errors.join(', ') : (data.error || 'Registration failed');
                setError(msg);
                setSuccess('');
            }
        } catch (err) {
            setError('Something went wrong');
            setSuccess('');
        }
    };

    return (
        <div className="login-form">
            <h2>Registration</h2>
            {error && <div className="alert alert-danger">{error}</div>}
            {success && <div className="alert alert-success">{success}</div>}
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="name">Name</label>
                    <input type="text" name="name" className="form-control" value={name} onChange={(e) => setName(e.target.value)} />
                </div>
                <div className="form-group">
                    <label htmlFor="email">E-mail</label>
                    <input type="text" name="email" className="form-control" value={email} onChange={(e) => setEmail(e.target.value)} />
                </div>
                <div className="form-group">
                    <label htmlFor="username">User Name</label>
                    <input type="text" name="username" value={username} onChange={(e) => setUsername(e.target.value)} className="form-control" />
                </div>
                <div className="form-group">
                    <label htmlFor="psw">Password</label>
                    <input type="password" name="psw" value={password} onChange={(e) => setPassword(e.target.value)} className="form-control" />
                </div>
                <div className="form-group">
                    <label htmlFor="password">Confirm Password</label>
                    <input type="password" name="password" value={confirmPassword} onChange={(e) => setConfirmPassword(e.target.value)} className="form-control" />
                </div>
                <fieldset className="form-group">
                    <legend>Gender</legend>
                    <div className="form-check">
                        <input className="form-check-input" type="radio" id="male" name="gender" value="male" onChange={(e) => setGender(e.target.value)} />
                        <label className="form-check-label" htmlFor="male">Male</label>
                    </div>
                    <div className="form-check">
                        <input className="form-check-input" type="radio" id="female" name="gender" value="female" onChange={(e) => setGender(e.target.value)} />
                        <label className="form-check-label" htmlFor="female">Female</label>
                    </div>
                    <div className="form-check">
                        <input className="form-check-input" type="radio" id="other" name="gender" value="other" onChange={(e) => setGender(e.target.value)} />
                        <label className="form-check-label" htmlFor="other">Other</label>
                    </div>
                </fieldset>
                <div className="form-group">
                    <label htmlFor="dob">Date of Birth:</label>
                    <input type="date" name="dob" className="form-control" value={dob} onChange={(e) => setDob(e.target.value)} />
                </div>
                <div className="form-group">
                    <label htmlFor="image">Profile Picture</label>
                    <input type="file" name="image" className="form-control" onChange={handleFileChange} />
                </div>
                <button type="submit" className="btn">Submit</button>
            </form>
        </div>
    );
};

export default Register;
