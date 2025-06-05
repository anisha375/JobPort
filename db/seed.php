<?php

$host = 'localhost';
$dbname = 'jobport';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully.\n";

    $pdo->exec("
        INSERT INTO users (name, email, password, role) VALUES
        ('Alice Seeker', 'alice@example.com', '" . password_hash('password123', PASSWORD_BCRYPT) . "', 'seeker'),
        ('Bob Seeker', 'bob@example.com', '" . password_hash('password123', PASSWORD_BCRYPT) . "', 'seeker');
    ");

    $pdo->exec("
        INSERT INTO users (name, email, password, role) VALUES
        ('Acme Corp', 'hr@acme.com', '" . password_hash('employer123', PASSWORD_BCRYPT) . "', 'employer'),
        ('Globex Inc', 'jobs@globex.com', '" . password_hash('employer123', PASSWORD_BCRYPT) . "', 'employer');
    ");

    $acmeId = $pdo->lastInsertId() - 1;
    $globexId = $pdo->lastInsertId();

    $pdo->exec("
        INSERT INTO companies (user_id, name, description, logo) VALUES
        ($acmeId, 'Acme Corp', 'Leading manufacturer of roadrunner traps.', NULL),
        ($globexId, 'Globex Inc', 'Innovative tech company with global reach.', NULL);
    ");

    $stmt = $pdo->query("SELECT id FROM companies ORDER BY id ASC");
    $companyIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $pdo->exec("
        INSERT INTO jobs (company_id, title, description, location, salary, type) VALUES
        ($companyIds[0], 'Junior Engineer', 'Exciting role in engineering.', 'Kathmandu', 'NRs 40,000', 'Full-time'),
        ($companyIds[0], 'Sales Executive', 'Field sales and customer service.', 'Pokhara', 'NRs 30,000', 'Contract'),
        ($companyIds[1], 'Web Developer', 'Frontend-focused role in UI/UX.', 'Lalitpur', 'NRs 50,000', 'Full-time'),
        ($companyIds[1], 'Data Analyst', 'Work with big data and insights.', 'Biratnagar', 'NRs 60,000', 'Part-time');
    ");

    $stmt = $pdo->query("SELECT id FROM jobs ORDER BY id ASC");
    $jobIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $stmt = $pdo->query("SELECT id FROM users WHERE role = 'seeker'");
    $seekerIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $pdo->exec("
        INSERT INTO applications (user_id, job_id) VALUES
        ($seekerIds[0], $jobIds[0]),
        ($seekerIds[1], $jobIds[2]);
    ");

    $pdo->exec("
        INSERT INTO saved_jobs (user_id, job_id) VALUES
        ($seekerIds[0], $jobIds[1]),
        ($seekerIds[1], $jobIds[3]);
    ");

    echo "Seed data inserted successfully.\n";

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
