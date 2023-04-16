-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 16-04-2023 a las 23:35:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_aw_mn`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarCarrito` (IN `pConsecutivoProducto` BIGINT(20), IN `pConsecutivoUsuario` BIGINT(20), IN `pCantidadProducto` INT(11))   BEGIN

	IF (SELECT count(*) FROM Carrito 
        WHERE ConsecutivoProducto = pConsecutivoProducto 
        and ConsecutivoUsuario = pConsecutivoUsuario) > 0 THEN
		
        IF(pCantidadProducto = 0) THEN        
        	DELETE FROM carrito 
            WHERE ConsecutivoProducto = pConsecutivoProducto 
            and ConsecutivoUsuario = pConsecutivoUsuario;
        ELSE
            UPDATE carrito
            SET Cantidad = pCantidadProducto
            WHERE ConsecutivoProducto = pConsecutivoProducto 
            and ConsecutivoUsuario = pConsecutivoUsuario;
 		END IF;
        
	ELSE
    
    	IF(pCantidadProducto > 0) THEN
 			INSERT INTO carrito(ConsecutivoProducto,ConsecutivoUsuario,Cantidad,FechaCarrito)
        	VALUES(pConsecutivoProducto,pConsecutivoUsuario,pCantidadProducto, NOW());
		END IF;
    
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarEstadoUsuario` (IN `pConsecutivo` VARCHAR(70))   BEGIN
	SELECT
    	ESTADO
    INTO
    	@CODESTADO
    FROM 
    	USUARIO
    WHERE
    	ConsecutivoUsuario = pConsecutivo;
    
    UPDATE
    	USUARIO
    SET
    	ESTADO = 2
    WHERE
    	ConsecutivoUsuario = pConsecutivo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarProducto` (IN `pNombreProducto` VARCHAR(50), IN `pPrecio` DECIMAL(8,2), IN `pRutaImagen` VARCHAR(500), IN `pStock` INT(11), IN `pConsecutivoProducto` BIGINT(20), IN `pTipoProducto` TINYINT(4), IN `pEstado` TINYINT(4))   BEGIN
    UPDATE Producto
    SET Nombre_Producto = pNombreProducto,
        RutaImagen 		= pRutaImagen,
        Estado 			= pEstado,
        Precio 			= pPrecio,
        RutaImagen 		= pRutaImagen,
        Stock 			= pStock,
        TipoProducto 	= pTipoProducto
    WHERE ConsecutivoProducto = pConsecutivoProducto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarUsuario` (IN `pContrasenna` VARCHAR(10), IN `pCedula` VARCHAR(20), IN `pNombre` VARCHAR(100), IN `pTipoUsuario` TINYINT(4), IN `pConsecutivoUsuario` BIGINT(20))   BEGIN
    IF pContrasenna = '' THEN

        SELECT Contrasenna INTO pContrasenna
        FROM usuario
        WHERE ConsecutivoUsuario = pConsecutivoUsuario;

    END IF;

    UPDATE usuario
    SET Contrasenna = pContrasenna,
        Cedula 		= pCedula,
        Nombre 		= pNombre,
        TipoUsuario = pTipoUsuario
    WHERE ConsecutivoUsuario = pConsecutivoUsuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCorreo` (IN `pCorreoElectronico` VARCHAR(70))   BEGIN

	SELECT CorreoElectronico, Contrasenna
    FROM   usuario
    WHERE  CorreoElectronico = pCorreoElectronico;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProducto` (IN `pConsecutivoProducto` BIGINT(20))   BEGIN

		SELECT 	ConsecutivoProducto,
    	   		Nombre_Producto,
           		Estado,
           		Case when Estado = 1 
           			 then 'Activo' 
                     Else 'Inactivo' End 'Estado',
                TipoProducto,
                RutaImagen,
                Precio,
                Stock,
                Descripcion
        FROM Producto P
        WHERE ConsecutivoProducto = pConsecutivoProducto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductos` ()   BEGIN
	SELECT
    	ConsecutivoProducto,
        Nombre_Producto,
        RutaImagen,
        Estado,
        Case when Estado = 1 
           			 then 'Activo' 
                     Else 'Inactivo' End 'Estado',
        Precio,
        Stock,
        TipoProducto,
        Descripcion
     FROM
     	Producto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTiposEstado` ()   BEGIN
	SELECT
    	TipoEstado, NombreTipoEstado
    FROM
    	tipos_estado;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTiposProducto` ()   BEGIN

	SELECT TipoProducto,
		   NombreTipoProducto
	FROM   tipos_producto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTiposUsuario` ()   BEGIN
	SELECT TipoUsuario,
		   NombreTipoUsuario
	FROM   tipos_usuarios;	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuario` (IN `pConsecutivo` BIGINT(20))   BEGIN

		SELECT 	ConsecutivoUsuario,
    	   		CorreoElectronico,
           		Estado,
           		Case when Estado = 1 
           			 then 'Activo' 
                     Else 'Inactivo' End 'Estado',
           		U.TipoUsuario,
           		T.NombreTipoUsuario,
                Cedula,
                Nombre,
                Telefono
        FROM usuario U
        INNER JOIN tipos_usuarios T ON U.TipoUsuario = T.TipoUsuario
        WHERE ConsecutivoUsuario = pConsecutivo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuarios` (IN `pCorreoElectronico` VARCHAR(70), IN `pTipoUsuario` TINYINT(4))   BEGIN

IF(pTipoUsuario = 1) THEN

		SELECT 	ConsecutivoUsuario,
    	   		CorreoElectronico,
           		Estado,
           		Case when Estado = 1 
           			 then 'Activo' 
                     Else 'Inactivo' End 'Estado',
           		U.TipoUsuario,
           		T.NombreTipoUsuario,
                Cedula,
                Nombre
        FROM usuario U
        INNER JOIN tipos_usuarios T ON U.TipoUsuario = T.TipoUsuario;

	ELSE
    
    	SELECT 	ConsecutivoUsuario,
    	   		CorreoElectronico,
           		Estado,
           		Case when Estado = 1 
           			 then 'Activo' 
                     Else 'Inactivo' End 'Estado',
           		U.TipoUsuario,
           		T.NombreTipoUsuario,
                Cedula,
                Nombre
        FROM usuario U
        INNER JOIN tipos_usuarios T ON U.TipoUsuario = T.TipoUsuario
        WHERE CorreoElectronico = pCorreoElectronico;

	END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditarPerfilUsuario` (IN `pContrasenna` VARCHAR(10), IN `pCorreoElectronico` VARCHAR(70), IN `pTelefono` VARCHAR(8), IN `pConsecutivoUsuario` BIGINT(20))   BEGIN

    IF pContrasenna = '' THEN

        SELECT Contrasenna INTO pContrasenna
        FROM usuario
        WHERE ConsecutivoUsuario = pConsecutivoUsuario;

    END IF;

    UPDATE usuario
    SET Contrasenna 		= pContrasenna,
        CorreoElectronico  	= pCorreoElectronico,
        Telefono  			= pTelefono
    WHERE ConsecutivoUsuario = pConsecutivoUsuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InactivarProducto` (IN `pConsecutivoProducto` BIGINT(20))   BEGIN
	SELECT
    	ESTADO
    INTO
    	@CODESTADO
    FROM 
    	Producto
    WHERE
    	ConsecutivoProducto = pConsecutivoProducto;
    
    UPDATE
    	Producto
    SET
    	ESTADO = 2
    WHERE
    	ConsecutivoProducto = pConsecutivoProducto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IniciarSesion` (IN `pCorreoElectronico` VARCHAR(70), IN `pContrasenna` VARCHAR(10))   BEGIN

	SELECT  ConsecutivoUsuario,
    		CorreoElectronico,
            Nombre,
            Estado,
            T.TipoUsuario,
            T.NombreTipoUsuario 'PerfilUsuario',
            Cedula,
            Telefono
	FROM  USUARIO U
    INNER JOIN tipos_usuarios T ON U.TipoUsuario = T.TipoUsuario 
    WHERE 	CorreoElectronico = pCorreoElectronico
    	AND	Contrasenna = pContrasenna
    	AND Estado = 1;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarCarritoTemporal` (IN `pConsecutivoUsuario` BIGINT(20))   BEGIN

	SELECT 	IFNULL(SUM(C.Cantidad),0) 'CantidadTemporal',
			IFNULL(SUM(C.Cantidad * P.Precio),0)   'MontoTemporal'
    FROM 	CARRITO	C
    INNER JOIN PRODUCTO P ON C.ConsecutivoProducto = P.ConsecutivoProducto
    WHERE C.ConsecutivoUsuario = pConsecutivoUsuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarCarritoTotal` (IN `pConsecutivoUsuario` BIGINT(20))   BEGIN

	SELECT  P.Nombre_Producto,
			C.Cantidad,
            P.Precio,
            C.Cantidad * P.Precio 			'SubTotal',
           (C.Cantidad * P.Precio) * 0.13 	'Impuesto',
           (C.Cantidad * P.Precio) + (C.Cantidad * P.Precio) * 0.13 'Total'
    FROM 	CARRITO	C
    INNER JOIN PRODUCTO P ON C.ConsecutivoProducto = P.ConsecutivoProducto
    WHERE C.ConsecutivoUsuario = pConsecutivoUsuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarUsuarios` (IN `pNombre` VARCHAR(100), IN `pCedula` VARCHAR(20), IN `pCorreoElectronico` VARCHAR(70), IN `pTelefono` VARCHAR(8), IN `pContrasenna` VARCHAR(10))   BEGIN
	DECLARE P_Estado TINYINT(4);
    DECLARE P_TipoUsuario TINYINT(4);
    DECLARE P_ConsecutivoUsuario BIGINT(20);
    
    SET P_ConsecutivoUsuario = (SELECT IFNULL(MAX(ConsecutivoUsuario) ,0) +1 FROM USUARIO);
    SET P_Estado = 1;
    SET P_TipoUsuario = 2;
    
    INSERT INTO USUARIO(
    	ConsecutivoUsuario,
        Cedula,
        Nombre,
    	CorreoElectronico,
        Telefono,
    	Contrasenna,
    	Estado,
    	TipoUsuario)
   	VALUES(
        P_ConsecutivoUsuario,
        pCedula,
        pNombre,
    	pCorreoElectronico,
        pTelefono,
        pContrasenna,
        P_Estado,
        P_TipoUsuario);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ConsecutivoCarrito` bigint(20) NOT NULL,
  `ConsecutivoProducto` bigint(20) NOT NULL,
  `ConsecutivoUsuario` bigint(20) NOT NULL,
  `Cantidad` smallint(6) NOT NULL,
  `FechaCarrito` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `ConsecutivoDetalle` bigint(20) NOT NULL,
  `ConsecutivoEncabezado` bigint(20) NOT NULL,
  `ConsecutivoProducto` bigint(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezado`
--

CREATE TABLE `encabezado` (
  `ConsecutivoEncabezado` bigint(20) NOT NULL,
  `ConsecutivoUsuario` bigint(20) NOT NULL,
  `FechaCompra` datetime NOT NULL,
  `SubTotal` decimal(12,2) NOT NULL,
  `IVA` decimal(12,2) NOT NULL,
  `Total` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ConsecutivoProducto` bigint(20) NOT NULL,
  `Nombre_Producto` varchar(50) NOT NULL,
  `RutaImagen` varchar(500) NOT NULL,
  `Estado` tinyint(4) NOT NULL,
  `Precio` decimal(8,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  `TipoProducto` tinyint(4) NOT NULL,
  `Descripcion` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ConsecutivoProducto`, `Nombre_Producto`, `RutaImagen`, `Estado`, `Precio`, `Stock`, `TipoProducto`, `Descripcion`) VALUES
(1, 'RAZER KRAKEN - PINK', 'dist\\img\\razer-kraken.png', 1, 12500.00, 25, 1, ''),
(4, 'Silver', 'No aplica', 1, 29.99, 0, 2, '<li>Descuentos exclusivos: Los miembros de Razer Silver podrían recibir descuentos exclusivos en productos y accesorios de Razer</li>\r\n<li>Acceso anticipado a ventas y lanzamientos de productos: Los miembros de Razer Silver tendrían acceso anticipado a las ventas y lanzamientos de productos de Razer.</li>\r\n<li>Envío gratuito: Los miembros de Razer Silver podrían recibir envío gratuito en pedidos elegibles.</li>\r\n<li>Soporte técnico prioritario: Los miembros de Razer Silver tendrían acceso a soporte técnico prioritario para cualquier problema técnico que pudieran enfrentar con sus productos de Razer.</li>\r\n<li>Puntos de recompensa Silver: Los miembros de Razer Silver podrían acumular puntos de recompensa Silver al realizar compras que luego pueden canjear por descuentos en futuras compras de productos de Razer</li>'),
(5, 'Gold', 'No aplica', 1, 39.99, 0, 2, '<li>Descuentos exclusivos: Los miembros de Razer Gold podrían recibir descuentos exclusivos en productos y accesorios de Razer.</li>\r\n<li>Acceso anticipado a ventas y lanzamientos de productos: Los miembros de Razer Gold tendrían acceso anticipado a las ventas y lanzamientos de productos de Razer.</li>\r\n<li>Envío a mitad de precio: Los miembros de Razer Gold podrían recibir envío con descuento en pedidos elegibles.</li>\r\n<li>Soporte técnico prioritario: Los miembros de Razer Gold tendrían acceso a soporte técnico prioritario para cualquier problema técnico que pudieran enfrentar con sus productos de Razer.</li>\r\n<li>Puntos de recompensa Gold: Los miembros de Razer Gold podrían acumular puntos de recompensa Gold al realizar compras que luego pueden canjear por descuentos en futuras compras de productos de Razer.</li>'),
(6, 'Platinum', 'No aplica', 1, 59.99, 0, 2, '<li>Acceso exclusivo a productos de edición limitada: Los miembros del plan Platinum podrían tener la oportunidad de comprar productos de edición limitada de Razer que no están disponibles para el público en general.</li>\r\n<li>Atención al cliente VIP: Los miembros de Razer Platinum tendrían acceso a un equipo de soporte técnico altamente capacitado y experimentado, disponible las 24 horas del día, los 7 días de la semana, para resolver rápidamente cualquier problema o pregunta.</li>\r\n<li>Envío prioritario: Los miembros de Razer Platinum tendrían acceso a envío prioritario para sus pedidos, lo que les permitiría recibir sus productos más rápido que los clientes de otros planes de membresía.</li>\r\n<li>Experiencias de juego exclusivas: Los miembros de Razer Platinum podrían recibir invitaciones exclusivas para eventos y torneos de juegos en todo el mundo, así como acceso a demostraciones y versiones beta anticipadas de algunos juegos.</li>\r\n<li>Asesoramiento de productos personalizado: Los miembros de Razer Platinum tendrían acceso a un asesor de productos personalizado que les ayudaría a encontrar los productos y accesorios de Razer que mejor se adapten a sus necesidades y preferencias.</li>'),
(7, 'Bronce', 'dist\\img\\', 1, 9.99, 0, 2, '<li>Descuentos en productos y accesorios de Razer: Los miembros de Razer Bronze podrían recibir descuentos exclusivos en productos y accesorios de Razer.</li>\r\n<li>Acceso anticipado a ventas y lanzamientos de productos: Los miembros de Razer Bronze tendrían acceso anticipado a las ventas y lanzamientos de productos de Razer.</li>\r\n<li>Soporte técnico básico: Los miembros de Razer Bronze tendrían acceso a soporte técnico básico para cualquier problema técnico que pudieran enfrentar con sus productos de Razer.</li>'),
(8, 'RAZER BLACKWIDOW V4 PRO', 'dist\\img\\razer-blackwidow-v4.png', 1, 120000.00, 45, 1, 'Es un teclado mecánico'),
(9, 'RAZER BLACKWIDOW V3', 'dist\\img\\razer-blackwidow-v3.jpg', 1, 110000.00, 30, 1, 'Teclado mecánico'),
(10, 'Razer Basilisk V3 Pro', 'dist\\img\\razer-basilisk-v3-pro.png', 1, 45000.00, 30, 1, 'Mouse 21 DPI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_estado`
--

CREATE TABLE `tipos_estado` (
  `TipoEstado` tinyint(4) NOT NULL,
  `NombreTipoEstado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_estado`
--

INSERT INTO `tipos_estado` (`TipoEstado`, `NombreTipoEstado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_producto`
--

CREATE TABLE `tipos_producto` (
  `TipoProducto` tinyint(4) NOT NULL,
  `NombreTipoProducto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_producto`
--

INSERT INTO `tipos_producto` (`TipoProducto`, `NombreTipoProducto`) VALUES
(1, 'Tienda'),
(2, 'Plan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE `tipos_usuarios` (
  `TipoUsuario` tinyint(4) NOT NULL,
  `NombreTipoUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`TipoUsuario`, `NombreTipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ConsecutivoUsuario` bigint(20) NOT NULL,
  `Cedula` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(70) NOT NULL,
  `Telefono` varchar(8) NOT NULL,
  `Contrasenna` varchar(10) NOT NULL,
  `Estado` tinyint(4) NOT NULL,
  `TipoUsuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ConsecutivoUsuario`, `Cedula`, `Nombre`, `CorreoElectronico`, `Telefono`, `Contrasenna`, `Estado`, `TipoUsuario`) VALUES
(1, '117020932', 'BRANDON JOSE RUIZ MIRANDA', 'brandruiz7@gmail.com', '72153137', 'fidelitas', 1, 1),
(2, '117020931', 'JAIRO ANTONIO ACEVEDO LACAYO', 'jairo21@gmail.com', '72153131', 'fidelitas', 1, 2),
(3, '117020930', 'KENDRIK ANDRES BARRAZA ELIZONDO', 'kendrick@gmail.com', '11111112', 'fidelitas', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ConsecutivoCarrito`),
  ADD KEY `fk_carrito_producto` (`ConsecutivoProducto`),
  ADD KEY `fk_carrito_usuario` (`ConsecutivoUsuario`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`ConsecutivoDetalle`),
  ADD KEY `fk_encabezado_detalle` (`ConsecutivoEncabezado`),
  ADD KEY `fk_productos_detalle` (`ConsecutivoProducto`);

--
-- Indices de la tabla `encabezado`
--
ALTER TABLE `encabezado`
  ADD PRIMARY KEY (`ConsecutivoEncabezado`),
  ADD KEY `fk_encabezado_usuario` (`ConsecutivoUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ConsecutivoProducto`),
  ADD KEY `fk_tipos_producto` (`TipoProducto`),
  ADD KEY `fk_estado_producto` (`Estado`);

--
-- Indices de la tabla `tipos_estado`
--
ALTER TABLE `tipos_estado`
  ADD PRIMARY KEY (`TipoEstado`);

--
-- Indices de la tabla `tipos_producto`
--
ALTER TABLE `tipos_producto`
  ADD PRIMARY KEY (`TipoProducto`);

--
-- Indices de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD PRIMARY KEY (`TipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ConsecutivoUsuario`),
  ADD KEY `CorreoElectronico` (`CorreoElectronico`,`TipoUsuario`),
  ADD KEY `fk_tipos_usuarios` (`TipoUsuario`),
  ADD KEY `fk_estado_usuario` (`Estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ConsecutivoCarrito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `ConsecutivoDetalle` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `encabezado`
--
ALTER TABLE `encabezado`
  MODIFY `ConsecutivoEncabezado` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ConsecutivoProducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipos_estado`
--
ALTER TABLE `tipos_estado`
  MODIFY `TipoEstado` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_producto`
--
ALTER TABLE `tipos_producto`
  MODIFY `TipoProducto` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  MODIFY `TipoUsuario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ConsecutivoUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_producto` FOREIGN KEY (`ConsecutivoProducto`) REFERENCES `producto` (`ConsecutivoProducto`),
  ADD CONSTRAINT `fk_carrito_usuario` FOREIGN KEY (`ConsecutivoUsuario`) REFERENCES `usuario` (`ConsecutivoUsuario`);

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `fk_encabezado_detalle` FOREIGN KEY (`ConsecutivoEncabezado`) REFERENCES `encabezado` (`ConsecutivoEncabezado`),
  ADD CONSTRAINT `fk_productos_detalle` FOREIGN KEY (`ConsecutivoProducto`) REFERENCES `producto` (`ConsecutivoProducto`);

--
-- Filtros para la tabla `encabezado`
--
ALTER TABLE `encabezado`
  ADD CONSTRAINT `fk_encabezado_usuario` FOREIGN KEY (`ConsecutivoUsuario`) REFERENCES `usuario` (`ConsecutivoUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_estado_producto` FOREIGN KEY (`Estado`) REFERENCES `tipos_estado` (`TipoEstado`),
  ADD CONSTRAINT `fk_tipos_producto` FOREIGN KEY (`TipoProducto`) REFERENCES `tipos_producto` (`TipoProducto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_estado_usuario` FOREIGN KEY (`Estado`) REFERENCES `tipos_estado` (`TipoEstado`),
  ADD CONSTRAINT `fk_tipos_usuarios` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipos_usuarios` (`TipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
