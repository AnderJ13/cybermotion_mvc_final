<?php
// Iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../partials/header.php';
?>
<link rel="stylesheet" href="/MVC_PAGINAWEB/public/assets/css/style.css">



<div class="main-banner">
    <h1>Guante Traductor de Lenguaje de Señas</h1>
    <p>Innovación para la inclusión y la comunicación sin barreras</p>
</div>

<div class="main-container">
    <main>
        <section class="product-info">
            <div class="text-content">
                <h2>¿Qué es?</h2>
                <p>
                    El <strong>Guante Traductor de Lengua de Señas</strong> es un dispositivo inteligente diseñado 
                    para convertir los movimientos del abecedario en señas a texto en tiempo real. 
                    Utiliza sensores de flexión en los dedos y una unidad de procesamiento que interpreta 
                    los gestos y los envía a una aplicación móvil o web.
                </p>
                <p>
                    Esta herramienta busca <strong>facilitar la comunicación</strong> entre personas sordas y oyentes, 
                    promoviendo la inclusión en entornos educativos, familiares y laborales.
                </p>
                <?php if (!isset($_SESSION['usuario_nombre'])): ?>
                    <div class="guest-cta">
                        <p>
                            ¿Quieres personalizar tu experiencia? 
                            <a href="/MVC_PAGINAWEB/public/?action=login" class="login-link">Inicia sesión</a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="image-content">
                <img src="/MVC_PAGINAWEB/public/assets/img/unnamed.png" alt="Guante Traductor">
                <figcaption>Prototipo funcional del guante traductor</figcaption>
            </div>
        </section>

        <section class="features-section">
            <h2>Características del Dispositivo</h2>
            <ul>
                <li><strong>Sensores de flexión:</strong> 5 sensores para detectar movimientos de cada dedo.</li>
                <li><strong>Unidad de procesamiento:</strong> Microcontrolador Seeed XIAO ESP32-S3 con conectividad Bluetooth.</li>
                <li><strong>Sensor de movimiento:</strong> MPU6050 (acelerómetro y giroscopio de 6 ejes).</li>
                <li><strong>Batería:</strong> Recargable Li-Po de 3.7V (duración aproximada 6 horas).</li>
                <li><strong>Conectividad:</strong> Bluetooth 5.0 para comunicación con la app.</li>
                <li><strong>Material:</strong> Guante de tela elástica y ligera para mayor comodidad.</li>
            </ul>
        </section>

        <section class="benefits-section">
            <h2>¿Por qué elegir nuestro guante?</h2>
            <ul>
                <li>Promueve la inclusión social y laboral.</li>
                <li>Fácil de usar y transportar.</li>
                <li>Compatible con dispositivos móviles y web.</li>
                <li>Actualizaciones constantes de software.</li>
                <li>Soporte técnico y comunidad activa.</li>
            </ul>
        </section>

        <!-- NUEVA SECCIÓN DE COMPRA -->
        <section class="buy-section">
            <h2>Compra tu Guante Traductor</h2>
            <p>
                ¡Adquiere ahora el Guante Traductor de Lengua de Señas y forma parte de la innovación inclusiva!
                <br>
                Precio de lanzamiento: <strong>$164.99 USD</strong>
            </p>
            <a href="/MVC_PAGINAWEB/views/pages/compra.php" class="buy-btn">Comprar Ahora</a>
            <p class="buy-note">* Envíos a todo El Salvador. Métodos de pago: tarjeta, transferencia y efectivo contra entrega.</p>
        </section>
        <!-- FIN NUEVA SECCIÓN -->

        <section class="requirements-section">
            <h2>Requerimientos Técnicos</h2>
            <div class="requirements">
                <h3>Lado del Cliente (Usuario Final)</h3>
                <p><strong>Si es aplicación móvil:</strong></p>
                <ul>
                    <li>Sistema Operativo: Android 9.0+ / iOS 13+</li>
                    <li>Procesador: Quad-Core 1.5 GHz o superior</li>
                    <li>Memoria RAM: 2 GB (recomendado 4 GB)</li>
                    <li>Almacenamiento: 200 MB libres + espacio para datos</li>
                    <li>Conectividad: Internet 2 Mbps mínimo</li>
                    <li>Pantalla: Resolución mínima 1280×720 px</li>
                </ul>
                <p><strong>Si es aplicación web:</strong></p>
                <ul>
                    <li>Navegador: Chrome, Firefox, Edge o Safari (últimas versiones)</li>
                    <li>Resolución de pantalla: 1366×768 px o superior</li>
                    <li>Conexión a Internet: mínimo 2 Mbps</li>
                    <li>JavaScript y cookies habilitados</li>
                </ul>
            </div>
            <div class="requirements">
                <h3>Lado del Servidor (Sistema)</h3>
                <ul>
                    <li>Sistema Operativo: Windows Server 2019 / Ubuntu Server 20.04+</li>
                    <li>Procesador: CPU de 4 núcleos a 2.5 GHz o superior</li>
                    <li>Memoria RAM: mínimo 8 GB (recomendado 16 GB)</li>
                    <li>Almacenamiento: SSD de 50 GB mínimo</li>
                    <li>Base de Datos: MySQL 8.0 / PostgreSQL 14 / MongoDB 5</li>
                    <li>Servidor Web: Apache 2.4 / Nginx 1.18+</li>
                    <li>Lenguaje y entorno: Node.js 18+ / PHP 8+ / Python 3.10+</li>
                    <li>Conexión a Internet: 10 Mbps simétricos o más</li>
                    <li>Seguridad: SSL/TLS, firewall y autenticación segura</li>
                </ul>
            </div>
        </section>

        <section class="location-section">
            <h2>Estamos ubicados en:</h2>
            <p>Sonsonate CP 2301</p>
            <div class="map-container">
                <iframe src="https://www.google.com/maps?q=Sonsonate,El+Salvador&output=embed"></iframe>
            </div>
        </section>
    </main>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>