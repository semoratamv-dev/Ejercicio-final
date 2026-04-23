# 👟 Zapatería Deportiva Morís - PWA Premium

Este proyecto es un sistema avanzado de gestión de inventario para una tienda de calzado deportivo, ahora transformado en una **Progressive Web App (PWA)** de alto rendimiento. Combina la potencia de PHP/MySQL con una experiencia de usuario fluida y moderna.

## 📱 Experiencia PWA Mejorada

La aplicación ha sido actualizada para ofrecer una experiencia nativa en dispositivos móviles:

- **Instalación Directa**: Añade la tienda a tu pantalla de inicio con iconos premium y pantalla de carga personalizada.
- **Navegación Offline**: Gracias al Service Worker avanzado (estrategia *Stale-While-Revalidate*), puedes consultar el catálogo incluso sin conexión a internet.
- **Carga Instantánea**: Caché inteligente de imágenes y recursos críticos para una navegación ultra rápida.
- **Accesos Directos**: Shortcuts integrados en el icono de la app para ir directamente al Inventario o al Panel de Gestión.

## 🚀 Características Principales

- **Gestión de Inventario (CRUD)**: 
  - **Control Total**: Inserción, modificación y eliminación de calzado con validaciones robustas.
  - **Relaciones Complejas**: Gestión de múltiples colores y tallas vinculadas dinámicamente.
- **Categorización Inteligente**:
  - Clasificación por público (Hombre, Mujer, Niño, Niña).
  - Rangos de tallas adaptativos según la categoría.
- **Interfaz Moderna**: Diseño centrado y limpio optimizado para cualquier dispositivo.
- **Mantenimiento**: Sistema de reseteo rápido de la base de datos para pruebas y demostraciones.

## 🛠️ Tecnologías Utilizadas

- **Backend**: PHP 8.x (mysqli con consultas preparadas).
- **Base de Datos**: MySQL / MariaDB.
- **Frontend**: HTML5, CSS3 (Vanilla), JavaScript ES6.
- **PWA Engine**: Service Workers, Web App Manifest, Cache Storage API.

## ⚙️ Instalación y Configuración

1. **Servidor**: Clona el proyecto en tu entorno (LocalWP, XAMPP, Laragon).
2. **Configuración**: Edita `config.php` con tus credenciales de base de datos.
3. **Base de Datos**: 
   - Opción A: Importa `zapateria.sql`.
   - Opción B: Entra en la web y usa la opción **"Resetear BBDD"** desde el menú CRUD.
4. **HTTPS**: Para disfrutar de las funciones PWA (Service Worker), asegúrate de servir la web a través de `localhost` o `https`.

---
*Desarrollado con ❤️ para los amantes del calzado deportivo.*

