<?php
require_once 'config/config.php';
$pdo = getDBConnection();

try {
    $sql = "CREATE TABLE IF NOT EXISTS leave_validation (
        id INT AUTO_INCREMENT PRIMARY KEY,
        employee_id INT NOT NULL,
        employee_name VARCHAR(255) NOT NULL,
        leave_date DATE NOT NULL,
        shift VARCHAR(100) NOT NULL,
        validation_status ENUM('Pending', 'Validated', 'Rejected') DEFAULT 'Pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (employee_id) REFERENCES users(id)
    )";
    $pdo->exec($sql);
    echo "Table 'leave_validation' created successfully.\n";
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage() . "\n";
}
?>
