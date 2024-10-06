
CREATE TABLE Pengguna (
	id INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    kataSandi VARCHAR(255) NOT NULL,
    dibuat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    diupdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


DELIMITER //
	CREATE PROCEDURE buatAkun(
		IN p_userName VARCHAR(100),
        IN p_email VARCHAR(100),
        IN p_kataSandi VARCHAR(255)
    )
    BEGIN
		INSERT INTO Pengguna (userName, email, kataSandi)
        VALUES (p_userName, p_email, p_kataSandi);
	END //
    DELIMITER;
    
    
    DELIMITER //
		CREATE PROCEDURE login(
			IN p_emailOrName VARCHAR(100)
        )
        BEGIN 
			DECLARE storedPassword VARCHAR(255);
        
			SELECT kataSandi INTO storedPassword
            FROM Pengguna
            WHERE email = p_emailOrName OR userName = p_emailOrName;
            
            SELECT storedPassword;
            
		END //
        DELIMITER ;
        
        
        
        
        
    