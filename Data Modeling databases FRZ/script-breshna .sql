CREATE DATABASE breshna CHARACTER SET utf8 COLLATE utf8_general_ci; 
USE breshna;

-- faizullah firozi wardak 0780002528

CREATE TABLE province(
    
                         province_id         INT PRIMARY KEY AUTO_INCREMENT,
                         province_name       VARCHAR(32) NOT NULL UNIQUE
);
             INSERT INTO province VALUES(NULL,'Wardak');
             INSERT INTO province VALUES(NULL,'Nangarhar');
             INSERT INTO province VALUES(NULL,'Kunar');
             INSERT INTO province VALUES(NULL,'Laghman');
             INSERT INTO province VALUES(NULL,'Nooristan');
             INSERT INTO province VALUES(NULL,'Kabul');
             INSERT INTO province VALUES(NULL,'Paktya');

CREATE TABLE emp_degree (
        
                             degree_id        INT PRIMARY KEY AUTO_INCREMENT,
                             degree_name      VARCHAR(32) NOT NULL UNIQUE
);

             INSERT INTO emp_degree VALUES(NULL,'None Educated');
             INSERT INTO emp_degree VALUES(NULL,'Bachloria');
             INSERT INTO emp_degree VALUES(NULL,'Bachelor');
             INSERT INTO emp_degree VALUES(NULL,'Master');
             INSERT INTO emp_degree VALUES(NULL,'PHD');


CREATE TABLE employee (
                            employee_id         INT PRIMARY KEY AUTO_INCREMENT,
                            firstname          VARCHAR(32) NOT NULL,
                            lastname           VARCHAR(32) NOT NULL,
                            fathername         VARCHAR(32) NOT NULL,
                            gender              BOOLEAN NOT NULL,
                            birth_year          INT NOT NULL,
                            nic                 VARCHAR(64) NOT NULL UNIQUE,
                            marital_status      BOOLEAN NOT NULL,
                            province_id         INT, 
                            district            VARCHAR(64) NOT NULL,
                            address             VARCHAR(255),
                            email               VARCHAR(255) UNIQUE,
                            degree_id           INT NOT NULL, 
                            photo              VARCHAR(128),
                            hire_date           DATE NOT NULL,
                            resign_date         DATE,
CONSTRAINT employee_province_fk FOREIGN KEY (province_id) REFERENCES province(province_id) ON DELETE NO ACTION ON UPDATE CASCADE,
CONSTRAINT employee_degree_fk FOREIGN KEY (degree_id) REFERENCES emp_degree(degree_id) ON DELETE NO ACTION ON UPDATE CASCADE
);

             INSERT INTO employee VALUES(NULL,'Faizullah','Firozi','Haji',0,1998,'Volume 1, page 3',0,1,'chak wardak','Wardak Afghanistan','faizullah.firozi@gmail.com',4,'no image',CURDATE(),NULL);
             INSERT INTO employee VALUES(NULL,'Rafiullah','Zaland','Mir Zaman Khan',0,1998,'Volume 1, page 1',0,1,'Haska Mena','Nangarhar, Jalalabad','rafiullah.zaland@gmail.com',4,'no image',CURDATE(),NULL);
             INSERT INTO employee VALUES(NULL,'Suliman','Samim','Said Amingull',0,1997,'Volume 2, page 1',0,1,'Wazir','Nangarhar, Jalalabad','suliman@gmail.com',4,'no image',CURDATE(),NULL);
             INSERT INTO employee VALUES(NULL,'Ahmad','Riaz','M Seyar',0,1995,'Volume 3, page 1',0,3,'Qarghai','Laghman, Qarghai','ahmad@gmail.com',3,'no image',CURDATE(),NULL);
             INSERT INTO employee VALUES(NULL,'Javed','Afghnayar','Waisudin',0,1999,'Volume 4, page 1',0,5,'Qargha','Qabul Bai, Kabul','javedafghanyar@gmail.com',5,'no image',CURDATE(),NULL);

CREATE TABLE employee_phone (
                                phone_id         INT PRIMARY KEY AUTO_INCREMENT,
                                employee_id      INT NOT NULL, 
                                phone_no         VARCHAR(15) NOT NULL UNIQUE,
CONSTRAINT employee_phone_fk FOREIGN KEY (employee_id) REFERENCES employee(employee_id) ON DELETE CASCADE ON UPDATE CASCADE
);
             INSERT INTO employee_phone VALUES(NULL,1,'0780002528');
             INSERT INTO employee_phone VALUES(NULL,2,'070300873');
             INSERT INTO employee_phone VALUES(NULL,3,'07378373873');
             INSERT INTO employee_phone VALUES(NULL,4,'070073873');


