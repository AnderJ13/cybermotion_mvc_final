<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIBERMOTION - Guante Traductor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            width: 100%;
            max-width: 900px;
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
            font-size: 3.2rem;
            margin-bottom: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #0066cc;
            font-weight: 800;
        }
        
        .subtitle {
            font-size: 1.3rem;
            color: #7f8c8d;
            font-weight: 400;
            margin-bottom: 15px;
        }
        
        .price {
            background: #0066cc;
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: bold;
            display: inline-block;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0, 102, 204, 0.3);
        }
        
        .content {
            margin: 25px 0;
        }
        
        .section {
            margin-bottom: 25px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            border-left: 4px solid #0066cc;
        }
        
        .section-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            color: #0066cc;
        }
        
        .section-title i {
            margin-right: 10px;
        }
        
        .description {
            line-height: 1.6;
            font-size: 1.1rem;
            color: #34495e;
        }
        
        .features {
            list-style-type: none;
        }
        
        .features li {
            padding: 12px 0;
            border-bottom: 1px solid #e6f0ff;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }
        
        .features li:last-child {
            border-bottom: none;
        }
        
        .features li i {
            color: #0066cc;
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            gap: 20px;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            background: #f8fafc;
            border-radius: 50px;
            padding: 5px;
            border: 2px solid #e6f0ff;
        }
        
        .quantity-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: #0066cc;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .quantity-btn:hover {
            background: #0052a3;
        }
        
        .quantity-input {
            width: 50px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            background: transparent;
            color: #2c3e50;
        }
        
        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 40px;
            border-radius: 50px;
            border: none;
            font-size: 1.4rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 102, 204, 0.4);
        }
        
        .btn i {
            margin-right: 15px;
            font-size: 1.6rem;
        }
        
        .btn-primary {
            background: #0066cc;
            color: white;
        }
        
        .btn-primary:hover {
            background: #0052a3;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 102, 204, 0.5);
        }
        
        footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e6f0ff;
            font-size: 1rem;
            color: #7f8c8d;
        }
        
        /* Nuevos estilos para la imagen y descripción en línea */
        .image-description-container {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            align-items: flex-start;
        }
        
        .container-img {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        
        .container-img img {
            width: 100%;
            max-width: 300px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        
        .container-description {
            flex: 1;
            background: #f8fafc;
            border-radius: 15px;
            padding: 20px;
            overflow: hidden;
            border-left: 4px solid #0066cc;
        }
        
        .title-description {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            cursor: pointer;
        }
        
        .title-description h4 {
            font-size: 1.5rem;
            color: #0066cc;
            display: flex;
            align-items: center;
        }
        
        .title-description h4 i {
            margin-right: 10px;
        }
        
        .test-description {
            max-height: 500px;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }
        
        .test-description p {
            line-height: 1.6;
            font-size: 1.1rem;
            color: #34495e;
        }
        
        .collapsed .test-description {
            max-height: 0;
        }
        
        @media (max-width: 768px) {
            .image-description-container {
                flex-direction: column;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            h1 {
                font-size: 2.5rem;
            }
            
            .btn {
                padding: 18px 30px;
                font-size: 1.2rem;
                width: 100%;
            }
            
            .quantity-selector {
                width: 100%;
                justify-content: center;
            }
        }
        /* Botón de volver atrás */
.back-button-container {
    position: absolute;
    top: 20px;
    left: 20px;
}

.back-button {
    display: inline-flex;
    align-items: center;
    padding: 12px 20px;
    background: #0066cc;
    color: white;
    text-decoration: none;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(0, 102, 204, 0.3);
}

.back-button:hover {
    background: #0052a3;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 102, 204, 0.4);
}

.back-button i {
    margin-right: 8px;
}

/* Ajuste para el header principal */
header {
    position: relative;
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e6f0ff;
}

/* Responsive para móviles */
@media (max-width: 768px) {
    .back-button-container {
        position: relative;
        top: 0;
        left: 0;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .back-button {
        padding: 10px 16px;
        font-size: 0.9rem;
    }
    
    header {
        padding-top: 20px;
    }
}
    </style>
</head>
<body>
    <div class="container">
        <header>
            <!-- Botón de volver atrás -->
<div class="back-button-container">
    <a href="/MVC_PAGINAWEB/public/?action=principal" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver al Inicio
    </a>
</div>
            <h1>CIBERMOTION</h1>
            <div class="subtitle">Guante Traductor de Lenguaje de Señas</div>
            <div class="price">$165.00</div>
        </header>
        
        <div class="content">
            <!-- Contenedor de imagen y descripción en línea -->
            <div class="image-description-container">
                <div class="container-img">
                    <img src="https://sv.epaenlinea.com/media/catalog/product/cache/e28d833c75ef32af78ed2f15967ef6e0/c/7/c71afa2a-ae9e-4b8a-802c-59024e95ce4f.jpg" alt="Guante Traductor">
                </div>
                
                <div class="container-description">
                    <div class="title-description" onclick="toggleDescription()">
                        <h4><i class="fas fa-info-circle"></i> Descripción</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="test-description">
                        <p>El <strong>Guante Traductor de Lengua de Señas</strong> es un dispositivo inteligente diseñado para convertir los movimientos del abecedario en señas a texto en tiempo real. Utiliza sensores de flexión en los dedos y una unidad de procesamiento que interpreta las señas para facilitar la comunicación.</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title"><i class="fas fa-star"></i> Características</h2>
                <ul class="features">
                    <li><i class="fas fa-check"></i> Aprendizaje llamativo</li>
                    <li><i class="fas fa-check"></i> Traducción instantánea</li>
                    <li><i class="fas fa-check"></i> Deletreo interactivo</li>
                    <li><i class="fas fa-check"></i> Visualización de señas</li>
                </ul>
            </div>
            
            <div class="section">
                <h2 class="section-title"><i class="fas fa-lightbulb"></i> ¿Qué es?</h2>
                <div class="description">
                    <p>Innovación para la inclusión y la comunicación sin barreras. El Guante Traductor de Lengua de Señas convierte los movimientos del abecedario en señas a texto en tiempo real, utilizando sensores de flexión en los dedos y una unidad de procesamiento.</p>
                </div>
            </div>
        </div>
        
        <div class="action-buttons">
    <div class="quantity-selector">
        <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
        <input type="number" id="quantity" class="quantity-input" value="1" min="1" max="99" onchange="actualizarCantidadHidden()">
        <button class="quantity-btn" onclick="increaseQuantity()">+</button>
    </div>
    
    <form action="/MVC_PAGINAWEB/views/pages/carrito.php" method="POST">
        <input type="hidden" name="product_quantity" id="product_quantity" value="1">
        <input type="hidden" name="product_id" value="1">
        <input type="hidden" name="product_name" value="Guante Traductor de Lenguaje de Señas">
        <input type="hidden" name="product_price" value="165.00">
        <input type="hidden" name="product_image" value="https://sv.epaenlinea.com/media/catalog/product/cache/e28d833c75ef32af78ed2f15967ef6e0/c/7/c71afa2a-ae9e-4b8a-802c-59024e95ce4f.jpg">
        
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-shopping-cart"></i> COMPRAR AHORA
        </button>
    </form>
</div>
        
        <footer>
            <p>CIBERMOTION &copy; 2025 - Todos los derechos reservados</p>
        </footer>
    </div>

    <script>
        // Función para alternar la descripción
        function toggleDescription() {
            const descriptionContainer = document.querySelector('.container-description');
            const icon = document.querySelector('.title-description .fa-chevron-down');
            descriptionContainer.classList.toggle('collapsed');
            
            if (descriptionContainer.classList.contains('collapsed')) {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        }
        
        // Funciones para manejar la cantidad de productos
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const hiddenInput = document.getElementById('product_quantity');
            let value = parseInt(quantityInput.value);
            if (value < 99) {
                quantityInput.value = value + 1;
                hiddenInput.value = value + 1;
            }
        }
        
        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const hiddenInput = document.getElementById('product_quantity');
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                quantityInput.value = value - 1;
                hiddenInput.value = value - 1;
            }
        }
        
        // Validar entrada manual en el campo de cantidad
        document.getElementById('quantity').addEventListener('change', function() {
            let value = parseInt(this.value);
            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > 99) {
                this.value = 99;
            }
            document.getElementById('product_quantity').value = this.value;
        });
        
        // Efecto de escritura para el título
        const title = document.querySelector('h1');
        const originalText = title.textContent;
        title.textContent = '';
        
        let i = 0;
        const typeWriter = () => {
            if (i < originalText.length) {
                title.textContent += originalText.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        };
        
        setTimeout(typeWriter, 500);
    </script>
</body>
</html>