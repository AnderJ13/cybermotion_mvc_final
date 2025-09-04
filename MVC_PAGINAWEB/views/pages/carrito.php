<?php
// carrito.php
session_start();

// Simular recepción de datos del producto
$producto = [
    'id' => 1,
    'nombre' => 'Guante Traductor de Lenguaje de Señas',
    'precio' => 165.00,
    'imagen' => 'https://sv.epaenlinea.com/media/catalog/product/cache/e28d833c75ef32af78ed2f15967ef6e0/c/7/c71afa2a-ae9e-4b8a-802c-59024e95ce4f.jpg',
    'cantidad' => isset($_POST['product_quantity']) ? max(1, intval($_POST['product_quantity'])) : 1
];

$subtotal = $producto['precio'] * $producto['cantidad'];
$total = $subtotal;

// Procesar la compra cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_compra'])) {
    // Conectar a la base de datos del CRUD
    $crud_db = new mysqli("localhost", "root", "", "cybermotion");
    
    if ($crud_db->connect_error) {
        die("Error de conexión: " . $crud_db->connect_error);
    }
    
    // OBTENER DATOS DEL USUARIO LOGUEADO
    $usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : NULL;
    $nombre_cliente = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : 'Cliente no registrado';
    
    // INSERTAR CON LOS DATOS DEL USUARIO
    $query = "INSERT INTO ordenes (producto, cantidad, precio_unitario, total, estado, nombre_cliente) 
          VALUES (?, ?, ?, ?, 'pendiente', ?)";
    
    $stmt = $crud_db->prepare($query);
    $stmt->bind_param("sidds",
        $producto['nombre'], 
        $producto['cantidad'], 
        $producto['precio'], 
        $total,
        $nombre_cliente
    );
    
    if ($stmt->execute()) {
        $orden_id = $crud_db->insert_id;
        $mensaje_exito = "¡Compra realizada con éxito! Número de orden: #" . $orden_id;
    } else {
        $mensaje_error = "Error al procesar la compra: " . $crud_db->error;
    }
    
    $stmt->close();
    $crud_db->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - CIBERMOTION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* [Mantener todos los estilos CSS anteriores] */
        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(to bottom, #ffffff 0%, #e6f0ff 100%);
            color: #2c3e50;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e6f0ff;
        }
        
        h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            letter-spacing: 2px;
            color: #0066cc;
            font-weight: 800;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 15px;
            color: #0066cc;
            text-decoration: none;
            font-weight: 600;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .cart-container {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .cart-items {
            flex: 2;
        }
        
        .cart-summary {
            flex: 1;
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid #0066cc;
            align-self: flex-start;
        }
        
        .cart-item {
            display: flex;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            margin-bottom: 15px;
            border-left: 4px solid #0066cc;
        }
        
        .item-image {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            overflow: hidden;
            margin-right: 20px;
        }
        
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #0066cc;
            margin-bottom: 5px;
        }
        
        .item-price {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        
        .item-quantity {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .quantity-label {
            margin-right: 10px;
            font-weight: 600;
        }
        
        .quantity-value {
            font-weight: 700;
            color: #0066cc;
            font-size: 1.1rem;
        }
        
        .item-subtotal {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0066cc;
        }
        
        .summary-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #0066cc;
            text-align: center;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6f0ff;
        }
        
        .summary-total {
            display: flex;
            justify-content: space-between;
            font-size: 1.3rem;
            font-weight: 700;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #e6f0ff;
            color: #0066cc;
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background: #0066cc;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            text-align: center;
        }
        
        .checkout-btn:hover {
            background: #0052a3;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 102, 204, 0.4);
        }
        
        .empty-cart {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
        }
        
        .empty-cart i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #e6f0ff;
        }
        
        .empty-cart p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        
        /* ========== ESTILOS PARA MODAL DE REGISTRO ========== */
        .modal-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 10000;
            backdrop-filter: blur(5px);
        }

        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 35px;
            border-radius: 20px;
            z-index: 10001;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            border: 3px solid #0066cc;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .modal-content h3 {
            color: #0066cc;
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .modal-content p {
            margin: 15px 0;
            color: #555;
            line-height: 1.6;
            font-size: 1.1rem;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .modal-btn {
            padding: 14px 28px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            min-width: 120px;
        }

        .modal-btn.cancel {
            background: #f8f9fa;
            color: #6c757d;
            border: 2px solid #dee2e6;
        }

        .modal-btn.cancel:hover {
            background: #e9ecef;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.2);
        }

        .modal-btn.register {
            background: #28a745;
            color: white;
            border: 2px solid #28a745;
        }

        .modal-btn.register:hover {
            background: #218838;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }

        .modal-btn.login {
            background: #0066cc;
            color: white;
            border: 2px solid #0066cc;
        }

        .modal-btn.login:hover {
            background: #0052a3;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 102, 204, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cart-container {
                flex-direction: column;
            }
            
            .cart-item {
                flex-direction: column;
            }
            
            .item-image {
                width: 100%;
                height: 200px;
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            h1 {
                font-size: 2.2rem;
            }

            /* Modal responsive */
            @media (max-width: 576px) {
                .modal-content {
                    padding: 25px 20px;
                    width: 95%;
                }
                
                .modal-content h3 {
                    font-size: 1.5rem;
                }
                
                .modal-buttons {
                    flex-direction: column;
                    gap: 12px;
                }
                
                .modal-btn {
                    width: 100%;
                    text-align: center;
                }
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-shopping-cart"></i> Carrito de Compras</h1>
            <a href="/MVC_PAGINAWEB/views/pages/compra.php" class="back-link"><i class="fas fa-arrow-left"></i> Volver a la tienda</a>
        </header>
        
        <?php if (isset($mensaje_exito)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $mensaje_exito; ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($mensaje_error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?php echo $mensaje_error; ?>
            </div>
        <?php endif; ?>
        
        <div class="cart-container">
            <div class="cart-items">
                <div class="cart-item">
                    <div class="item-image">
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                    </div>
                    <div class="item-details">
                        <h3 class="item-name"><?php echo $producto['nombre']; ?></h3>
                        <div class="item-price">Precio unitario: $ <?php echo number_format($producto['precio'], 2); ?></div>
                        <div class="item-quantity">
                            <span class="quantity-label">Cantidad:</span>
                            <span class="quantity-value"><?php echo $producto['cantidad']; ?></span>
                        </div>
                        <div class="item-subtotal">Subtotal: $ <?php echo number_format($subtotal, 2); ?></div>
                    </div>
                </div>
            </div>
            
            <div class="cart-summary">
                <h3 class="summary-title">Resumen de Compra</h3>
                
                <div class="summary-item">
                    <span>Subtotal:</span>
                    <span>$ <?php echo number_format($subtotal, 2); ?></span>
                </div>
                
                <div class="summary-item">
                    <span>Envío:</span>
                    <span>Gratis</span>
                </div>
                
                <div class="summary-total">
                    <span>Total:</span>
                    <span>$ <?php echo number_format($total, 2); ?></span>
                </div>
                
                <form method="POST" action="">
                    <button type="submit" name="confirmar_compra" class="checkout-btn">
                        <i class="fas fa-check"></i> Confirmar Compra
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- ========== MODAL MEJORADO ========== -->
    <div id="modalRegistro" class="modal-backdrop" style="display: none;">
        <div class="modal-content">
            <h3>🔐 Acceso Requerido</h3>
            <p>Para completar tu compra, necesitas tener una cuenta en nuestro sistema.</p>
            <p>¿Qué deseas hacer?</p>
            
            <div class="modal-buttons">
                <button onclick="cerrarModal()" class="modal-btn cancel">
                    Cancelar
                </button>
                <a href="/MVC_PAGINAWEB/public/?action=register&redirect=compra" class="modal-btn register">
                    Registrarme
                </a>
                <a href="/MVC_PAGINAWEB/public/?action=login&redirect=compra" class="modal-btn login">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    </div>

    <script>
    function checkLoginBeforePurchase() {
        <?php if (!isset($_SESSION['usuario_id'])): ?>
            // Mostrar modal de registro si no está logueado
            document.getElementById('modalRegistro').style.display = 'block';
            return false;
        <?php else: ?>
            return true;
        <?php endif; ?>
    }

    function cerrarModal() {
        document.getElementById('modalRegistro').style.display = 'none';
    }

    // Cerrar modal al hacer clic fuera
    document.getElementById('modalRegistro').addEventListener('click', function(e) {
        if (e.target === this) {
            cerrarModal();
        }
    });

    // Cerrar con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            cerrarModal();
        }
    });

    // Aplicar a formularios
    document.querySelectorAll('form[method="POST"]').forEach(form => {
        form.onsubmit = function() {
            return checkLoginBeforePurchase();
        };
    });
    </script>
</body>
</html>