CREATE TABLE contract (
                        contract_id      INT PRIMARY KEY AUTO_INCREMENT,
                        employee_id      INT NOT NULL,
                        start_date       DATE NOT NULL,
                        end_date         DATE NOT NULL,     
                        position         VARCHAR(32) NOT NULL,
                        gross_salary     INT NOT NULL,
CONSTRAINT employee_contract_fk FOREIGN KEY (employee_id) REFERENCES employee(employee_id) ON DELETE CASCADE ON UPDATE CASCADE
);
             INSERT INTO contract VALUES(NULL,1,CURDATE(),'2025-12-30','Database Administrator',1500);
             INSERT INTO contract VALUES(NULL,2,CURDATE(),'2025-12-30','IT Manager',1500);
             INSERT INTO contract VALUES(NULL,3,CURDATE(),'2024-12-30','System Administrator',1500);
             INSERT INTO contract VALUES(NULL,4,CURDATE(),'2024-12-30','HR Manager',1500);
-- created by faizullah firozi wardak 2018
CREATE TABLE attendance (
                            attendance_id    INT PRIMARY KEY AUTO_INCREMENT,
                            employee_id      INT NOT NULL, 
                            date_year        INT NOT NULL, 
                            date_month       TINYINT NOT NULL,
                            date_day         TINYINT NOT NULL,
                            absent_hour      TINYINT NOT NULL,
CONSTRAINT employee_attendance_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
);
             INSERT INTO attendance VALUES(NULL,1,2019,8,2,5);
             INSERT INTO attendance VALUES(NULL,1,2019,8,3,10);
             INSERT INTO attendance VALUES(NULL,2,2019,8,3,8);
             INSERT INTO attendance VALUES(NULL,3,2019,8,3,3);
             INSERT INTO attendance VALUES(NULL,4,2019,8,3,9);

CREATE TABLE overtime (
                            employee_id     INT NOT NULL,
                            date_year       INT NOT NULL,
                            date_month      TINYINT NOT NULL,
                            date_day        TINYINT NOT NULL,
                            over_hour       TINYINT NOT  NULL,
CONSTRAINT overtime_pk PRIMARY KEY(employee_id, date_year, date_month, date_day),
CONSTRAINT employee_overtime_fk FOREIGN KEY (employee_id)  REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
);
             INSERT INTO overtime VALUES(1,2019,8,2,5);
             INSERT INTO overtime VALUES(1,2019,8,3,10);
             INSERT INTO overtime VALUES(2,2019,8,3,8);
             INSERT INTO overtime VALUES(3,2019,8,3,3);
             INSERT INTO overtime VALUES(4,2019,8,3,9);

CREATE TABLE payment (
                        employee_id          INT NOT NULL,
                        date_year            INT NOT NULL,
                        date_month           TINYINT NOT NULL,
                        overtime_amount      INT NOT NULL DEFAULT 0,
                        absent_amount        INT NOT NULL DEFAULT 0,
                        allowance            INT NOT NULL DEFAULT 0,
                        allowance_remark     VARCHAR(255),
                        deduct               INT NOT NULL DEFAULT 0,
                        deduct_remark        VARCHAR(255),
                        taxtable_salary      INT NOT NULL DEFAULT 0,
                        taxt_amount          INT NOT NULL DEFAULT 0,
                        net_salary           INT NOT NULL DEFAULT 0,
CONSTRAINT payment_pk PRIMARY KEY(employee_id, date_year, date_month),
CONSTRAINT employee_payment_fk FOREIGN KEY (employee_id)  REFERENCES employee(employee_id) ON DELETE NO ACTION ON UPDATE CASCADE
);


CREATE TABLE counterbox(
                            counter_id         INT PRIMARY KEY,
                            customer_type      BOOLEAN NOT NULL,
                            coeffecent         INT NOT NULL,
                            phase              TINYINT NOT NULL,
                            account_no         INT  NOT NULL,
                            customer_no        INT NOT NULL,
                            customer_name      VARCHAR(128) NOT NULL,
                            father_name        VARCHAR(32),
                            province_id        INT NOT NULL,
                            district           VARCHAR(64) NOT NULL,
                            address            VARCHAR(255),
                            junction           VARCHAR(128) NOT NULL, 
                            transformer        VARCHAR(128) NOT NULL,
                            box_id             VARCHAR(128) NOT NULL, 
                            rout_code          VARCHAR(255) NOT NULL,
CONSTRAINT province_counterbox_fk FOREIGN KEY (province_id) REFERENCES province(province_id) ON DELETE NO ACTION ON UPDATE CASCADE
);
             INSERT INTO counterbox VALUES(11,0,11,22,111,2,'Ali','Shafiqullah',1,'Haska Mena','Nangarhar, Jalalabad','First','First','11','1');
             INSERT INTO counterbox VALUES(12,1,12,23,112,3,'Aarman','Shafiqullah',1,'Haska Mena','Nangarhar, Jalalabad','Second','First','12','1');
             INSERT INTO counterbox VALUES(13,1,13,24,113,4,'Suliman','Said Amingull',1,'Wazir','Nangarhar, Jalalabad','First','Second','13','2');
             INSERT INTO counterbox VALUES(14,0,14,25,114,5,'Ahmad','Mohamad Seyar',3,'Qarghai','Laghman, Qarghai','Second','First','14','2');


