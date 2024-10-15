# Blood-Bridge

**Blood-Bridge** is a web-based platform designed to streamline blood donation by connecting donors, recipients, and blood banks.

## Features
- User authentication
- Real-time availability updates
- Notification system for urgent blood needs
- Donor and Recipient Notifications:
    - **Upon Raising a Request:** Recipients receive an SMS after submitting a blood request.
    - **When Request is Accepted:** Donors accepting a request trigger an SMS notification for the recipient.
    - **Deleting a Request:** SMS is sent to the Donors when a request is deleted by the recipient.

The platform simplifies the donation process, helping save lives by quickly linking those in need with available donors.

## Technologies Used:
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP, PHP Mailer
- **Database:** MySQL
- **Messaging Service:** Twilio API (for OTP-based login and donor notifications)

---

## Screenshots
### 1. Home Page
This is the first page visible to users, including admins, donors, and blood seekers. It provides a simple and intuitive interface for navigating the platform.

![image](https://github.com/user-attachments/assets/d422de57-9b21-4e37-9bd9-0805e4f33a3c)

---

### 2. Sign Up Page
The sign-up page requires only the user's name and mobile number. OTP-based authentication eliminates the need for a password, making it simple and secure.

![image](https://github.com/user-attachments/assets/8e36901d-77a3-4be5-baf0-9bc48cbe5b24)

---

### 3. Login Page
Users log in with their mobile number and receive an OTP for secure access.

![image](https://github.com/user-attachments/assets/c25e6d28-f689-4ed7-90d4-f2bdea1e3523)

---

### 4. Available Donors
Users can view available donors for a required blood group without logging in. The table shows donor details like name, blood group, area, city, and last donation date.

![image](https://github.com/user-attachments/assets/a07a147b-4293-44de-8cc4-655ce5235e30)

---

### 5. Contact Us
Users can contact the developers for support or grievances through an email-based contact form.

![image](https://github.com/user-attachments/assets/f08e2824-9f6c-4fca-9253-1993f980db6c)

---

### 6. Dashboard
The dashboard allows users to track their activities, including blood donations and requests. Accessible options include:
- **Edit Profile**: Update personal details like age, blood group, city, and last donation date.

![image](https://github.com/user-attachments/assets/48feea35-e29d-40bf-89de-ba0ca5848d25)
- **My Request**: Track the status of blood requests and manage them.

![image](https://github.com/user-attachments/assets/46baa44a-4c17-4a67-a52a-edca4b3e0d32)
![image](https://github.com/user-attachments/assets/76b38258-d13f-4d41-9d79-99adf1f80529)

- **Pending Requests**: View requests from recipients, with options to accept or decline.
![image](https://github.com/user-attachments/assets/77136c0d-be63-4ac7-b161-b79d8778e5bf)

---

### 7. Request Page
Allows recipients to initiate a request for blood while viewing available donors in real-time. Eligible donors are notified via SMS.

![image](https://github.com/user-attachments/assets/82a4526b-a708-4f98-a50f-1d2846c0a7ba)

---
---
