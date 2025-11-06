import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import { AuthContext } from './AuthContext';
import Login from './components/Login';
import Register from './components/Register';
import Dashboard from './components/Dashboard';
import ViewProfile from './components/ViewProfile';
import EditProfile from './components/EditProfile';
import ChangePassword from './components/ChangePassword';
import ChangeProfilePicture from './components/ChangeProfilePicture';
import Homepage from './components/Homepage';
import ProtectedRoute from './components/ProtectedRoute';
import './App.css';

const App = () => {
    return (
        <Router>
            {/* The main layout container for flexbox */}
            <div className="app-layout">
                <Header />
                {/* Main content area that will grow to push the footer down */}
                <main className="app-main-content">
                    <Routes>
                        <Route path="/" element={<Homepage />} />
                        <Route path="/login" element={<Login />} />
                        <Route path="/register" element={<Register />} />
                        <Route path="/dashboard" element={<ProtectedRoute><Dashboard /></ProtectedRoute>} />
                        <Route path="/view-profile" element={<ProtectedRoute><ViewProfile /></ProtectedRoute>} />
                        <Route path="/edit-profile" element={<ProtectedRoute><EditProfile /></ProtectedRoute>} />
                        <Route path="/change-password" element={<ProtectedRoute><ChangePassword /></ProtectedRoute>} />
                        <Route path="/change-profile-picture" element={<ProtectedRoute><ChangeProfilePicture /></ProtectedRoute>} />
                    </Routes>
                </main>
                <Footer />
            </div>
        </Router>
    );
};

const Header = () => {
    const { user, logout } = React.useContext(AuthContext);

    return (
        <header>
            <div className="container">
                <div className="brand">
                    <Link to="/" className="brand-link" aria-label="Sports Club home">
                        <img src="/img/splogo.png" alt="Sports Club logo" className="brand-logo" />
                        <span className="brand-text">Sports Club</span>
                    </Link>
                </div>
                <nav>
                    <ul>
                        {user ? (
                            <>
                                <li><Link to="/dashboard">Dashboard</Link></li>
                                <li><button className="btn btn-outline" onClick={logout}>Logout</button></li>
                            </>
                        ) : (
                            <>
                                <li><Link to="/login">Login</Link></li>
                                <li><Link to="/register" className="btn btn-primary">Join</Link></li>
                            </>
                        )}
                    </ul>
                </nav>
            </div>
        </header>
    );
};

const Footer = () => {
    return (
        <footer>
            <div className="container">
                <p>&copy; 2025 Sports Club. All rights reserved.</p>
            </div>
        </footer>
    );
};

export default App;
