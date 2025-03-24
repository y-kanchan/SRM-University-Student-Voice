# SRM-University-Student-Voice
This repository contains the source code for the website of SRM University-Student Voice, a premier multidisciplinary institution in Andhra Pradesh, India. The website showcases the university's academic programs, facilities, student testimonials, and a student complaint portal ("Student Voice"). It is designed to provide a user friendly experience with responsive design, modern styling, and interactive features.

## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Setup Instructions](#setup-instructions)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)


## Project Overview

The SRM University-AP website is a robust digital platform that functions as an informational hub for students, faculty, and prospective visitors. It provides detailed insights into the university’s academic offerings, infrastructure, and student experiences. Additionally, it incorporates the **Student Voice** portal, enabling students to securely log in, submit complaints, and monitor their resolution status. The website is developed with a focus on accessibility, responsiveness, and user engagement, ensuring a seamless experience across devices.

## Features

### General Website Features

- **Responsive Design**: The website is designed to adapt seamlessly across various screen sizes, including desktops, tablets, and mobile devices, ensuring accessibility for all users.
- **Navigation Menu**: Provides structured links to essential sections, including Home, About, Courses, Contact, and the Student Voice portal, facilitating easy access to information.
- **Academic Programs**: Highlights distinguished programs such as B.Tech in Computer Science and Engineering (CSE), Electronics and Communication Engineering (ECE), and Mechanical Engineering, each offering specialized tracks.
- **Facilities**: Showcases the university’s state-of-the-art infrastructure, including a world-class library, well-equipped laboratories, and structured motivational sessions for student development.
- **Testimonials**: Presents feedback from students, accompanied by ratings, to reflect the quality of education and campus experience.
- **Contact Information**: Offers a comprehensive contact form, an embedded map, and detailed contact details, including phone, email, fax, and physical address, for effective communication.
- **Social Media Integration**: Provides direct links to SRM University-AP’s official profiles on Facebook, Instagram, and YouTube, enabling users to stay connected with university updates.
- **Call to Action**: Encourages prospective students to enroll in academic programs or reach out to the university for further inquiries, promoting engagement.

### Student Voice Portal Features

- **Secure Authentication**: Enables students to log in using their SRM email (e.g., `student@srmap.edu.in`) and a designated password (`srm123`), ensuring authorized access.
- **Complaint Submission**: Facilitates the submission of complaints with detailed fields for category, subject, description, location, and optional file attachments.
  - Categories include Academic Issues, Campus Facilities, Hostel/Accommodation, and more.
  - Supports anonymous submissions to protect student privacy.
- **Complaint Management**: Allows students to view, edit, and delete their submitted complaints, with real-time status updates (Pending, In Progress, Resolved).
- **Notifications**: Displays the number of active complaints through a notification badge, keeping students informed.
- **Frequently Asked Questions (FAQs)**: Provides answers to common inquiries regarding the complaint process, enhancing user understanding.

## Technologies Used

- **HTML5**: Utilized for creating the structural framework of the website, ensuring semantic and accessible markup.
- **CSS3**: Employed for styling and implementing responsive design, with custom styles defined in the `style.css` file to enhance visual presentation.
- **JavaScript**: Implemented to enable interactive functionalities, such as the toggle menu and dynamic complaint form operations within the Student Voice portal.
- **PHP**: Applied for server-side session management and secure login functionality in the Student Voice portal, ensuring user authentication.
- **Bootstrap 5**: Integrated to provide a responsive layout, along with pre-designed components such as cards and navigation bars, particularly in the Student Voice portal.
- **Font Awesome**: Incorporated to include scalable vector icons, enhancing the visual appeal and usability of the website.
- **Google Fonts**: Utilized the Poppins font family to ensure consistent and professional typography across the website.
- **Google Maps API**: Embedded to display an interactive map on the Contact Us page, assisting users in locating the university.
- **Local Storage**: Employed to store and manage complaint data locally within the Student Voice portal, enabling efficient tracking and updates.

## Setup Instructions

To deploy this project on a local environment, adhere to the following steps:

### Prerequisites

- A web browser (e.g., Google Chrome, Mozilla Firefox).
- A local server environment (e.g., XAMPP, WAMP) to support PHP execution.
- Git (optional, for cloning the repository).

### Steps

1. **Clone the Repository** (or download the ZIP file):
   git clone https://github.com/your-username/SRM-University-AP-Website.git

