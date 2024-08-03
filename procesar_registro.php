<?php
// Configuración de la base de datos
$host = 'localhost';
$db = 'revecoin';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener datos del formulario
    $planName = $_POST['plan']; // Nombre del plan, no ID
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar contraseña
    $paymentMethodName = $_POST['payment-method']; // Nombre del método de pago
    $cardNumber = $_POST['card-number'];
    $amount = $_POST['amount'];
    $expiryDate = $_POST['expiry-date']; // Fecha en formato dd-mm-yyyy
    $cvv = $_POST['cvv'];

    // Convertir la fecha al formato yyyy-mm-dd
    $expiryDateFormatted = DateTime::createFromFormat('Y-m-d', $expiryDate)->format('Y-m-d');

    // Obtener IDs de plan y método de pago
    $stmt = $pdo->prepare("SELECT id FROM planes WHERE nombre = :planName");
    $stmt->execute([':planName' => ucfirst($planName)]);
    $planId = $stmt->fetchColumn();

    $stmt = $pdo->prepare("SELECT id FROM metodos_pago WHERE nombre = :paymentMethodName");
    $stmt->execute([':paymentMethodName' => $paymentMethodName]);
    $paymentMethodId = $stmt->fetchColumn();

    if (!$planId || !$paymentMethodId) {
        throw new Exception('Plan o método de pago no válido.');
    }

    // Comenzar la transacción
    $pdo->beginTransaction();

    // Insertar el usuario en la base de datos
    $stmt = $pdo->prepare("
        INSERT INTO usuarios (nombres, email, telefono, contraseña, plan, metodo_pago)
        VALUES (:nombres, :email, :telefono, :contraseña, :plan, :metodo_pago)
    ");
    $stmt->execute([
        ':nombres' => $fullName,
        ':email' => $email,
        ':telefono' => $phone,
        ':contraseña' => $password,
        ':plan' => $planId,
        ':metodo_pago' => $paymentMethodId
    ]);
    
    // Obtener el ID del usuario recién insertado
    $userId = $pdo->lastInsertId();

    // Insertar los datos de la tarjeta en la base de datos
    $stmt = $pdo->prepare("
        INSERT INTO credito (id_metodo, numero_tarjeta, fecha_vencimiento, codigo_cvv)
        VALUES (:id_metodo, :numero_tarjeta, :fecha_vencimiento, :codigo_cvv)
    ");
    $stmt->execute([
        ':id_metodo' => $paymentMethodId,
        ':numero_tarjeta' => $cardNumber,
        ':fecha_vencimiento' => $expiryDateFormatted,
        ':codigo_cvv' => $cvv
    ]);

    // Insertar el monto en la tabla de monedero
    $stmt = $pdo->prepare("
        INSERT INTO monedero (usuario_id, dinero_acumulado)
        VALUES (:usuario_id, :dinero_acumulado)
    ");
    $stmt->execute([
        ':usuario_id' => $userId,
        ':dinero_acumulado' => $amount
    ]);

    // Confirmar la transacción
    $pdo->commit();

    echo "Registro completado con éxito.";
} catch (PDOException $e) {
    // Revertir la transacción en caso de error
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
