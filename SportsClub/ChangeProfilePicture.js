import React, { useState } from 'react';
import axios from 'axios';
import { useAuth } from '../../context/AuthContext';

const ChangeProfilePicture = () => {
    const [file, setFile] = useState(null);
    const [message, setMessage] = useState('');
    const { user, updateUser } = useAuth();

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!file) {
            setMessage('Please select a file.');
            return;
        }

        const formData = new FormData();
        formData.append('image', file);
        formData.append('id', user.id); // Assuming user object has the id

        try {
            const response = await axios.post(`${process.env.REACT_APP_API_URL}/profile/updateProfilePicture.php`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            if (response.data.success) {
                setMessage(response.data.message);
                // Update user context with the new image name
                updateUser({ image: response.data.newImage });
            } else {
                setMessage(response.data.message);
            }
        } catch (error) {
            setMessage('An error occurred while uploading the image.');
        }
    };

    return (
        <div>
            <h4>Change Profile Picture</h4>
            <form onSubmit={handleSubmit}>
                <input type="file" onChange={handleFileChange} />
                <button type="submit">Upload</button>
            </form>
            {message && <p>{message}</p>}
            {user && <img src={`http://localhost/SportsClub_Modern/backend/uploads/${user.image}`} alt="Profile" width="100" />}
        </div>
    );
};

export default ChangeProfilePicture;