CREATE TABLE invoice (
                        invoice_id             INT PRIMARY KEY  AUTO_INCREMENT,
                        counter_id             INT NOT NULL,
                        round_read             TINYINT NOT NULL, 
                        issue_year             INT NOT NULL,
                        issue_month            TINYINT NOT NULL,
                        issue_day              TINYINT NOT NULL,
                        expire_date            DATE NOT NULL,
                        previous_value         INT NOT NULL,
                        present_value          INT NOT NULL,
                        electricity_charge     INT NOT NULL, 
                        bank_charge            INT NOT NULL DEFAULT 0,
                        service_charge         INT NOT NULL DEFAULT 0,
                        stationay_charge       INT NOT NULL DEFAULT 0,
                        surcharge              INT NOT NULL DEFAULT 0,
                        invoice_amount         INT NOT NULL,
                        taxt                   INT NOT NULL DEFAULT 0,
                        payable_amount         INT NOT NULL,
                        due_amount             INT NOT NULL DEFAULT 0,
                        total_amount           INT NOT NULL,
CONSTRAINT counterbox_ivoice_fk FOREIGN KEY (counter_id)  REFERENCES counterbox(counter_id) ON DELETE NO ACTION ON UPDATE CASCADE
);
CREATE TABLE bank (
                    bank_id        INT PRIMARY KEY AUTO_INCREMENT,
                    bank_name      VARCHAR(64) NOT NULL UNIQUE
);
             INSERT INTO bank VALUES(NULL,'Azizi Bank');
             INSERT INTO bank VALUES(NULL,'Pashtani Bank');
             INSERT INTO bank VALUES(NULL,'Maiwand Bank');
             INSERT INTO bank VALUES(NULL,'Kabul Bank');
             INSERT INTO bank VALUES(NULL,'Islamic Bank');

CREATE TABLE income (
                        invoice_id         INT NOT NULL,
                        bank_id            INT NOT NULL, 
                        receipt_year       INT NOT NULL,
                        receipt_month      TINYINT NOT NULL,
                        receipt_day        TINYINT NOT NULL,
CONSTRAINT invoice_income_fk FOREIGN KEY (invoice_id) REFERENCES invoice (invoice_id) ON DELETE NO ACTION ON UPDATE CASCADE,
CONSTRAINT bank_income_fk FOREIGN KEY (bank_id)  REFERENCES bank(bank_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- faizullah firozi wardak 0780002528

CREATE TABLE expense (
                        expense_id       INT PRIMARY KEY AUTO_INCREMENT,
                        title            VARCHAR(255) NOT NULL,
                        amount           FLOAT NOT NULL,
                        currency         BOOLEAN NOT NULL,
                        receiver         VARCHAR(255) NOT NULL,
                        description      VARCHAR(255),
                        payment_year     INT NOT NULL,
                        payment_month    TINYINT NOT NULL,
                        payment_day      TINYINT NOT NULL
);
CREATE TABLE users(
                        employee_id      INT PRIMARY KEY,
                        user_name        VARCHAR(64) NOT NULL UNIQUE,
                        user_password    VARCHAR(64) NOT NULL,
                        account_status   BOOLEAN NOT NULL DEFAULT 1,
CONSTRAINT employee_users_fk FOREIGN KEY (employee_id) REFERENCES employee(employee_id) ON DELETE CASCADE ON UPDATE CASCADE
);

    INSERT INTO users VALUES (1, 'admin', PASSWORD('123'),1);

CREATE TABLE user_level (
                             employee_id         INT PRIMARY KEY,
                             admin_level         TINYINT NOT NULL DEFAULT 0,
                             hr_level            TINYINT NOT NULL DEFAULT 0,
                             finance_level       TINYINT NOT NULL DEFAULT 0,
                             customer_level      TINYINT NOT NULL DEFAULT 0,
    CONSTRAINT users_user_Level_fk FOREIGN KEY (employee_id) REFERENCES users(employee_id) ON DELETE CASCADE ON UPDATE CASCADE
    );
