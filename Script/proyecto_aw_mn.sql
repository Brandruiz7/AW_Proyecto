-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 03-04-2023 a las 11:33:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarUsuario` (IN `pCorreoElectronico` VARCHAR(70))   BEGIN

	SELECT CorreoElectronico, Contrasenna
    FROM   usuario
    WHERE  CorreoElectronico = pCorreoElectronico;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCedula` (IN `pCedula` VARCHAR(20))   BEGIN

	SELECT 	Cedula, Contrasenna
    FROM   	usuario
    WHERE  	Cedula = pCedula;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IniciarSesion` (IN `pCorreoElectronico` VARCHAR(70), IN `pContrasenna` VARCHAR(10))   BEGIN

	SELECT  ConsecutivoUsuario,
    		CorreoElectronico,
            Estado,
            T.TipoUsuario,
            T.NombreTipoUsuario 'PerfilUsuario'
	FROM  USUARIO U
    INNER JOIN tipos_usuarios T ON U.TipoUsuario = T.TipoUsuario 
    WHERE 	CorreoElectronico = pCorreoElectronico
    	AND	Contrasenna = pContrasenna
    	AND Estado = 1;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarUsuarios` (IN `pNombre` VARCHAR(100), IN `pApellidos` VARCHAR(100), IN `pCedula` VARCHAR(20), IN `pCorreoElectronico` VARCHAR(70), IN `pTelefono` VARCHAR(8), IN `pContrasenna` VARCHAR(10))   BEGIN
	DECLARE P_Estado BIT(1);
    DECLARE P_TipoUsuario TINYINT(4);
    DECLARE P_ConsecutivoUsuario BIGINT(20);
    
    SET P_ConsecutivoUsuario = (SELECT IFNULL(MAX(ConsecutivoUsuario) ,0) +1 FROM USUARIO);
    SET P_Estado = 1;
    SET P_TipoUsuario = 2;
    
    INSERT INTO USUARIO(
    	ConsecutivoUsuario,
        Cedula,
        Nombre,
        Apellidos,
    	CorreoElectronico,
        Telefono,
    	Contrasenna,
    	Estado,
    	TipoUsuario)
   	VALUES(
        P_ConsecutivoUsuario,
        pCedula,
        pNombre,
        pApellidos,
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
  `Descripcion` varchar(500) NOT NULL,
  `Precio` decimal(8,2) NOT NULL,
  `rutaImagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Apellidos` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(70) NOT NULL,
  `Telefono` varchar(8) NOT NULL,
  `Contrasenna` varchar(10) NOT NULL,
  `Estado` bit(1) NOT NULL,
  `TipoUsuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ConsecutivoUsuario`, `Cedula`, `Nombre`, `Apellidos`, `CorreoElectronico`, `Telefono`, `Contrasenna`, `Estado`, `TipoUsuario`) VALUES
(1, '117020932', 'Brandon', 'Ruiz Miranda', 'brandruiz7@gmail.com', '72153137', 'fidelitas', b'1', 1);

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
  ADD PRIMARY KEY (`ConsecutivoProducto`);

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
  ADD KEY `fk_tipos_usuarios` (`TipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ConsecutivoCarrito` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ConsecutivoProducto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  MODIFY `TipoUsuario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ConsecutivoUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_tipos_usuarios` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipos_usuarios` (`TipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