2. **Configure a Local Server**:
- Install XAMPP or WAMP and initiate the Apache and MySQL services.
- Transfer the project folder to the `htdocs` directory (e.g., `C:/xampp/htdocs/SRM-University-AP-Website`).
3. **Access the Website**:
- Launch a web browser and navigate to `http://localhost/SRM-University-AP-Website/`.
- The homepage (`index.html`) will be displayed automatically.
4. **Test the Student Voice Portal**:
- Navigate to the "Student Voice" section (`login.php`).
- Log in using an SRM email (e.g., `student@srmap.edu.in`) and the password `srm123`.
- Upon successful authentication, the Student Voice dashboard (`index.php`) will be accessible.

### Notes

- The Student Voice portal employs a hardcoded password (`srm123`) for demonstration purposes. In a production environment, a secure authentication system with a database is recommended.
- Ensure all image files are present in the `images/` directory to prevent broken links.

## Usage

### General Website

- **Homepage (`index.html`)**: Explore information about SRM University-AP, including its academic programs, facilities, and student testimonials. Utilize the "Visit Us To Know More" link to access the university’s location on Google Maps.
- **About Us (`about.html`)**: Review the university’s vision and mission statements.
- **Courses (`course.html`)**: Examine the academic programs and facilities offered by the university.
- **Contact Us (`contact.html`)**: Access contact details, an interactive map, and a form to submit inquiries.
- **Social Media Links**: Connect with SRM University-AP’s official pages on Facebook, Instagram, and YouTube through the footer section.

### Student Voice Portal

- **Login (`login.php`)**: Authenticate using an SRM email and the password `srm123` to access the portal.
- **Dashboard (`index.php`)**:
- **Submit a Complaint**: Complete the form with the complaint category, subject, details, location, and optional attachments. Select the "Submit anonymously" option if desired.
- **View Complaints**: Access a list of submitted complaints with their respective statuses (Pending, In Progress, Resolved). Apply filters to sort by status.
- **Edit/Delete Complaints**: Modify or remove existing complaints as needed.
- **Notifications**: Monitor the notification badge for the count of active complaints.
- **FAQs**: Review answers to frequently asked questions about the complaint process.
- **Logout**: Select the "Logout" option to terminate the session.

# Screenshots
The following screenshots provide a visual representation of the SRM University-AP website and its key functionalities:

- **Homepage**

 ![Homepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/f5cd10790868f07ba01bba4830f0c7f8631a5dde/screenshots/Home.png)
 ![Homepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/home1.png)
 ![Homepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/home2.png)
 ![Homepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/home3.png)
 ![Homepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/home4.png)
 ![Homepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/home5.png)


- **About**

 ![Aboutpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/about.png)
 ![Aboutpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/about1.png)
 ![Aboutpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/about2.png)



- **Course**

 ![Coursepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/course.png)
 ![Coursepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/course1.png)
 ![Coursepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/course2.png)
 ![Coursepage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/course3.png)


 - **Contact**
 
 ![Contactpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/contact.png)
 ![Contactpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/contact1.png)
 ![Contactpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/contact2.png)


 - **Student Voice**
 
 ![Contactpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/studentvoice.png)
 ![Contactpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/studentvoice1.png)
 ![Contactpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/studentvoice2.png)
 ![Contactpage Screenshot](https://github.com/y-kanchan/SRM-University-Student-Voice/blob/43f85cf2f832ff6acdd05c7f4e764329b5803581/screenshots/studentvoice3.png)


## Contributing

Contributions to this project are encouraged. To contribute, please follow these steps:

1. Fork the repository to your GitHub account.
   
2. Create a new branch for your changes:
      - git checkout -b feature/your-feature

3. Implement and commit your changes:
     - git commit -m "Add your feature"
   
4. Push the branch to your forked repository:
     - git push origin feature/your-feature

5. Submit a pull request with a detailed description of your contributions.

## License

This project is licensed under the MIT License. Refer to the [LICENSE](LICENSE) file for further details.

## Contact

For any inquiries or feedback, please contact:

- **Developer**: Kanchan Yadav
  - Email: [kanchanyadav0916@gmail.com](mailto:kanchanyadav0196@gmail.com)
- **University Contact**:
  - Email: [support@srmap.edu.in](mailto:support@srmap.edu.in)
  - Phone: +91-863-2343000
  - Address: Neerukonda, Mangalagiri Mandal, Guntur District, Mangalagiri, Andhra Pradesh 522240, India












