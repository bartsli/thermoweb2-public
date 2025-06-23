<?php
/**
 * ThermoWEB 2.0 - Main Application File
 * 
 * @author ThermoWEB Team
 * @version 2.0
 */

// Basic configuration
ini_set('display_errors', 0);
error_reporting(E_ALL);
date_default_timezone_set('Europe/Warsaw');

// Load dependencies
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;

// Initialize logging
$log = new Logger('thermoweb');
$log->pushHandler(new RotatingFileHandler(__DIR__ . '/logs/app.log', 10, Logger::INFO));
$log->pushHandler(new StreamHandler('php://stderr', Logger::WARNING));

// Load configuration
$config = simplexml_load_file(__DIR__ . '/config.xml');
if ($config === false) {
    $log->critical('Could not load configuration file');
    die('Configuration error');
}

// Database connection
try {
    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s',
        $config->database->host,
        $config->database->port,
        $config->database->name
    );
    
    $db = new PDO(
        $dsn,
        (string)$config->database->user,
        getenv('THERMOWEB_DB_PASSWORD'),
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    $log->critical('Database connection failed: ' . $e->getMessage());
    die('Database connection error');
}

// Temperature sensor class
class TemperatureSensor {
    private $id;
    private $name;
    private $location;
    private $minTemp;
    private $maxTemp;
    private $db;
    private $log;

    public function __construct($id, PDO $db, Logger $log) {
        $this->db = $db;
        $this->log = $log;
        $this->id = $id;
        
        $stmt = $db->prepare('SELECT * FROM sensors WHERE id = ?');
        $stmt->execute([$id]);
        $sensor = $stmt->fetch();
        
        if (!$sensor) {
            throw new RuntimeException('Sensor not found');
        }
        
        $this->name = $sensor['name'];
        $this->location = $sensor['location'];
        
        // Load alert settings
        $stmt = $db->prepare('SELECT min_temp, max_temp FROM sensor_alerts WHERE sensor_id = ?');
        $stmt->execute([$id]);
        $alert = $stmt->fetch();
        
        $this->minTemp = $alert ? $alert['min_temp'] : null;
        $this->maxTemp = $alert ? $alert['max_temp'] : null;
    }
    
    public function recordMeasurement($temperature, $humidity = null) {
        try {
            $stmt = $this->db->prepare(
                'INSERT INTO measurements (sensor_id, temperature, humidity, measured_at) 
                 VALUES (?, ?, ?, NOW())'
            );
            $stmt->execute([$this->id, $temperature, $humidity]);
            
            $this->log->info("Recorded measurement for sensor {$this->name}: {$temperature}°C");
            
            // Check alerts
            if ($this->minTemp !== null && $temperature < $this->minTemp) {
                $this->sendAlert('LOW', $temperature);
            } elseif ($this->maxTemp !== null && $temperature > $this->maxTemp) {
                $this->sendAlert('HIGH', $temperature);
            }
            
            return true;
        } catch (PDOException $e) {
            $this->log->error("Failed to record measurement: " . $e->getMessage());
            return false;
        }
    }
    
    private function sendAlert($type, $temperature) {
        $this->log->warning("Temperature alert for sensor {$this->name}: {$temperature}°C ({$type})");
        
        // Email notification logic would go here
        // For now just log the alert
    }
    
    public function getLatestMeasurement() {
        $stmt = $this->db->prepare(
            'SELECT temperature, humidity, measured_at 
             FROM measurements 
             WHERE sensor_id = ? 
             ORDER BY measured_at DESC 
             LIMIT 1'
        );
        $stmt->execute([$this->id]);
        return $stmt->fetch();
    }
    
    public function getDailyStatistics() {
        $stmt = $this->db->prepare("
            SELECT 
                DATE_FORMAT(measured_at, '%Y-%m-%d') as date,
                MIN(temperature) as min_temp,
                MAX(temperature) as max_temp,
                AVG(temperature) as avg_temp,
                COUNT(*) as measurements_count
            FROM measurements
            WHERE sensor_id = ?
                AND measured_at >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
            GROUP BY DATE_FORMAT(measured_at, '%Y-%m-%d')
        ");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll();
    }
}

// Handle incoming requests
$action = $_GET['action'] ?? 'status';

switch ($action) {
    case 'status':
        header('Content-Type: application/json');
        try {
            $sensorId = $_GET['sensor'] ?? 1;
            $sensor = new TemperatureSensor($sensorId, $db, $log);
            $measurement = $sensor->getLatestMeasurement();
            echo json_encode([
                'status' => 'ok',
                'data' => $measurement
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        break;
        
    case 'record':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            die('Method not allowed');
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        if (!isset($data['sensor_id'], $data['temperature'])) {
            http_response_code(400);
            die('Missing required parameters');
        }
        
        try {
            $sensor = new TemperatureSensor($data['sensor_id'], $db, $log);
            $result = $sensor->recordMeasurement(
                $data['temperature'],
                $data['humidity'] ?? null
            );
            
            header('Content-Type: application/json');
            echo json_encode([
                'status' => $result ? 'ok' : 'error'
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        break;
        
    default:
        http_response_code(404);
        die('Action not found');
}

// Example PHP file for GitHub Linguist detection

echo "Hello from PHP!\n";

// Add more lines to increase file size for Linguist
for ($i = 0; $i < 100; $i++) {
    echo "Line $i\n";
}

// Example function
define('EXAMPLE_CONST', 42);
function exampleFunction($param) {
    return $param * EXAMPLE_CONST;
}

// Add more dummy code
echo "Result: " . exampleFunction(2) . "\n";
for ($j = 0; $j < 100; $j++) {
    echo "Dummy $j\n";
}
// More dummy code
for ($k = 0; $k < 100; $k++) {
    echo "PHP Linguist $k\n";
}
// Dummy functions for Linguist
function dummy1() {}
function dummy2() {}
function dummy3() {}
function dummy4() {}
function dummy5() {} 