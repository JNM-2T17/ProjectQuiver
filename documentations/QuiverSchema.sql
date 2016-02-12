DROP SCHEMA db_project_quiver;
CREATE SCHEMA db_project_quiver;

USE db_project_quiver;

CREATE TABLE IF NOT EXISTS pq_user_type(
	id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(10) NOT NULL,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_user(
	id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(45) NOT NULL UNIQUE,
    password VARCHAR(128) NOT NULL,
    fName VARCHAR(45) NOT NULL,
    lName VARCHAR(45) NOT NULL,
    userType INT NOT NULL,
    isAdmin TINYINT(1) NOT NULL DEFAULT 0,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT pq_userfk_1
		FOREIGN KEY (userType)
        REFERENCES pq_user_type(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
	INDEX pq_useridx_1(email)
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_student(
	id INT PRIMARY KEY AUTO_INCREMENT,
    idNo CHAR(8) NOT NULL UNIQUE,
    fName VARCHAR(45) NOT NULL,
    lName VARCHAR(45) NOT NULL,
    email VARCHAR(45),
	dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    INDEX pq_studentsidx_1(email)
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_project(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL,
    class VARCHAR(45) NOT NULL,
    abstract TEXT,
    description TEXT,
    review VARCHAR(512),
    reviewer INT,
    forJudging TINYINT(1) NOT NULL DEFAULT 1,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT pq_projectfk_1
		FOREIGN KEY (reviewer)
        REFERENCES pq_user(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_project_images(
	id INT NOT NULL,
    image VARCHAR(45) NOT NULL,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY(id,image),
	CONSTRAINT pq_project_imagesfk_1
		FOREIGN KEY (id)
        REFERENCES pq_project(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_project_tags(
	id INT NOT NULL,
    tag VARCHAR(45) NOT NULL,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY(id,tag),
	CONSTRAINT pq_project_tagsfk_1
		FOREIGN KEY (id)
        REFERENCES pq_project(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_project_grades(
	id INT NOT NULL,
    criteriaNo INT NOT NULL,
    grade FLOAT NOT NULL,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY(id,criteriaNo),
	CONSTRAINT pq_project_gradesfk_1
		FOREIGN KEY (id)
        REFERENCES pq_project(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_project_recogs(
	id INT NOT NULL,
    recog VARCHAR(45) NOT NULL,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY(id,recog),
	CONSTRAINT pq_project_recogsfk_1
		FOREIGN KEY (id)
        REFERENCES pq_project(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) engine = innoDB;

CREATE TABLE IF NOT EXISTS pq_project_students(
	projectId INT NOT NULL,
    studentId INT NOT NULL,
    dateAdded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY(projectId,studentId),
    CONSTRAINT pq_project_studentsfk_1
		FOREIGN KEY (projectId)
        REFERENCES pq_project(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
	CONSTRAINT pq_project_studentsfk_2
		FOREIGN KEY (studentId)
        REFERENCES pq_student(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) engine = innoDB;













