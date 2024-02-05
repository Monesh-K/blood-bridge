-- database 'bloodbank'

CREATE Database `bloodbank`

-- Table structure for `donors`

CREATE TABLE `donors` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    mobile VARCHAR(13) UNIQUE,
    age INT,
    weight INT,
    gender VARCHAR(20),
    bloodgroup VARCHAR(8),
    area VARCHAR(50),
    city VARCHAR(255),
    state VARCHAR(50),
    last_donated DATE
);

-- Table structure for `requests`

CREATE TABLE `requests` (
    from_id INT,
    to_id INT,
    message VARCHAR(500),
    patient_name VARCHAR(50),
    bloodgroup VARCHAR(10),
    hospital_details VARCHAR(255)
);