<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Complaint Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #38431a;
            --secondary-color: #75802f;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #daf04c;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f7;
        }
        .navbar { background-color: var(--primary-color); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 3rem 1rem;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }
        .feature-card { text-align: center; padding: 1rem; }
        .feature-icon { font-size: 2rem; margin-bottom: 1rem; color: var(--primary-color); }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 30px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            margin-bottom: 1rem;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 3px rgba(61, 77, 23, 0.25);
            border-color: var(--primary-color);
        }
        footer { background-color: var(--dark-color); color: white; padding: 2rem 0; margin-top: 3rem; }
        .complaint-history { max-height: 400px; overflow-y: auto; }
        .status-badge {
            border-radius: 20px;
            padding: 0.35rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .animated-background {
            background: linear-gradient(-45deg, #507d31, #4a7e23, #6a702e, #87a54a);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff4d6d;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 768px) {
            .hero-section { padding: 2rem 1rem; }
            .hero-section h1 { font-size: 2rem; }
            .navbar-nav { text-align: center; }
            .feature-card { padding: 0.75rem; }
            .card-body { padding: 1rem; }
        }
        @media (max-width: 576px) {
            .btn-lg { font-size: 1rem; padding: 0.5rem 1rem; }
            .navbar-brand { font-size: 1.2rem; }
            .complaint-history { max-height: 300px; }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shield-check me-2"></i>Student Voice</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#new-complaint">New Complaint</a></li>
                    <li class="nav-item"><a class="nav-link" href="#complaints">My Complaints</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQs</a></li>
                    <li class="nav-item position-relative ms-2">
                        <a class="btn btn-light rounded-circle p-1" href="#notifications">
                            <i class="bi bi-bell-fill text-primary"></i>
                            <span class="notification-badge">0</span>
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-light btn-sm" href="index.php?logout=1">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section animated-background text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Student Complaint Portal</h1>
            <p class="lead mb-4">A platform where your concerns are heard and addressed</p>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="#new-complaint" class="btn btn-light btn-lg"><i class="bi bi-plus-circle me-2"></i>New Complaint</a>
                <a href="#complaints" class="btn btn-outline-light btn-lg"><i class="bi bi-list-ul me-2"></i>My Complaints</a>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section class="container mb-5">
        <div class="row g-4">
            <div class="col-md-4 col-sm-6"><div class="card feature-card h-100"><div class="feature-icon"><i class="bi bi-lightning-charge-fill"></i></div><h3>Quick Response</h3><p>Get timely responses to your complaints from relevant authorities.</p></div></div>
            <div class="col-md-4 col-sm-6"><div class="card feature-card h-100"><div class="feature-icon"><i class="bi bi-shield-lock-fill"></i></div><h3>Privacy Protected</h3><p>Your identity is protected and complaints can be filed anonymously if needed.</p></div></div>
            <div class="col-md-4 col-sm-6"><div class="card feature-card h-100"><div class="feature-icon"><i class="bi bi-graph-up"></i></div><h3>Track Progress</h3><p>Monitor the status of your complaints in real-time with detailed updates.</p></div></div>
        </div>
    </section>

    <div class="container">
        <div class="row g-4">
            <!-- New Complaint Form -->
            <div class="col-lg-7" id="new-complaint">
                <div class="card">
                    <div class="card-header bg-primary text-white"><h3 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Submit a New Complaint</h3></div>
                    <div class="card-body">
                        <form id="complaintForm">
                            <div class="mb-3">
                                <label for="complaintType" class="form-label">Complaint Category</label>
                                <select class="form-select" id="complaintType" required>
                                    <option value="" selected disabled>Select a category</option>
                                    <option value="academic">Academic Issues</option>
                                    <option value="facilities">Campus Facilities</option>
                                    <option value="staff">Staff or Faculty</option>
                                    <option value="administration">Administration</option>
                                    <option value="hostel">Hostel/Accommodation</option>
                                    <option value="ragging">Ragging/Harassment</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="complaintSubject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="complaintSubject" placeholder="Brief description of your complaint" required>
                            </div>
                            <div class="mb-3">
                                <label for="complaintDetails" class="form-label">Details</label>
                                <textarea class="form-control" id="complaintDetails" rows="5" placeholder="Provide detailed information about your complaint" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" placeholder="Where did this issue occur?">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Attach Evidence (if any)</label>
                                <input type="file" class="form-control" id="evidence" multiple>
                                <div class="form-text">Upload images, documents or any relevant files</div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="anonymousCheck">
                                <label class="form-check-label" for="anonymousCheck">Submit anonymously</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">I confirm that the information provided is accurate and true</label>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-send me-2"></i>Submit Complaint</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Complaint History -->
            <div class="col-lg-5" id="complaints">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0"><i class="bi bi-clock-history me-2"></i>My Complaints</h3>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">Filter</button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item" href="#" data-filter="all">All Complaints</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="pending">Pending</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="inprogress">In Progress</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="resolved">Resolved</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body complaint-history"></div>
                    <div class="card-footer text-center">
                        <button class="btn btn-outline-primary"><i class="bi bi-arrow-repeat me-1"></i>Load More</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <section class="mt-5" id="faq">
            <div class="card">
                <div class="card-header bg-primary text-white"><h3 class="mb-0"><i class="bi bi-question-circle me-2"></i>Frequently Asked Questions</h3></div>
                <div class="card-body">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">How long does it take for a complaint to be addressed?</button></h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion"><div class="accordion-body">Most complaints are initially reviewed within 24-48 hours.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Can I submit an anonymous complaint?</button></h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Yes, you can choose to submit your complaint anonymously.</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0"><h5 class="mb-3">Student Voice</h5><p>Your trusted platform for addressing student concerns.</p></div>
                <div class="col-md-4"><h5 class="mb-3">Contact Us</h5><ul class="list-unstyled"><li><i class="bi bi-envelope me-2"></i>support@srmap.edu.in</li><li><i class="bi bi-telephone me-2"></i>+91-863-2343000</li><li><i class="bi bi-geo-alt me-2"></i>SRM University AP</li></ul></div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center"><p class="mb-0">© 2025 Student Voice. All rights reserved.</p> <a href="https://www.instagram.com/kretee_ka/"target="_blank" style="text-decoration:none; color: white;"><b> Made by Kanchan Yadav</b></a></p1><br>
                        
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let complaints = JSON.parse(localStorage.getItem('complaints')) || [];
            let notificationCount = complaints.length;
            updateNotificationBadge();

            function updateNotificationBadge() {
                document.querySelector('.notification-badge').textContent = notificationCount;
            }

            function generateId() {
                return '2025-' + Math.random().toString(36).substr(2, 4).toUpperCase();
            }

            function renderComplaints(filter = 'all') {
                const complaintContainer = document.querySelector('.complaint-history');
                complaintContainer.innerHTML = '';
                const filteredComplaints = complaints.filter(c => filter === 'all' || c.status.toLowerCase() === filter);
                filteredComplaints.forEach((complaint, index) => {
                    const html = `
                        <div class="complaint-card card mb-3" data-index="${index}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">${complaint.subject}</h5>
                                    <span class="status-badge bg-${complaint.status === 'Resolved' ? 'success' : complaint.status === 'In Progress' ? 'warning' : 'primary'} text-${complaint.status === 'Resolved' ? 'white' : 'dark'}">${complaint.status}</span>
                                </div>
                                <h6 class="card-subtitle mb-2 text-muted">${complaint.category} - ${complaint.date}</h6>
                                <p class="card-text">${complaint.details.substring(0, 100)}...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted small">ID: ${complaint.id}</span>
                                    <button class="btn btn-sm btn-outline-primary detail-toggle" data-bs-toggle="collapse" data-bs-target="#complaint${index}"><i class="bi bi-chevron-down"></i> Details</button>
                                </div>
                                <div class="collapse mt-3" id="complaint${index}">
                                    <div class="card card-body bg-light">
                                        <p><strong>Details:</strong> ${complaint.details}</p>
                                        <p><strong>Location:</strong> ${complaint.location || 'Not specified'}</p>
                                        <div class="mt-2 d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-secondary edit-complaint" data-index="${index}"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-outline-danger delete-complaint" data-index="${index}"><i class="bi bi-trash"></i> Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    complaintContainer.innerHTML += html;
                });

                document.querySelectorAll('.detail-toggle').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const icon = this.querySelector('i');
                        icon.classList.toggle('bi-chevron-down');
                        icon.classList.toggle('bi-chevron-up');
                    });
                });
            }

            const form = document.getElementById('complaintForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const complaint = {
                    id: generateId(),
                    category: document.getElementById('complaintType').value,
                    subject: document.getElementById('complaintSubject').value,
                    details: document.getElementById('complaintDetails').value,
                    location: document.getElementById('location').value,
                    anonymous: document.getElementById('anonymousCheck').checked,
                    status: 'Pending',
                    date: new Date().toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})
                };
                complaints.unshift(complaint);
                notificationCount++;
                localStorage.setItem('complaints', JSON.stringify(complaints));
                updateNotificationBadge();
                showNotification('Complaint submitted successfully!', 'success');
                renderComplaints();
                form.reset();
            });

            document.querySelectorAll('[data-filter]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    renderComplaints(this.getAttribute('data-filter'));
                });
            });

            function showNotification(message, type) {
                const notification = document.createElement('div');
                notification.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
                notification.style.zIndex = '1050';
                notification.innerHTML = `${message}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
                document.body.appendChild(notification);
                setTimeout(() => new bootstrap.Alert(notification).close(), 5000);
            }

            document.querySelector('.complaint-history').addEventListener('click', function(e) {
                const target = e.target.closest('button');
                if (!target) return;
                const index = target.dataset.index;

                if (target.classList.contains('edit-complaint')) {
                    const complaint = complaints[index];
                    document.getElementById('complaintType').value = complaint.category;
                    document.getElementById('complaintSubject').value = complaint.subject;
                    document.getElementById('complaintDetails').value = complaint.details;
                    document.getElementById('location').value = complaint.location;
                    document.getElementById('anonymousCheck').checked = complaint.anonymous;
                    complaints.splice(index, 1);
                    notificationCount--;
                    saveAndRender();
                    window.scrollTo({ top: document.querySelector('#new-complaint').offsetTop - 80, behavior: 'smooth' });
                }

                if (target.classList.contains('delete-complaint')) {
                    if (confirm('Are you sure you want to delete this complaint?')) {
                        complaints.splice(index, 1);
                        notificationCount--;
                        saveAndRender();
                        showNotification('Complaint deleted successfully', 'success');
                    }
                }
            });

            function saveAndRender() {
                localStorage.setItem('complaints', JSON.stringify(complaints));
                updateNotificationBadge();
                renderComplaints();
            }

            document.querySelector('.btn[href="#notifications"]').addEventListener('click', function(e) {
                e.preventDefault();
                showNotification(`You have ${notificationCount} active complaints`, 'info');
            });

            renderComplaints();
        });
    </script>
</body>
</html>